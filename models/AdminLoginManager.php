<?php

class AdminLoginManager extends Database
{
    public function checkLoginInfos($email)
    {
       $this->getDatabase();
       return $this->checkLogin($email);
    }

    public function initSession($email)
    {
        $this->getDatabase();
        return $this->getUniqueInfo("username", "users", "email", $email);
    }

    private function checkLogin($email)
    {
        $infos = "";
        $req_check = self::$_database->prepare("SELECT password FROM users WHERE role = ? AND email = ?");
        $req_check->execute(array("admin", $email));
        $infos = $req_check->fetch(PDO::FETCH_ASSOC);
        $req_check->closeCursor();
        return $infos;
    }
}