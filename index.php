<?php

session_start();

require_once './vendor/autoload.php';
$dotenv = new Dotenv\Dotenv('./');
$dotenv->load();

require_once './private/App/init.php';
new Route;
