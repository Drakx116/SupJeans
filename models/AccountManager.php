<?php

class AccountManager extends Database
{
    public function getAccount($username)
    {
        $this->getDatabase();
        return $this->getAccountInfos($username);
    }

    public function insertAddress($address, $username)
    {
        $this->getDatabase();
        return $this->insertAddressValues($address, $username);
    }

    public function getEmail($username)
    {
        $this->getDatabase();
        return $this->getUniqueInfo("email", "users", "username", $username);
    }

    public function getTransactions($mail)
    {
        $this->getDatabase();
        return $this->getAllTransactions($mail);
    }

    private function getAccountInfos($username)
    {
        $infos = [];
        $req_infos = self::$_database->prepare("SELECT firstName, lastName, email, billingAddress, billingPc, billingCity, billingRegion, billingCountry, deliveryAddress, deliveryPc, deliveryCity, deliveryRegion, deliveryCountry FROM users WHERE username = ?");
        $req_infos->execute(array($username));
        while($result = $req_infos->fetch(PDO::FETCH_ASSOC))
        {
            $infos = new Users($result);
        }
        $req_infos->closeCursor();
        return $infos;
    }

    private function insertAddressValues($address, $username)
    {
        $users = new Users($address);
        $req_insert = self::$_database->prepare("UPDATE users SET billingAddress = ?, billingPc = ?, billingCity = ? , billingRegion = ? ,billingCountry = ?, deliveryAddress = ?, deliveryPc = ?, deliveryCity = ?, deliveryRegion = ? , deliveryCountry = ? WHERE username = ?");
        $req_insert->execute(array($users->getBillingAddress(), $users->getBillingPc(), $users->getBillingCity(), $users->getBillingRegion() , $users->getBillingCountry(), $users->getDeliveryAddress(), $users->getDeliveryPc(), $users->getDeliveryCity(), $users->getDeliveryRegion(), $users->getDeliveryCountry(), $username));

        $req_insert->closeCursor();
        return $req_insert->rowCount();
    }

    private function getAllTransactions($mail)
    {
        $infos = [];
        $req_transactions = self::$_database->prepare("SELECT * FROM transactions WHERE email = ?");
        $req_transactions->execute(array($mail));
        while($result = $req_transactions->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Transactions($result);
        }
        $req_transactions->closeCursor();
        return $infos;
    }
}