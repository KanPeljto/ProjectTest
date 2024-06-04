<?php

require_once __DIR__ . "/../backend/rest/services/UserService.class.php";

function registerUser($email,$username,$password){

$user_service= new UserService();


// $email=$_POST['email'];
// $username=$_POST['username'];
// $password=$_POST['password'];
// $repeated_password = $_POST['password'];






echo json_encode(array(
    "email"=>$email,
    "username"=> $username,
    "password"=>$password
));

if(empty($username)){
    echo json_encode(array(
        "message"=>"username is empty"
    ));
    exit;
}

$jwt_token= $user_service->register_user($username,$email,$password);

if ($jwt_token){
    echo json_encode(array(
        "message"=> "Registration successuful",
        "jwt_token"=>$jwt_token
    ));
} else
{
    

    echo json_encode(array(
        "message"=>"Registration failed"
    ));
}
}