<?php

class ErrorController
{
    private $_view;

    public function __construct($url)
    {
        if(!isset($url[1]) or $url[1] != "404")
        {
            header("Location: 404");
        }
        $this->_view = new View($url["0"]);
        $this->_view->generate(array());
    }
}