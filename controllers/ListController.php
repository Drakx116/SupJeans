<?php

class ListController  {

    private $_manager;
    private $_view;

    public function __construct($url)
    {
        $this->_manager = new ListManager;
        $filter = "title ASC";
        if($_POST)
        {
            if(isset($_POST["title-ASC"])) { $filter = "title ASC"; }
            if(isset($_POST["title-DESC"])) { $filter = "title DESC"; }
            if(isset($_POST["price-ASC"])) { $filter = "price ASC"; }
            if(isset($_POST["price-DESC"])) { $filter = "price DESC"; }
            if(isset($_POST["category"])) { $filter = "category, title"; }
        }
        $articles = $this->_manager->getArticles($filter);
        $this->_view = new View($url[0]);
        $this->_view->generate(array("data" => $articles, "filter" => $filter));
    }
}