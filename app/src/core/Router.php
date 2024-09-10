<?php
declare(strict_types=1);
interface RouteContract
{
    public static function route(string $url, PDO $db);
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
        $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';

        if (file_exists($controllerPath)) {

            require_once $controllerPath;
            /*
                The require_once statement is identical to 
                require except PHP will check if the file has already been included, and if so, 
                not include (require) it again.
            */

            $controller = new $controllerName($db);

            if (method_exists($controller, $action)) {
                $controller->$action($param);
            } else {
                echo "⛔️ Action Not Found";
            }
        } else {
            echo "⛔️ Controller Not Found";
        }
    }
}
