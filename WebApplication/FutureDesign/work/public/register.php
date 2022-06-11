<?php

require_once('../app/config.php') ;

include_once('_parts/_header.php') ;

$pdo = Database::getInstance() ;

$user_id = filter_input(INPUT_POST, 'user_id') ;
$password = filter_input(INPUT_POST, 'password') ;
$password_confirmed = filter_input(INPUT_POST, 'password_confirmed') ;
$stmt = $pdo->prepare("
  SELECT * FROM users WHERE id = :user_id
") ;
$stmt->bindValue('user_id', $user_id) ;
$stmt->execute() ;
$user = $stmt->fetch() ;
if ( $user !== false ) {
  $message = '既に同じ ID のユーザーが存在します' ;
  $link = 'signup.php' ;
} else if ($password !== $password_confirmed) {
  $message = '再入力されたパスワードが間違っています' ;
  $link = 'signup.php' ;
} else {
  $stmt = $pdo->prepare(
    "INSERT INTO users (id, password) VALUES (:user_id, :password)"
  ) ;
  $stmt->bindValue('user_id', $user_id) ;
  $stmt->bindValue('password', $password) ;
  $stmt->execute() ;
  $message = '登録が完了しました' ;
  $link = 'login_form.php' ;
}
?>

<body>
  <p><?= $message; ?></p>
  <p><a href="<?= $link; ?>">戻る</a></p>
</body>

<?php

include_once('_parts/_footer.php') ;
