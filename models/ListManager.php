<?php

class ListManager extends API
{
    public function getArticles($filter)
    {
        $this->getDatabase();
        return $this->getFilteredAll("products", $filter);
    }

    private function getFilteredAll($tableName, $filter)
    {
        $infos = [];
        $req_filtered = self::$_database->prepare("SELECT * FROM " . $tableName . " ORDER BY " . $filter);
        $req_filtered->execute();
        while($result = $req_filtered->fetch(PDO::FETCH_ASSOC))
        {
            $infos[] = new Products($result);
        }
        $req_filtered->closeCursor();
        return $infos;
    }

}