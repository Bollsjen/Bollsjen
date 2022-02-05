<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Routes\Web;
use App\Routes\API;


if(!str_starts_with($_SERVER['REQUEST_URI'], '/api/')){
    $web = new Web();
    $web::init();
}else{
    $api = new API();
    $api::init();
}