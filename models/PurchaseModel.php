<?php

class PurchaseModel extends Database
{
    public function checkAddress($username)
    {
        $this->getDatabase();
        return$this->getAddressState($username);
    }

    public function getUserInformations($username)
    {
        $this->getDatabase();
        return $this->getInfos($username);
    }

    public function insertTransaction($detail)
    {
        $this->getDatabase();
        return $this->insertOrderTransaction($detail);
    }

    private function getAddressState($username)
    {
        $req_state = self::$_database->prepare("SELECT billingAddress FROM users WHERE username = ?");
        $req_state->execute(array($username));
        while($infos = $req_state->fetch(PDO::FETCH_ASSOC))
        {
            if(!$infos["billingAddress"]) { return 0; }
            return 1;
        }
    }

    private function getInfos($username)
    {
        $infos = [];
        $req_address = self::$_database->prepare("SELECT firstName, lastName, email, billingAddress, billingPc, billingCity, billingRegion,billingCountry, deliveryAddress, deliveryPc, deliveryCity, deliveryRegion, deliveryCountry FROM users WHERE username = ?");
        $req_address->execute(array($username));
        while($result = $req_address->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Users($result);
        }
        $req_address->closeCursor();
        return $infos;
    }

    private function insertOrderTransaction($detail)
    {
        $transaction = new Transactions($detail);
        $req_insert = self::$_database->prepare("INSERT INTO transactions(email, products, price, orderDate, billingAddress, billingPc, billingCity, billingRegion,	billingCountry,	deliveryAddress, deliveryPc, deliveryCity, deliveryRegion, deliveryCountry) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $req_insert->execute(array($transaction->getEmail(), $transaction->getProducts(), $transaction->getPrice(), $transaction->getOrderDate(), $transaction->getBillingAddress(), $transaction->getBillingPc(), $transaction->getBillingCity(), $transaction->getBillingRegion(), $transaction->getBillingCountry(), $transaction->getDeliveryAddress(), $transaction->getDeliveryPc(), $transaction->getDeliveryCity(), $transaction->getDeliveryRegion(), $transaction->getDeliveryCountry()));
        $req_insert->closeCursor();
        return $req_insert->rowCount();
    }
}