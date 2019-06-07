<?php

abstract class API
{
    protected static $_database;
    private static $_dsn;
    private static $_name;
    private static $_password;

    // Initialise la connexion à la base de données
    private static function connect()
    {
        self::$_dsn = 'mysql:host=localhost;dbname=api_supjeans;';
        self::$_name = 'root';
        self::$_password = 'a256le8VvbRc5jD4';
        self::$_database = new PDO(self::$_dsn, self::$_name, self::$_password);
        self::$_database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // Retourne la connexion à la base de données
    protected function getDatabase()
    {
        if(!self::$_database)
        {
            self::connect();
        }
        return self::$_database;
    }

    // Retourne le contenu d'une table entière
    protected function getAll($tableName)
    {
        $infos = [];
        $req_all = self::$_database->prepare("SELECT * FROM " . $tableName);
        $req_all->execute(array());
        while($result = $req_all->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Products($result);
        }
        $req_all->closeCursor();
        return $infos;
    }

    // Retourne toutes les informations concernant un article
    protected function getArticleInfos($articleName)
    {
        $infos = [];
        $req_infos = self::$_database->prepare("SELECT * FROM products WHERE title = ?");
        $req_infos->execute(array($articleName));
        while($result = $req_infos->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Products($result);
        }
        $req_infos->closeCursor();
        return $infos;
    }

    // Retourne les articles suivant la recherche effectuée
    protected function  getArticleList($articleName)
    {
        $infos = [];
        $req_articles = self::$_database->prepare("SELECT * FROM products WHERE title LIKE ?");
        $req_articles->execute(array('%'.$articleName.'%'));
        while ($result = $req_articles->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Products($result);
        }
        $req_articles->closeCursor();
        return $infos;
    }

    // Vérifie si un article existe via son nom
    protected function check($articleName)
    {
        $req_exists = self::$_database->prepare("SELECT id FROM products WHERE title LIKE ?");
        $req_exists->execute(array($articleName));
        $req_exists->closeCursor();
        return $req_exists->rowCount();
    }

    // Vérifie si la recherche aboutit à un résultat
    protected function checkSearch($articleName)
    {
        $req_exists = self::$_database->prepare("SELECT id FROM products WHERE title LIKE ?");
        $req_exists->execute(array("%" . $articleName . "%"));
        $req_exists->closeCursor();
        return $req_exists->rowCount();
    }
}