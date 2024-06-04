<?php

require_once "BaseDAO.class.php";

class ViewsDao extends BaseDao{

    public function __construct(){
        parent::__construct('views');
    }

    public function countClicks($articleID){
        $sql= "UPDATE views SET clicks=clicks+1 WHERE article_id LIKE " . $articleID;
        $result=$this->get_result($sql);
        return $result;
    }
}