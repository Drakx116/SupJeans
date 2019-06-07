<?php
class HomeController
{

    private $_manager;
    private $_view;

    public function __construct($url)
    {
        $this->_view = new View($url[0]);
        $this->_view->generate(array());
    }
}