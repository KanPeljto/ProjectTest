<?php

require_once "BaseDAO.class.php";

class UserDAO extends BaseDao{
    public function __construct(){
        parent::__construct('users');
    }

    public function create_user($email,$username,$password){
        $sql="INSERT INTO users (username,email,password,created_at) VALUES (?,?,?,NOW())";
        try{
            $stmt=$this->connection->prepare($sql);

            $stmt->bindParam(1,$email);
            $stmt->bindParam(2,$username);
            $stmt->bindParam(3,$password);

            $result=$stmt->execute();

            return $result;
        } catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }

    public function find_user($email){
        $sql="SELECT * FROM users WHERE email LIKE :email";

        try{

            $stmt=$this->connection->prepare($sql);
            $stmt->bindParam(':email',$email);
            
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "Error " . $e->getMessage();
            return false;
        }
    }

}