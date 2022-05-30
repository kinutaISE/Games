<?php

session_start() ;

define('DNS', 'mysql:host=db;dbname=myapp;charset=utf8mb4') ;
define('DB_USER', 'myappuser') ;
define('DB_PASS', 'myapppass') ;

define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']) ;

try {
  $pdo = new PDO(
    DNS, DB_USER, DB_PASS,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => false,
    ]
  ) ;
}
catch (PDOException $e) {
  echo $e->getMessage() ;
  exit ;
}

function getToken()
{
  if ( empty($_SESSION['token']) )
    $_SESSION['token'] = bin2hex( random_bytes(32) ) ;
}

function validateToken($pdo)
{
  $token =
}

function addTodo($pdo)
{
  $add = trim(filter_input(INPUT_POST, 'add', PDO::PARAM_STR)) ;

  if (! empty($add) ) {
    $stmt = $pdo->prepares("INSERT INTO todos (content) VALUES (:add)") ;
    $stmt->bindValue('add', $add) ;
    $stmt->execute() ;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  validateToken($pdo) ;

  addTodo($pdo) ;
  header('Location: ' . SITE_URL) ;
  exit ;
}

$todos = $pdo->query("SELECT * FROM todos") ;

?>

<!DOCTYPE html>

<html>

<head>
  <meta charset="utf8-mb4">
  <title>MyTodos(Copy)</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>Todos</h1>

  <!-- Todo の追加 -->
  <form action="" method="post">
    <input type="text" name="add" placeholder="Type a new todo.">
  </form>

  <!-- Todo の表示 -->
  <ul>
    <?php foreach ($todos as $todo) :?>
      <li>
        <input type="checkbox" <?= $todo->is_done ? 'checked' : '' ?> >
        <span class="<?= $todo->is_done ? 'done' : '' ?>">
          <?= $todo->content ?>
        </span>
      </li>
    <?php endforeach ;?>
  </ul>


</body>

</html>
