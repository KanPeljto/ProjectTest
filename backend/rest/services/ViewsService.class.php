<?php

require_once __DIR__ . "/../dao/ViewsDAO.class.php";

class ViewsService{

    private $views_dao;

    public function __construct(){
        $this->views_dao=new ViewsDao();
    }

    public function countClicks($articleID){

        return $this->views_dao->countClicks($articleID);

    }

}


