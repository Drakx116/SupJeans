<?php

class SearchController
{
    private $_manager;
    private $_view;

    public function __construct($url)
    {
        if(isset($_POST["validateSearch"]))
        {
            if(isset($_POST["search"])) {
                header("Location: " . URL . "search/". $_POST["search"]);
            }
        }
        $this->_view = new View($url[0]);
        if(!(empty($url[1])))
        {
            require_once "models/SearchModel.php";
            $this->_manager = new SearchModel;
            $articles = $this->_manager->getArticle($url[1]);
            $this->_view->generate(array($articles));
        }
        else
        {
            $this->_view->generate(array());
        }
    }
}