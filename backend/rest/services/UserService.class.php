<?php
use Firebase\JWT\JWT;

require __DIR__ . '/../../../vendor/autoload.php';


require_once __DIR__ . '/../dao/UserDAO.class.php';

class UserService{
    private $user_dao;

    public function __construct(){
        $this->user_dao=new UserDAO();
    }

    public function register_user($username,$email,$password){
        $hashed_pass=password_hash($password,PASSWORD_DEFAULT);
        return $this->user_dao->create_user($username,$email,$hashed_pass);
    }

    public function login_user($email,$password){
        $user=$this->user_dao->find_user($email);

        

        if($user && password_verify($password,$user['password'])){

            

            $secret_key="UsirqZajXOvEZMy0wYf4yffugnjVS7IB9IgA9e8/qVg=";
            $issuer_claim="localhost";
            $issued_at_claim=time();
            $expire_claim=$issued_at_claim + 3600;

            $token= array(
                "iss" => $issuer_claim,
                "iat" => $issued_at_claim,
                "exp" => $expire_claim,
                "data" => array(
                    "user_id"=>$user['id'],
                    "username"=>$user['username']
                )
            );

            $jwt= JWT::encode($token,$secret_key,'HS256');
            return array(
                "jwt"=>$jwt,
                "user"=>$user
            );




        } 
        else
        {
            return false;
        }
    }

}