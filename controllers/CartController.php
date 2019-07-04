<?php

class CartController
{
    private $_view;

    public function __construct($url)
    {

        if(isset($_COOKIE["SupJeans_Cart"]))
        {
            if(isset($_POST["drain_cart"])) 
            {
                $this->delete_all();
            }
            if(isset($_POST["delete_article"]))
            { 
                $this->delete_article(); 
            }
        }

        $this->_view = new View($url[0]);
        $this->_view->generate(array());
    }

    private function delete_all()
    {
        $pos = [];
        foreach($_COOKIE["SupJeans_Cart"] as $key => $value) { $pos[] = $key; }

        $cpt = count($_COOKIE["SupJeans_Cart"]);
        for($i = 0; $i < $cpt; $i++)
        {
            $cookieName = "SupJeans_Cart[". $pos[$i] ."]";
            setcookie($cookieName, "", time()-1, "/");
            unset($_COOKIE[$cookieName]);
        }
        header("Location:" . URL . "cart");
    }

    private function delete_article()
    {
        $pos = [];
        foreach($_COOKIE["SupJeans_Cart"] as $key => $value) { $pos[] = $key; }

        $id = $_POST["article_id"];
        $cookieName = "SupJeans_Cart[". $pos[$id] ."]";
        setcookie($cookieName, "", time()-1, "/");
        unset($_COOKIE[$cookieName]);
        header("Location:" . URL . "cart");
    }
}