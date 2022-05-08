<?php

$color = $_SESSION['color'] ?? 'transpearent' ;

?>

<!DOCTYPE html>

<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body style="background-color: <?= h($color) ; ?>">
