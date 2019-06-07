<?php

class AdminEditManager extends Database
{

    public function getAllTransactions()
    {
        $this->getDatabase();
        return $this->getAll("transactions", "Transactions");
    }

    public function checkTransaction($id)
    {
        $this->getDatabase();
        return $this->checkId($id);
    }

    public function getTransaction($id)
    {
        $this->getDatabase();
        return $this->getTransactionInfos($id);
    }

    private function checkId($id)
    {
        $req_check = self::$_database->prepare("SELECT id FROM transactions WHERE id = ?");
        $req_check->execute(array($id));
        $req_check->closeCursor();
        return $req_check->rowCount();
    }

    private function getTransactionInfos($id)
    {
        $infos = [];
        $req_transaction = self::$_database->prepare("SELECT * FROM transactions WHERE id = ?");
        $req_transaction->execute(array($id));
        while($result = $req_transaction->fetch(PDO::FETCH_ASSOC))
        {
            $infos = new Transactions($result);
        }
        $req_transaction->closeCursor();
        return $infos;
    }
}