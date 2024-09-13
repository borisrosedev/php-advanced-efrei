<?php 
namespace App\Database;

use App\Config\Config;
use Exception;
use Predis;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';


class MemoryDatabase {
    private static ?MemoryDatabase $instance = null;
    private $connexion;
    private Config $configInstance;
    private array $memoryDbData;

    private function __construct(Config $config) {

        $this->configInstance = $config;
        $this->memoryDbData = $this->configInstance->getRedisData();
        $memoryDbHost = $this->memoryDbData["memory_db_host"] ;
        $memoryDbPort = $this->memoryDbData["memory_db_port"];
        $memoryDbPassword = $this->memoryDbData["memory_db_password"];
        try {
            $this->connexion = new Predis\Client([
                'scheme' => 'tcp',
                'host'   => $memoryDbHost,
                'port'   =>  $memoryDbPort,
            ]);
            $this->connexion->auth($memoryDbPassword);
        } catch (Exception $e) {
            die("Erreur de connexion avec Redis : " . $e->getMessage());
        }
    }


    public static function getInstance(Config $config): MemoryDatabase {
        if (self::$instance === null) {
            self::$instance = new MemoryDatabase($config);
        }
        return self::$instance;
    }

    public function getConnection(): mixed {
        return $this->connexion;
    }
}