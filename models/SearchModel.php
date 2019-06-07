<?php

class SearchModel extends API
{
    public function getArticle($articleName)
    {
        $this->getDatabase();
        $cpt = $this->checkSearch($articleName);
        if($cpt)
        {
            return $this->getArticleList($articleName);
        }
    }
}