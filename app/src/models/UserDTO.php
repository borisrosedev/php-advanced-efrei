<?php

class UserDTO {

    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password; 
    private float $wallet;
    private string $tools;


    public function __construct($jsonString) {
     
        $data = json_decode($jsonString);


        if ($data === null) {
            throw new Exception("Invalid JSON string");
        }
        
        foreach ($data as $key => $value) {

            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    // Fonction pour afficher les informations de l'utilisateur (à des fins de test)
    public function displayInfo() {
        echo "Prénom: $this->firstname\n";
        echo "Nom: $this->lastname\n";
        echo "Email: $this->email\n";
        echo "Portefeuille: $this->wallet\n";
        echo "Outils: $this->tools";
   
    }
}


