<?php

class RegisterManager extends Database
{
    public function insert($data)
    {
        $this->getDatabase();
        return $this->register($data);
    }

    public function checkEmail($email)
    {
        $this->getDatabase();
        return $this->check($email, "users");
    }

    private function register($data)
    {
        $user = new Users($data);
        $req_insert = self::$_database->prepare("INSERT into users(firstName, lastName, email, username, password) VALUES(?, ?, ?, ?, ?)");
        $req_insert->execute(array($user->getFirstName(), $user->getLastName(), $user->getEmail(), $user->getUsername(), $user->getPassword()));
        return $req_insert->rowCount();
    }
}