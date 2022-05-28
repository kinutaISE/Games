<?php

define('DNS', 'mysql:host=db;dbname=myapp;charset=utf8mb4') ;
define('DB_USER', 'myappuser') ;
define('DB_PASS', 'myapppass') ;

try {
  $pdo = new PDO(
    DNS, DB_USER, DB_PASS,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
  ) ;
}
catch (PDOException $e) {
  echo $e->getMessage() . PHP_EOL ;
  exit ;
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>My Todos</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>Todos</h1>
  <ul>
    <li>
      <input type="checkbox">
      <span>title1</span>
    </li>
    <li>
      <input type="checkbox" checked>
      <span class="done">title2</span>
    </li>
    <li>
      <input type="checkbox">
      <span>title3</span>
    </li>
  </ul>
</body>

</html>
