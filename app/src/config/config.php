<?php

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

require __DIR__ . '/../../vendor/autoload.php';

$envDir = __DIR__ . "/../../";

try {

    $dotenv = Dotenv\Dotenv::createImmutable($envDir);
    $dotenv->load();  
    
    if (!isset($_ENV['DB_HOST'])) {
        throw new Exception("Le fichier .env n'a pas été chargé correctement.");
    }

    $dbHost = $_ENV['DB_HOST'] ?? null;
    $dbName = $_ENV['DB_NAME'] ?? null;
    $dbUser = $_ENV['DB_USER'] ?? null;
    $dbPassword = $_ENV['DB_PASSWORD'] ?? null;
    $appEnv = $_ENV['APP_ENV'] ?? null;

    $log = new Logger('env');
    $log->pushHandler(new StreamHandler(dirname(__DIR__, 1).'/logs/env.log', Logger::INFO));
    $log->info("ENV ✅: $dbHost $dbUser");
 
} catch (Exception $e) {
    $log = new Logger('env-error');
    $log->pushHandler(new StreamHandler(dirname(__DIR__, 1).'../logs/env.log', Logger::ERROR));
    $log->error("ENV: ⛔️ERROR". $e->getMessage());
}


// if ($appEnv === 'development') {
//     error_reporting(E_ALL);
//     ini_set('display_errors', 1);
// } else {
//     error_reporting(0);
//     ini_set('display_errors', 0);
// }

