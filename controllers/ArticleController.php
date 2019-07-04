<?php

class ArticleController
{

    private $_manager;
    private $_view;
    private $_productName;
    private $_content;

    public function __construct($url)
    {
        if(isset($url[1]) and !(empty($url[1])))
        {
            if(isset($_POST["validate-add-cart"]))
            {
                $cart_content = array(
                    "name" => $url[1],
                    "size" => $_POST["size_select"],
                    "price" => $_POST["price"]
                );

                $index = 0;
                if(isset($_COOKIE["SupJeans_Cart"]))
                {
                    $index =  count($_COOKIE["SupJeans_Cart"]);
                }
                $this->addArticleToCart($cart_content, $index);
                header("Location: " . URL . "list");
            }

            $this->isValidArticle($url[1]);
            $this->getArticleContent($url[1]);
            switch($url[1])
            {
                // Cas d'un produit existant dans l'API
                case $this->_productName:
                    $this->_view = new View("Article");
                    $this->_view->generate(array("data" => $this->_content));
                    break;
                default:
                    header("Location: ../error");
            }
        }
        else {
            header("Location: " . URL . "list");
        }
    }


    private function isValidArticle($articleName)
    {
        require_once "models/ArticleManager.php";
        $this->_manager = new ArticleManager();
        if($this->_manager->exists($articleName)) // Vérifie si le paramètre correspond au titre d'un article
        {
            $this->_productName = $articleName;
        }
        else
        {
            echo "Produit Invalide";
        }
    }

    private function getArticleContent($articleName)
    {
        $this->_manager = new ArticleManager();
        $this->_content = $this->_manager->getArticle($articleName);
    }

    private function addArticleToCart($content, $pos)
    {
        $cookieName = "SupJeans_Cart[" . $pos . "]";
        setcookie($cookieName, serialize($content), time() + 3600, "/");
    }

}