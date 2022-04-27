<!DOCTYPE html>
<?php

require('../app/functions.php') ; // 処理に失敗したらクリティカル→停止するrequire

include('../app/_parts/_header.php') ;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  validateToken() ;
  $message = trim( filter_input(INPUT_POST, 'message') ) ;
  $message = $message !== '' ? $message : '...' ;
  
  $filename = '../app/message.txt' ;
  $fp = fopen($filename, 'a') ;
  fwrite($fp, $message . "\n") ;
  fclose($fp) ;
} else
  exit('Invalid request!') ;



?>


<body>

<p>Message added!</p>
<p><a href=index.php>Go back</a></p>
  
</body>

<?php

include('../app/_parts/_header.php') ;