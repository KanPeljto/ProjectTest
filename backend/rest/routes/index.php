<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . "/../../../vendor/autoload.php";
require_once __DIR__ . "/../../login.php";
require_once __DIR__ . "/../../add_comment_function.php";
require_once __DIR__ . "/../../checkJWT.php";
require_once __DIR__ . "/../../register.php";
require_once __DIR__ . "/../../get_comments.php";
require_once __DIR__ . "/../../get_article.php";
require_once __DIR__ . "/../../get_article_categorized.php";


$auth=new Authorization();

Flight::route("POST /user/login", function(){
    $raw_data = Flight::request()->getBody();
    $data = json_decode($raw_data, true);
    

    // if (isset($data['email']) && isset($data['password'])) {
    //     $email = $data['email'];
    //     $password = $data['password'];

    //     loginUser($email, $password);
    // } else {
    //     Flight::halt(400, 'Missing email or password');
    // }

    $email = $data['email'];
    $password = $data['password'];

    loginUser($email, $password);
});


Flight::route('GET /hi', function() {
    echo 'Works';
});


Flight::route('POST /add_comment', function() {
    $data = Flight::request()->data;
    $comment_text = $data->comment;
    $articleID = $data->articleID;
    $jwt = $_COOKIE["jwt"];

    $response = addComment($comment_text, $articleID, $jwt);
    Flight::json($response);
})->addMiddleware($auth);

Flight::route('POST /register',function() {
    $data=Flight::request()->data;

    $username=$data->username;
    $email=$data->email;
    $password=$data->password;

    registerUser($email,$username,$password);

});

Flight::route('GET /getcomments', function() {
    load_comments();
});

Flight::route('GET /getarticle',function() {
    load_article();
});

Flight::route('GET /getcategorized',function() {
    load_categorized();
});


Flight::start();