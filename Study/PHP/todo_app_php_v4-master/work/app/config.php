<?php

session_start() ;

define('DNS', 'mysql:host=db;dbname=myapp;charset=utf8mb4') ;
define('DB_USER', 'myappuser') ;
define('DB_PASS', 'myapppass') ;

require_once(__DIR__ . '/Utils.php') ;
require_once(__DIR__ . '/Database.php') ;
require_once(__DIR__ . '/Token.php') ;
require_once(__DIR__ . '/functions.php') ;