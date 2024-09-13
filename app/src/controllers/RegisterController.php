<?php
namespace App\Controllers;
use App\Traits\CacheData;
require dirname(__DIR__, 2).'/vendor/autoload.php';
use App\Core\BaseController;
use App\Traits\CookyData;
use App\Traits\SessionData;
use Exception;
use Fiber;

class RegisterController extends BaseController {

    use CacheData, SessionData, CookyData {
        CacheData::saveDataInMemory as memorize;
        CookyData::saveDataInCooky as cookize;
        SessionData::saveDataInSession as sessionize;
    }
    public $notification;
    public function index() 
    {

        $data = [
            "login_href" => "./?url=login/index",
            "title" => "Inscription",
            "form_fields" => [
                [
                    "name"=> "email",
                    "placeholder" => "Entrez votre email",
                    "type" => "email",
                    "pattern" => "[a-z0-9.]{2,30}[@]{1}[a-z]{3,7}[.]{1}[a-z]{2,5}",
                    "id" => "email",
                    "icon" => "fa-envelope"
                ],
                [
                    "name"=> "password",
                    "placeholder" => "Entrez votre mot de passe",
                    "type" => "password",
                    "pattern" => "[a-zA-Z0-9@$!%?&]{12,50}",
                    "id" => "password",
                    "icon" => "fa-lock"
                ],
                [
                    "name"=> "confirmed_password",
                    "placeholder" => "Confirmez votre mot de passe",
                    "type" => "password",
                    "pattern" => "[a-zA-Z0-9@$!%?&]{12,50}",
                    "id" => "confirmed_password",
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
        
        $this->render('register/index', $data);    
    }


    public function authenticate($param = null)
    {
        $email_raw_input = $_POST['email'] ?? null;
        $password_raw_input = $_POST['password'] ?? null;
        $confirmed_password_raw_input = $_POST['confirmed_password'] ?? null;


        if ($email_raw_input && $password_raw_input && $confirmed_password_raw_input) {

            if($password_raw_input !== $confirmed_password_raw_input) {
                $this->notification = "Les mots de passe doivent être identitiques";
                $this->redirect("?url=register/index");
            }

            // pré-traitement de l'email
            $is_true_email = filter_var($email_raw_input, FILTER_VALIDATE_EMAIL);
            if ($is_true_email == false) {
                $this->notification = "L'email que vous avez entré est invalide";
                $this->redirect("?url=register/index");
            }

            $fiber = new Fiber(function () {
                $this->notification = Fiber::suspend("Traitement des informations en cours ...");
            });
            $this->notification = $fiber->start();
            $email = htmlspecialchars(trim($is_true_email));
            $password = htmlspecialchars(trim($password_raw_input));
            $this->register($email, $password);
            $this->notification = $fiber->resume("✅ Authentification terminée");
        } else {
            $this->notification = "Vous devez remplir tous les champs";
            $this->redirect("?url=register/index");
        }
    }


    private function register(string $email, string $password): void { 
        try {
            $query = $this->db->getConnection()->prepare("SELECT * FROM it_creator.users WHERE email = :email");
            $query->execute(['email' => $email]);
            $result = $query->fetch();

            if (is_bool($result)) {   
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = $this->db->getConnection()->prepare("INSERT INTO it_creator.users(email, password) VALUES(?,?)");
                $is_insertation_successful = $query->execute([$email, $hashed_password]);

                if($is_insertation_successful){
                    $this->notification = "Authentification réussie";
                    $query = $this->db->getConnection()->prepare("SELECT * FROM it_creator.users WHERE email = :email AND password = :password");
                    $query->execute(['email' => $email, 'password' => $hashed_password]);
                    $result = $query->fetch();
                  
                    if(!is_bool($result)) {
                        $this->sessionize($result);
                        $this->memorize($result, $this->memoryDb);
                        $this->cookize($result);
                    }
                } 
             
                $this->redirect("?url=dashboard/index");
            } else {
                echo "⛔️";
                $this->notification = "Informations incorrectes";
                $this->redirect("?url=register/index");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            $this->fileLogMessage("auth", "[Register-Error] avec identifiant : $email", "ERROR");
            $this->redirect("?url=register/index");
            exit(1);
        }
    }

 
}
