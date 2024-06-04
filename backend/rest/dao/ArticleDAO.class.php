<?php

require_once "BaseDAO.class.php";

class ArticleDao extends BaseDao{
    public function __construct(){
        parent::__construct('articles');
    }

    public function get_article($articleID){
        $sql= "SELECT * FROM articles WHERE ID=" . $articleID;
        $result= $this->get_result($sql);
        return $result;
        
    }

    public function get_article_categorized($articleCategory) {
        $sql = "SELECT * FROM articles WHERE FIND_IN_SET('$articleCategory', categories) > 0";
        $result = $this->get_result($sql);
        return $result;
    }
    
}


