<?php
    session_start();
    define("URL", str_replace("index.php", "" ,
        (isset($_SERVER["HTTPS"]) ? "https" : "http" . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")
    ));
    define("STORE", "SupJeans");
    require "controllers/Router.php";
    $router = new Router();
    $router->route();