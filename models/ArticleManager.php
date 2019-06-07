<?php

class ArticleManager extends API
{
    public function getArticle($articleName)
    {
        $this->getDatabase();
        return $this->getArticleInfos($articleName);
    }

    public function exists($articleName)
    {
        $this->getDatabase();
        return $this->check($articleName);
    }
}