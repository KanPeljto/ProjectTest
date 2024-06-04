<?php

require_once "BaseDAO.class.php";

class CommentsDao extends BaseDao{
    public function __construct(){
        parent::__construct('comments');
    }

    public function get_comments($articleID){
        $sql="SELECT * FROM comments WHERE article_id=". $articleID;
        $result=$this->get_result($sql);
        return $result;
    }

    public function add_comment($articleID, $comment, $username) {
        $sql = "INSERT INTO comments (article_id, comment, user_name) VALUES (:articleID, :comment, :username)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':articleID', $articleID);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
    }
    
    
}