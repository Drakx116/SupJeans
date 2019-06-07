<?php

require_once "views/View.php";
class Router
{
    private $_controller;

    public function route()
    {
        spl_autoload_register(function($modelName){
            require_once "models/" . $modelName . ".php";
        });
        if(isset($_GET["action"]))
        {
            $url = explode("/", filter_var($_GET["action"], FILTER_SANITIZE_URL));
            $controllerName = ucfirst(strtolower($url[0]));
            $controllerClass = $controllerName . "Controller";
            $controllerFile = "controllers/" . $controllerClass . ".php";

            if(file_exists($controllerFile))
            {
                require_once $controllerFile;
                $this->_controller = new $controllerClass($url);
            }
            else
            {
                $path = (count($url) > 1) ? "../404" : "error/404";
                header("Location:" . $path);
            }
        }
        else
        {
            header("Location: home");
        }
    }
}