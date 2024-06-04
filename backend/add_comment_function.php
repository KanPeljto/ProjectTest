<?php

require_once __DIR__ . "/rest/services/CommentsService.class.php";
require_once __DIR__ . "/../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function addComment($comment_text, $articleID, $jwt) {
    try {
        $decoded = JWT::decode($jwt, new Key("UsirqZajXOvEZMy0wYf4yffugnjVS7IB9IgA9e8/qVg=", 'HS256'));
        $username = $decoded->data->username;

        $comments_service = new CommentsService();
        $result = $comments_service->add_comment($articleID, $comment_text, $username);

        return array("success" => true);
    } catch (Exception $e) {
        return array("success" => false, "message" => $e->getMessage());
    }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $comment_text = $_POST["comment"];
//     $articleID = $_POST["articleID"];
//     $jwt = $_COOKIE["jwt"];

//     $response = addComment($comment_text, $articleID, $jwt);
//     echo json_encode($response);
// }
