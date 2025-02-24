<?php

session_start() ;

define('DNS', 'mysql:host=db;dbname=myapp;charset=utf8mb4') ;
define('DB_USER', 'myappuser') ;
define('DB_PASS', 'myapppass') ;

spl_autoload_register(function ($class) {
  $prefix = 'MyApp\\' ;

  if ( strpos($class, $prefix) !== 0)
    return ;

  $filename =
    sprintf(
      __DIR__ . '/%s.php',
      substr( $class, strlen($prefix) )
    ) ;

  if (file_exists($filename))
    require($filename) ;
  else {
    echo 'File not found: ' . $filename ;
    exit ;
  }
}) ;
