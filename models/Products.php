<?php

class Products
{
    private $_id;
    private $_title;
    private $_size;
    private $_price;

    // CONSTRUCTEUR

    public function __construct(array $products) { $this->hydrate($products); }

    // HYDRATATION

    public function hydrate(array $products)
    {
        foreach($products as $key => $infos)
        {
            $setter = 'set'.ucfirst($key);
            if(method_exists($this, $setter))
            {
                $this->$setter($infos);
            }
        }
    }

    public function getId() { return $this->_id; }
    public function setId($id) { $this->_id = $id; }

    public function getTitle() { return $this->_title; }
    public function setTitle($title) { $this->_title = $title; }

    public function getSize() { return $this->_size; }
    public function setSize($size) { $this->_size = $size; }

    public function getPrice() { return $this->_price; }
    public function setPrice($price) { $this->_price = $price; }
}