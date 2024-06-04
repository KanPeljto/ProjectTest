<?php

require __DIR__ . "/../../../vendor/autoload.php";
define('BASE_URL','/../../../backend');

$openapi = \OpenApi\Generator::scan(['/../../../backend','./']);
// $openapi->openapi = "3.0.0";
header('Content-Type: application/x-yaml');
echo $openapi->toYaml();
?>