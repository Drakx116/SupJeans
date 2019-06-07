<?php

class Users
{
    // CHAMPS DE LA TABLE "users"
    private $_id;
    private $_firstName;
    private $_lastName;
    private $_email;
    private $_username;
    private $_password;
    private $_role;
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

    public function __construct(array $users) { $this->hydrate($users); }

    // HYDRATATION

    public function hydrate(array $users)
    {
        foreach($users as $key => $infos)
        {
            $setter = 'set'.ucfirst($key);
            if(method_exists($this, $setter))
            {
                $this->$setter($infos);
            }
        }
    }

    // MUTATEURS

    public function getId() { return $this->_id; }
    public function setId($id) { $this->_id = $id; }

    public function getFirstName() { return $this->_firstName; }
    public function setFirstName($firstName) { $this->_firstName = $firstName; }

    public function getLastName() { return $this->_lastName; }
    public function setLastName($lastName) { $this->_lastName = $lastName; }

    public function getEmail() { return $this->_email; }
    public function setEmail($email) { $this->_email = $email; }

    public function getUsername() { return $this->_username; }
    public function setUsername($username) { $this->_username = $username; }

    public function getPassword() { return $this->_password; }
    public function setPassword($password) { $this->_password = $password; }

    public function getRole() { return $this->_role; }
    public function setRole($role) { $this->_role = $role; }

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