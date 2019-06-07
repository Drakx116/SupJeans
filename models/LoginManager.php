<?php

class LoginManager extends Database
{
    public function checkLoginInfos($email)
    {
        $this->getDatabase();
        return $this->getUniqueInfo("password", "users", "email", $email);
    }

    public function connectUser($data)
    {
        $this->getDatabase();
        $user = new Users($data);
        $req_connect = self::$_database->prepare("SELECT id FROM users WHERE email = ? AND password = ?");
        $req_connect->execute(array($user->getEmail(), $user->getPassword()));
        return $req_connect->rowCount();
    }

    public function initSession($email)
    {
        $this->getDatabase();
        return $this->getUniqueInfo("username", "users", "email", $email);
    }
}