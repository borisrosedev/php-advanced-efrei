<?php 
namespace App\Database;

use App\Config\Config;
use PDO;
use PDOException;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';



class Database {
    private static ?Database $instance = null;
    private PDO $connexion;
    private Config $configInstance;
    private array $dbData;

    private function __construct(Config $config) {
        
        $this->configInstance = $config;
        $this->dbData = $this->configInstance->getMySQLData();
        $dbHost = $this->dbData["db_host"];
        $dbName = $this->dbData["db_name"];
        $dbUser = $this->dbData["db_user"];
        $dbPassword = $this->dbData["db_password"];
      
        try {
            $this->connexion = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("⛔️ Erreur de connexion : " . $e->getMessage());
        }
    }


    public static function getInstance(Config $config): Database {
        if (self::$instance === null) {
            self::$instance = new Database($config);
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connexion;
    }
}