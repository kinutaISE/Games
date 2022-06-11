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
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_EMULATE_PREPARES => false,
    ]
  ) ;
}
catch (PDOException $e) {
  echo $e->getMessage() ;
  exit ;
}

$user_id = filter_input(INPUT_POST, 'user_id') ;
$password = filter_input(INPUT_POST, 'password') ;
$stmt = $pdo->prepare("
  SELECT * FROM users WHERE id = :user_id
") ;
$stmt->bindValue('user_id', $user_id) ;
$stmt->execute() ;
$user = $stmt->fetch() ;
?>

<?php
if ( isset($user) && $user->password === $password ) :?>
  <?php
    $_SESSION['user_id'] = $user->id ;
    header('Location: ' . SITE_URL . '/../form.php') ;
    exit ;
  ?>
<!-- ユーザーID、または、パスワードが異なる場合 -->
<?php else :?>
  <?php include_once('_parts/_header.php') ;?>
  <p>ユーザーIDまたはパスワードが間違っています</p>
  <a href="login_form.php">戻る</a>
<?php endif ;?>

<?php

include_once('_parts/_footer.php') ;
