<?php

class LoginController extends BaseController {

    public function index() 
    {
        $data = [
            "register_href" => "/app/public?url=register/index",
            "title" => "Connexion",
            "form_fields" => [
                [
                    "name"=> "email",
                    "placeholder" => "Entrez votre email",
                    "type" => "email",
                    "pattern" => "[a-z0-9]{2,20}[@]{1}[a-z]{3,7}[.]{1}[a-z]{2,5}",
                    "id" => "email"
                ],
                [
                    "name"=> "password",
                    "placeholder" => "Entrez votre mot de passe",
                    "type" => "password",
                    "pattern" => "[a-z0-9@$!%?&]{12,50}/i",
                    "id" => "password"
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

}


