<?php

require_once __DIR__ . "/../dao/ArticleDAO.class.php";

class ArticleService{
    private $article_dao;
    public function __construct(){
        $this->article_dao=new ArticleDao();
    }
    public function get_article($articleID){
        $article = $this->article_dao->get_article($articleID);
        return json_encode(array('articles' => $article));
    }

    public function get_article_categorized($articleCategory){
        $article= $this->article_dao->get_article_categorized($articleCategory);
        return json_encode(array('articles'=>$article));
    }
}


