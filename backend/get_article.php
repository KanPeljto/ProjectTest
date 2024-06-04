<?php


header("Access-Control-Allow-Origin: http://127.0.0.1:3000");

require_once __DIR__ . "./../../Project/backend/rest/services/ArticleService.class.php";

function load_article(){
$article_service=new ArticleService();

$articleID = isset($_GET['articleID']) ? intval($_GET['articleID']) : 0;
$result=$article_service->get_article($articleID);

echo $result;
}


