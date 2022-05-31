<?php

class Token
{
  // トークンの作成
  public static function create()
  {
    $_SESSION['token'] = isset($_SESSION['token']) ?
      $_SESSION['token'] :
      bin2hex( random_bytes(32) ) ;
  }
  // トークンのチェック
  public static function validate()
  {
    if (
      empty($_SESSION['token']) ||
      $_SESSION['token'] !== filter_input(INPUT_POST, 'token')
      )
        exit('Invalid post request!') ;
  }
}
