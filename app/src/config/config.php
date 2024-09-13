<?php

namespace App\Config;

use Dotenv\Dotenv;
use Exception;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';


class Config
{
    private static ?Config $instance = null;
    private $envDir;
    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPassword;
    private $appEnv;
    private $memoryDbHost;
    private $memoryDbPort;
    private $memoryDbPassword;


    private function __construct()
    {

        $this->envDir = __DIR__ . "/../../";
        $dotenv = Dotenv::createImmutable($this->envDir);
        $dotenv->load();


        if (!isset($_ENV['DB_HOST'])) {
            throw new Exception("Le fichier .env n'a pas été chargé correctement.");
        }


        $this->dbHost = $_ENV['DB_HOST'] ?? null;
        $this->dbName = $_ENV['DB_NAME'] ?? null;
        $this->dbUser = $_ENV['DB_USER'] ?? null;
        $this->dbPassword = $_ENV['DB_PASSWORD'] ?? null;
        $this->appEnv = $_ENV['APP_ENV'] ?? null;
        $this->memoryDbHost = $_ENV["MEMORY_DB_HOST"] ?? null;
        $this->memoryDbPort = $_ENV["MEMORY_DB_PORT"] ?? null;
        $this->memoryDbPassword = $_ENV['DB_PASSWORD'] ?? null;


        // if ($this->appEnv === 'development') {
        //     error_reporting(E_ALL);
        //     ini_set('display_errors', 1);
        // } else {
        //     error_reporting(0);
        //     ini_set('display_errors', 0);
        // }
    }


    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    public function getMySQLData(): array
    {
        return ["db_host" => $this->dbHost, "db_name"  => $this->dbName, "db_user" => $this->dbUser, "db_password" => $this->dbPassword];
    }

    public function getRedisData(): array
    {

        return ["memory_db_host" => $this->memoryDbHost, "memory_db_port" => $this->memoryDbPort, "memory_db_password" => $this->memoryDbPassword];
    }
}
