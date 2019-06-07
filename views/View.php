<?php

class View
{
    private $_file;
    private $_title;

    public function __construct($action)
    {
        $this->_file = "views/" . ucfirst($action) . "View.php";
        $this->_title = ucfirst($action);
    }

    public function generate($data)
    {
        $viewContent = $this->generateFile($this->_file, $data);
        echo $this->generateFile("views/template.php", array("title" => $this->_title, "content" => $viewContent));
    }

    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);
            ob_start();
            require_once $file;
            return ob_get_clean();
        }
        else
        {
            echo "Fichier vue " . $this->_file . "introuvable";
        }
    }
}