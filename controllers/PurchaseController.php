<?php

class PurchaseController
{
    private $_manager;
    private $_view;

    public function __construct($url)
    {
        $data = [];
        $error = "";
        $path = "";

        if(isset($_SESSION["SupJeans_Client"])) {

            $session = "";
            foreach($_SESSION["SupJeans_Client"] as $name) { $session = $name; }
            $this->_manager = new PurchaseModel;

            if($this->_manager->checkAddress($session))
            {
                $data = $this->_manager->getUserInformations($session);

                if(isset($_POST["validatePurchase"]))
                {
                    date_default_timezone_set('Europe/Paris');
                    $price = 0;
                    foreach($_COOKIE["SupJeans_Cart"] as $key => $article)
                    {
                        $article = unserialize($article);
                        $price += $article["price"];
                    }

                    $transaction = array(
                        "email" => $_POST["email"],
                        "products" => serialize($_COOKIE["SupJeans_Cart"]),
                        "price" => number_format($price, "2"),
                        "orderDate" => date("Y-m-d H:i:s"),
                        "billingAddress" => $_POST["billingAddress"],
                        "billingPc" => $_POST["billingPc"],
                        "billingCity" => $_POST["billingCity"],
                        "billingRegion" => $_POST["billingRegion"],
                        "billingCountry" => $_POST["billingCountry"],
                        "deliveryAddress" => $_POST["deliveryAddress"],
                        "deliveryPc" => $_POST["deliveryPc"],
                        "deliveryCity" => $_POST["deliveryCity"],
                        "deliveryRegion" => $_POST["deliveryRegion"],
                        "deliveryCountry" => $_POST["deliveryCountry"]
                    );

                    if($this->_manager->insertTransaction($transaction)) {
                        $pos = [];
                        foreach($_COOKIE["SupJeans_Cart"] as $key => $value) { $pos[] = $key; }

                        $cpt = count($_COOKIE["SupJeans_Cart"]);
                        for($i = 0; $i < $cpt; $i++)
                        {
                            $cookieName = "SupJeans_Cart[". $pos[$i] ."]";
                            setcookie($cookieName, "", time()-1, "/");
                            unset($_COOKIE[$cookieName]);
                        }
                        header("Location: " . URL . "account/transactions");
                    }
                }

            }
            else
            {
                $error = "You need to save a Billing and a Delivery Address in the Settings before proceing the payment.";
                $path = "account/settings";
                $data = array("error" => $error, "path" => $path);
            }

            if(!isset($_COOKIE["SupJeans_Cart"]))
            {
                $error = "Your Cart is Empty. You can not proceed the payment.";
                $path = "cart";
                $data = array("error" => $error, "path" => $path);
            }

            $this->_view = new View($url[0]);
            $this->_view->generate(array($data));
        }
        else
        {
            $error = "You must be logged to proceed payment.";
            $path = "login";
            $data = array("error" => $error, "path" => $path);
            $this->_view = new View($url[0]);
            $this->_view->generate(array($data));
        }
    }
}