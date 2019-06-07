<?php

class RegisterController
{
    private $_manager;
    private $_view;

    public function __construct($url)
    {
        if(isset($_SESSION["SupJeans_Client"])) { header("Location: account"); }

        $errorMsg = "";
        if(isset($_POST["validateRegistration"]))
        {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirmPassword"];

            $this->_manager = new RegisterManager;
            $invalidEmail = $this->_manager->checkEmail($email);

            if(!($firstName)) { $errorMsg .= "Empty First Name.<br>"; }
            if(!($lastName)) { $errorMsg .= "Empty Last Name.<br>"; }
            if(!($email)) { $errorMsg .= "Empty E-Mail Address.<br>"; }
            if($email and !(filter_var($email, FILTER_VALIDATE_EMAIL))) { $errorMsg .= "Invalid E-Mail Address<br>"; }
            if($invalidEmail) { $errorMsg .= "This E-Mail Address is already stored in the database.<br>"; }
            if(!($username)) { $errorMsg .= "Empty Username.<br>"; }
            if(!($password)) { $errorMsg .= "Empty Password.<br>"; }
            if(!($confirm_password)) { $errorMsg .= "Empty Password Confirmation.<br>"; }
            if($password != $confirm_password) { $errorMsg .= "Passwords are differents <br>"; }

            if(!$errorMsg) {
                $data = array(
                    "firstName" => $firstName,
                    "lastName" => $lastName,
                    "email" => $email,
                    "username" => $username,
                    "password" => password_hash($password, PASSWORD_BCRYPT)
                );
                $this->_manager = new RegisterManager;
                if($this->_manager->insert($data))
                {
                    header("Location: " . URL . "login");
                }
            }
        }

        $this->_view = new View($url[0]);
        if($errorMsg)   {$this->_view->generate(array($errorMsg)); }
        else            { $this->_view->generate(array()); }
    }
}