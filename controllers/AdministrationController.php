<?php

class AdministrationController
{
    private $_manager;
    private $_view;

    public function __construct($url)
    {
        $error = "";
        if(isset($_SESSION["SupJeans_Admin"]))
        {
            if(isset($url[1]))
            {
                switch($url[1])
                {
                    case "edit":
                        if(isset($url[2]))
                        {
                            require_once "fpdf/fpdf.php";
                            $this->_manager = new AdminEditManager;
                            if($this->_manager->checkTransaction($url[2]))
                            {
                                $infos = $this->_manager->getTransaction($url[2]);
                                $this->_view = new View("AdminEdit");
                                $this->_view->generate(array($infos));
                            }
                            else { header("Location: " . URL . "administration/transactions"); }

                        }
                        else
                        {
                            header("Location: " . URL . "administration");
                        }
                        break;

                    case "transactions":
                        $this->_manager = new AdminEditManager;
                        $transactions = $this->_manager->getAllTransactions();
                        $this->_view = new View("AdminTransactions");
                        $this->_view->generate($transactions);
                        break;

                    default:
                        header("Location: ../administration");
                        break;
                }
            }
            else
            {
                $this->_view = new View($url[0]);
                $this->_view->generate(array());
            }
        }
        else
        {
            if(count($url) > 1)
            {
                header("Location: ../administration");
            }

            if(isset($_POST["validateAdminLogin"]))
            {
                $email = "";
                $password = "";
                $hash = "";

                if(!isset($_POST["email"]) || !$_POST["email"]) { $error .= "Empty Email. <br>"; }
                { $email = $_POST["email"]; }

                if(!(filter_var($email, FILTER_VALIDATE_EMAIL))) { $error .= "Invalid Email Format. <br>"; }

                if(!isset($_POST["password"]) || !$_POST["password"]) { $error .= "Empty Password. <br>"; }
                { $password = $_POST["password"]; }

                if($email && $password)
                {

                    $this->_manager = new AdminLoginManager;
                    $infos = $this->_manager->checkLoginInfos($email);
                    if($infos)
                    {
                        foreach($infos as $info)
                        { $hash = $info; }
                    }
                    else { $error .= "You are not allowed to access the admin panel. <br>"; }
                }

                if($password && !password_verify($password, $hash)) { $error .=  "Invalid identifiers. <br>"; }

                if(!$error)
                {
                    if(isset($_SESSION["SupJeans_Client"]))
                    {
                        $_SESSION = array();
                        session_destroy();
                    }
                    $_SESSION["SupJeans_Admin"] = $this->_manager->initSession($email);
                    header("Location: " . URL . "administration");
                }
            }

            $this->_view = new View("AdminConnection");
            if($error)  { $this->_view->generate(array($error)); }
            else { $this->_view->generate(array()); }
        }
    }
}