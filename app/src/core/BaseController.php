<?php
declare(strict_types=1);
namespace App\Core;
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Config\Config;
use App\Database\Database;
use App\Database\MemoryDatabase;
use App\Traits\FileLoggingTrait;



class BaseController
{
    use FileLoggingTrait;

    protected $db;
    protected MemoryDatabase $memoryDb;
    public function __construct()
    {
        
        $this->db = Database::getInstance(Config::getInstance());
        $this->memoryDb = MemoryDatabase::getInstance(Config::getInstance());
    }



    public function render(string $view, array $data = [])
    {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';

        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            die("La vue {$view} n'existe pas.");
        }
    }


    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }


    public function redirect(string $url)
    {
        header("Location: $url");
        exit(0);
    }

    public function loadModel(string $model)
    {
        //$modelPath = __DIR__ . '/../models/' . $model . '.php';
        $modelName = ucfirst($model);
        $modelNameSpace = "App\\Models\\$modelName";
     
        if (class_exists($modelNameSpace)) {
            //require_once $modelPath;
            return new $modelNameSpace($this->db);;
        } else {
            die("Le modèle {$model} n'existe pas.");
        }
    }
}
