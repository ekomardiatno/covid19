<?php

session_start();

require_once __DIR__.'/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv('./');
$dotenv->load();

require_once __DIR__.'/private/App/init.php';
$app = new App;
$app->route();