<?php

require_once(__DIR__ . '/../app/config.php') ;

use MyApp\Database ;
use MyApp\Utils ;
use MyApp\Todo ;

$pdo = Database::getInstance() ;

define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']) ;

// Todo オブジェクトの取得
$todo = new Todo($pdo) ;
// ポストの処理
$todo->processPost() ;
// 全ての todo の取得
$todos = $todo->getAll() ;

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf8mb4">
	<title>MyTodos</title>
	<link rel="stylesheet", href="css/styles.css">
</head>

<body>
  <main>

    <header>
      <h1>Todos</h1>
      <form action="?action=purge" method="post">
        <span class="purge">Purge</span>
        <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']) ;?>">
      </form>
    </header>

    <form action="?action=add" method="post">
      <input type="text" name="content" placeholder="Type a new todo.">
      <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']) ; ?>">
    </form>

  	<ul>
  		<?php foreach ($todos as $todo) :?>
  			<li>
          <form action="?action=toggle" method="post">
    				<input type="checkbox" <?= ($todo->is_done) ? 'checked' : '' ;?> >
            <input type="hidden" name="id" value="<?= $todo->id ;?>">
            <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']) ;?>" >
          </form>

          <span class="<?= ($todo->is_done) ? 'done' : '' ;?>">
            <?= Utils::h($todo->content) ;?>
          </span>

          <form action="?action=delete" method="post" class="delete-form">
            <span class="delete">x</span>
            <input type="hidden" name="id" value="<?= $todo->id ; ?>">
            <input type="hidden" name="token" value="<?= Utils::h($_SESSION['token']) ; ?>">
          </form>
  			</li>
  		<?php endforeach ;?>
  	</ul>
  </main>
  <script src="js/main.js"></script>
</body>

</html>
