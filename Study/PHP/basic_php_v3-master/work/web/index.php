<!DOCTYPE html>
<?php

require('../app/functions.php') ; // 処理に失敗したらクリティカル→停止するrequire

createToken() ;

include('../app/_parts/_header.php') ;

$filename = '../app/message.txt' ;
$messages = file($filename, FILE_IGNORE_NEW_LINES) ;

?>


<body>

<ul>
<?php foreach ($messages as $message): ?>
    <li><?= $message ; ?></li>
<?php endforeach ; ?>
</ul>

<form action = "result.php" method = "post">
    <input type = "text" name = "message">
    <button>Post</button>
    <input type = "hidden" name = "token" value = "<?= h($_SESSION['token']) ; ?>">
</form>
  
</body>

<?php

include('../app/_parts/_footer.php') ;