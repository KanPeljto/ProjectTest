<?php

require_once __DIR__ . "/rest/services/CommentsService.class.php";
require_once  "./../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $comment_text=$_POST["comment"];
    $articleID=$_POST["articleID"];
    $jwt=$_COOKIE["jwt"];
    $decoded = JWT::decode($jwt, new Key("UsirqZajXOvEZMy0wYf4yffugnjVS7IB9IgA9e8/qVg=", 'HS256'));

    
    $username=$decoded->data->username;

    $comments_service=new CommentsService();

    try {
        $result = $comments_service->add_comment($articleID, $comment_text, $username);
        echo json_encode(array("success" => true));
    } catch (Exception $e) {
        echo json_encode(array("success" => false, "message" => $e->getMessage()));
    }
    

    
}