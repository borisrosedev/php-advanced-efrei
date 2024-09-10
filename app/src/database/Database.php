<?php 
require_once dirname(__DIR__, 1)."/config/config.php";
class Database {
    private static ?Database $instance = null;
    private PDO $connexion;

    private function __construct() {
        global $dbHost, $dbUser, $dbName, $dbPassword;
        try {
            $this->connexion = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            die("Erreur de connexion : " . $e->getMessage());
        }
    }


    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connexion;
    }
}