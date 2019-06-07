<?php

class LogoutController
{
    public function __construct()
    {
        $_SESSION = array();
        session_destroy();
        header("Location: " . URL . "home");
    }
}