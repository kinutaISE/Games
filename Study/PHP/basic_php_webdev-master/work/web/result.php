<?php

require('../app/functions.php') ;

$colorFromGet = filter_input(INPUT_GET, 'color') ?? 'transpearent' ;

$_SESSION['color'] = $colorFromGet ;

include('../app/_parts/_header.php') ;

?>

<p><?= $_SESSION['color'] ; ?></p>

<p><a href="index.php">Go back</a></p>

<?php

include('../app/_parts/_footer.php') ;
