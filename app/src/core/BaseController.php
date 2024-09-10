<?php
declare(strict_types=1);
require_once dirname(__DIR__, 1).'/config/config.php';
require_once dirname(__DIR__, 1).'/traits/FileLoggingTrait.php';
require_once dirname(__DIR__,1).'/database/Database.php';

class BaseController
{
    use FileLoggingTrait;

    protected Database $db;
    public function __construct()
    {
       
        $this->db = Database::getInstance();
        $this->fileLogMessage("base", "BaseController Constructor has been called");
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
        exit;
    }

    public function loadModel(string $model)
    {
        $modelPath = __DIR__ . '/../models/' . $model . '.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model();
        } else {
            die("Le modèle {$model} n'existe pas.");
        }
    }
}
