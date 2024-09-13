<?php
namespace App\Core;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';


interface RouteContract
{
    public static function route(string $url, mixed $db);
}


class Router implements RouteContract
{

    public static function route(string $url, $db)
    {

        //ic $url peut être égale à /home/index
        $url = explode('/', trim($url, '/'));
        // ici $url est égale à ['home', 'index']
        $controllerName = ucfirst(array_shift($url)) . 'Controller';
        // ici $controllerName est égale à  HomeController
        $action = array_shift($url);
        // ici $action est égale à index
        $param = array_shift($url);
        // ic $param es égale à null
        //$controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';
        $controllerNamespace = "App\\Controllers\\$controllerName";
        if (class_exists($controllerNamespace)) {
            $controller = new $controllerNamespace($db);

            if (method_exists($controller, $action)) {
                $controller->$action($param);
            } else {
                echo "⛔️ Action Not Found";
            }
        } else {
            echo "⛔️ Class Not Found";
        }
    }
}

?>