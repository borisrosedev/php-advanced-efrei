<?php

namespace App\Controllers;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use \App\Core\BaseController;
use App\Traits\CacheData;
use App\Traits\CookyData;
use App\Traits\SessionData;
use Exception;
use Fiber;
use PDO;
use PDOException;

class LoginController extends  BaseController
{
    use CacheData, SessionData, CookyData {
        CacheData::saveDataInMemory as memorize;
        CookyData::saveDataInCooky as cookize;
        SessionData::saveDataInSession as sessionize;
    }
    public $notification;
    public function index()
    {
        $data = [
            "register_href" => "/app/public?url=register/index",
            "title" => "Connexion",
            "form_fields" => [
                [
                    "name" => "email",
                    "placeholder" => "Entrez votre email",
                    "type" => "email",
                    "pattern" => "[a-z0-9.]{2,30}[@]{1}[a-z]{3,7}[.]{1}[a-z]{2,5}",
                    "id" => "email",
                    "icon" => "fa-envelope"
                ],
                [
                    "name" => "password",
                    "placeholder" => "Entrez votre mot de passe",
                    "type" => "password",
                    "pattern" => "[a-zA-Z0-9@$!%&?]{12,50}",
                    "id" => "password",
                    "icon" => "fa-lock"
                ]
            ],
            "form_buttons" => [
                [
                    "class_names" => "button",
                    "type" => "submit",
                    "text_content" => "Valider",
                    "id" => "login-submit-button"
                ],
                [
                    "type" => "reset",
                    "text_content" => "Réinitialiser",
                    "id" => "login-reset-button",
                    "class_names" => "button"
                ]
            ]
        ];

        $this->render('login/index', $data);
    }

    private function login(string $email, string $password): void
    {
        try {
            $query = $this->db->getConnection()->prepare("SELECT * FROM it_creator.users WHERE email = :email");
            $query->execute(['email' => $email]);
            $result = $query->fetch();

            if (!is_bool($result)) {
                if (password_verify($password, $result["password"])) {

                    $this->sessionize($result);
                    $this->cookize($result);
                    $this->memorize($result, $this->memoryDb);
                    $this->redirect("?url=dashboard/index");
             
                }
            } else {
                $this->notification = "Informations incorrectes";
                $this->redirect("?url=login/index");
            }
        } catch (Exception $e) {
            $this->fileLogMessage("auth", "[Login-Error] avec identifiant : $email", "ERROR");
            $this->redirect("?url=login/index");
        }
    }

    public function authenticate($param = null)
    {

        $email_raw_input = $_POST['email'] ?? null;
        $password_raw_input = $_POST['password'] ?? null;
        if ($email_raw_input && $password_raw_input) {

            // pré-traitement de l'email
            $is_true_email = filter_var($email_raw_input, FILTER_VALIDATE_EMAIL);
            if ($is_true_email == false) {
                $this->notification = "L'email que vous avez entré est invalide";
                $this->redirect("?url=login/index");
            }

            $fiber = new Fiber(function () {
                Fiber::suspend("Traitement des informations en cours ...");
            });
            $this->notification = $fiber->start();
            $email = htmlspecialchars(trim($is_true_email));
            $password = htmlspecialchars(trim($password_raw_input));
            $this->login($email, $password);
            $this->notification = $fiber->resume("✅ Authentification terminée");;
            $this->redirect("?url=login/index");
        } else {
            $this->notification = "Vous devez remplir tous les champs";
            $this->redirect("?url=login/index");
        }
    }
}
