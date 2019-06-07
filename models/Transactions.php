<?php

class Transactions
{
    private $_id;
    private $_email;
    private $_products;
    private $_price;
    private $_orderDate;
    private $_billingAddress;
    private $_billingPc;
    private $_billingCity;
    private $_billingRegion;
    private $_billingCountry;
    private $_deliveryAddress;
    private $_deliveryPc;
    private $_deliveryCity;
    private $_deliveryRegion;
    private $_deliveryCountry;

    // CONSTRUCTEUR
    public function __construct(array $transaction) { $this->hydrate($transaction); }

    // HYDRATATION

    public function hydrate(array $transaction)
    {
        foreach($transaction as $key => $infos)
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

    public function getEmail() { return $this->_email; }
    public function setEmail($email) { $this->_email = $email; }

    public function getProducts() { return $this->_products; }
    public function setProducts($products) { $this->_products = $products; }

    public function getPrice() { return $this->_price; }
    public function setPrice($price) { $this->_price = $price; }

    public function getOrderDate() { return $this->_orderDate; }
    public function setOrderDate($orderDate) { $this->_orderDate = $orderDate; }

    public function getBillingAddress() { return $this->_billingAddress; }
    public function setBillingAddress($billingAddress) { $this->_billingAddress = $billingAddress; }

    public function getBillingPc() { return $this->_billingPc; }
    public function setBillingPc($billingPc) { $this->_billingPc = $billingPc; }

    public function getBillingCity() { return $this->_billingCity; }
    public function setBillingCity($billingCity) { $this->_billingCity = $billingCity; }

    public function getBillingRegion() { return $this->_billingRegion; }
    public function setBillingRegion($billingRegion) { $this->_billingRegion = $billingRegion; }

    public function getBillingCountry() { return $this->_billingCountry; }
    public function setBillingCountry($billingCountry) { $this->_billingCountry = $billingCountry; }

    public function getDeliveryAddress() { return $this->_deliveryAddress; }
    public function setDeliveryAddress($deliveryAddress) { $this->_deliveryAddress = $deliveryAddress; }

    public function getDeliveryPc() { return $this->_deliveryPc; }
    public function setDeliveryPc($deliveryPc) { $this->_deliveryPc = $deliveryPc; }

    public function getDeliveryCity() { return $this->_deliveryCity; }
    public function setDeliveryCity($deliveryCity) { $this->_deliveryCity = $deliveryCity; }

    public function getDeliveryRegion() { return $this->_deliveryRegion; }
    public function setDeliveryRegion($deliveryRegion) { $this->_deliveryRegion = $deliveryRegion; }

    public function getDeliveryCountry() { return $this->_deliveryCountry; }
    public function setDeliveryCountry($deliveryCountry) { $this->_deliveryCountry = $deliveryCountry; }
}