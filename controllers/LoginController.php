<?php

class LoginController
{
    private $_manager;
    private $_view;

    public function __construct($url)
    {




if(isset($_SESSION["SupJeans_Client"])) { header("Location: account"); }
        $error = "";
        if(isset($_POST["validateLogin"]))
        {
            $email = "";
            $hash = "";
            $password = "";

            if(!isset($_POST["email"]) || !$_POST["email"]) { $error .= "Empty Email. <br>"; }
            { $email = $_POST["email"]; }

            if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) { $error .= "Invalid Email Format. <br>"; }

            if(!isset($_POST["password"]) || !$_POST["password"]) { $error .= "Empty Password. <br>"; }
            { $password = $_POST["password"]; }

            $this->_manager = new LoginManager;
            $infos = $this->_manager->checkLoginInfos($email);
            foreach($infos as $info)
            { $hash = $info; }
            if($password && !password_verify($password, $hash)) { $error .=  "Invalid identifiers. <br>"; }


            if(!$error)
            {
                $_SESSION["SupJeans_Client"] = $this->_manager->initSession($email);
                header("Location: " . URL . "account");
            }

        }

        $this->_view = new View($url[0]);
        if($error)   {$this->_view->generate(array($error)); }
        else            { $this->_view->generate(array()); }
    }
}