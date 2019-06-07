<?php

class AccountController
{
    private $_manager;
    private $_view;

    public function __construct($url)
    {

        $username = "";
        foreach($_SESSION["SupJeans_Client"] as $info) { $username = $info; }
        if(isset($url[1]))
        {
            switch($url[1])
            {
                case "settings":
                    $error = "";
                    if(isset($_POST["validateAddress"]))
                    {
                        $billingAdress = "";
                        $billingPc = "";
                        $billingCity = "";
                        $billingRegion = "";
                        $billingCountry = "";
                        $deliveryAdress = "";
                        $deliveryPc = "";
                        $deliveryCity = "";
                        $deliveryRegion = "";
                        $deliveryCountry = "";

                        if(!(isset($_POST["billingAddress"])) || !($_POST["billingAddress"])) { $error .= "Empty Billing Address. <br>"; }
                        else { $billingAdress = $_POST["billingAddress"]; }
                        if(!(isset($_POST["billingPc"])) || !($_POST["billingPc"])) { $error .= "Empty Billing Postal Code. <br>"; }
                        else { $billingPc = $_POST["billingPc"]; }
                        if(!(isset($_POST["billingCity"])) || !($_POST["billingCity"])) { $error .= "Empty Billing City. <br>"; }
                        else { $billingCity = $_POST["billingCity"]; }
                        if(!(isset($_POST["billingRegion"])) || !($_POST["billingRegion"])) { $error .= "Empty Billing Region. <br>"; }
                        else { $billingRegion = $_POST["billingRegion"]; }
                        if(!(isset($_POST["billingCountry"])) || !($_POST["billingCountry"])) { $error .= "Empty Billing Country. <br>"; }
                        else { $billingCountry = $_POST["billingCountry"]; }

                        if(!(isset($_POST["sameAddress"])))
                        {
                            if(!(isset($_POST["deliveryAddress"])) || !($_POST["deliveryAddress"])) { $error .= "Empty Delivery Address. <br>"; }
                            { $deliveryAdress = $_POST["billingAddress"]; }
                            if(!(isset($_POST["deliveryPc"])) || !($_POST["deliveryPc"])) { $error .= "Empty Delivery Postal Code. <br>"; }
                            { $deliveryPc = $_POST["deliveryPc"]; }
                            if(!(isset($_POST["deliveryCity"])) || !($_POST["deliveryCity"])) { $error .= "Empty Delivery City. <br>"; }
                            { $deliveryCity = $_POST["deliveryCity"]; }
                            if(!(isset($_POST["deliveryRegion"])) || !($_POST["deliveryRegion"])) { $error .= "Empty Delivery Region. <br>"; }
                            { $deliveryRegion = $_POST["deliveryRegion"]; }
                            if(!(isset($_POST["deliveryCountry"])) || !($_POST["deliveryCountry"])) { $error .= "Empty Delivery Country. <br>"; }
                            { $deliveryCountry = $_POST["deliveryCountry"]; }
                        }
                        else
                        {
                            $deliveryAdress = $billingAdress;
                            $deliveryPc = $billingPc;
                            $deliveryCity = $billingCity;
                            $deliveryRegion = $billingRegion;
                            $deliveryCountry = $billingCountry;
                        }

                        if(!($error))
                        {
                            $address = array(
                                "billingAddress" => $billingAdress,
                                "billingPc" => $billingPc,
                                "billingCity" => $billingCity,
                                "billingRegion" => $billingRegion,
                                "billingCountry" => $billingCountry,
                                "deliveryAddress" => $deliveryAdress,
                                "deliveryPc" => $deliveryPc,
                                "deliveryCity" => $deliveryCity,
                                "deliveryRegion" => $deliveryRegion,
                                "deliveryCountry" => $deliveryCountry
                            );

                            $this->_manager = new AccountManager;
                            if($this->_manager->insertAddress($address, $username))
                            { header("Location: " . URL . "account"); }
                        }

                        echo $error;
                    }

                    $this->_view = new View($url[1]);
                    $this->_view->generate(array($error));
                    break;

                case "transactions":
                    $this->_manager = new AccountManager;
                    $mail_infos =  $this->_manager->getEmail($username);
                    $mail = "";
                    foreach($mail_infos as $get_mail)
                    { $mail = $get_mail; }

                    $transactions = $this->_manager->getTransactions($mail);


                    $this->_view = new View($url[1]);
                    $this->_view->generate($transactions);
                    break;

                default:
                    header("Location: " . URL . "account");
            }
        }

        $username = "";
        foreach($_SESSION["SupJeans_Client"] as $infos) { $username = $infos; }
        $this->_manager = new AccountManager;
        $infos = $this->_manager->getAccount($username);
        $this->_view = new View($url[0]);
        $this->_view->generate(array($infos));

    }
}