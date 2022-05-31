<?php

class Database
{
  private static $instance ;
  public static function getInstance()
  {
    if ( isset(self::$instance) )
      return ;

    try {
      $instance = new PDO(
        DNS, DB_USER, DB_PASS,
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
          PDO::ATTR_EMULATE_PREPARES => false,
        ]
      ) ;
    }
    catch (PDOException $e) {
      echo $e->getMessage() ;
      exit ;
    }

    return $instance ;
  }
}
