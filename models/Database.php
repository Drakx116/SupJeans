<?php

abstract class Database
{
    protected static $_database;
    private static $_dsn;
    private static $_name;
    private static $_password;

    private static function connect()
    {
        self::$_dsn = 'mysql:host=localhost;dbname=supjeans;';
        self::$_name = 'root';
        self::$_password = 'a256le8VvbRc5jD4';
        self::$_database = new PDO(self::$_dsn, self::$_name, self::$_password);
        self::$_database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getDatabase()
    {
        if(!self::$_database)
        {
            self::connect();
        }
        return self::$_database;
    }

    protected function getAll($table, $className)
    {
        $infos = [];
        $req_all = self::$_database->prepare("SELECT * FROM " . $table);
        $req_all->execute();
        while($result = $req_all->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new $className($result);
        }
        $req_all->closeCursor();
        return $infos;
    }

    protected function getUniqueInfo($info, $table, $field, $cond)
    {
        $req_info = self::$_database->prepare("SELECT " . $info . " FROM " . $table . " WHERE " . $field .  " = ?");
        $req_info->execute(array($cond));
        return $req_info->fetch(PDO::FETCH_ASSOC);
    }

    protected function check($value, $table)
    {
        $req_check = self::$_database->prepare("SELECT id FROM " . $table . " WHERE email = ?");
        $req_check->execute(array($value));
        return $req_check->rowCount();
    }
}