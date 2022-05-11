<?php

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8') ;
}

function createToken()
{
  if ( !isset($_SESSION['token']) )
    $_SESSION['token'] = bin2hex( random_bytes(32) ) ;
}

function validateToken()
{
  $token = filter_input(INPUT_POST, 'token') ;
  if (
    empty($_SESSION['token']) ||
    $_SESSION['token'] !== $token
  ) {
    printf( nl2br("%d" . PHP_EOL), $_SESSION['token'] !== $token) ;
    // printf( nl2br("Your Token: %d / Session Token: %d" . PHP_EOL) , $token, $_SESSION['token']) ;
    echo "SESSION: " . nl2br($_SESSION['token'] . PHP_EOL) ;
    echo "POST: " . nl2br($token . PHP_EOL)  ;
    exit('Invalid Post !') ;
  }
}

session_start() ;
