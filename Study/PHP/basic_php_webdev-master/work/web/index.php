<?php

require('../app/functions.php') ;

include('../app/_parts/_header.php') ;

?>

<form action="result.php" method="get">
  <label><input type="radio" name="color" value="green">Green</label>
  <label><input type="radio" name="color" value="red">Red</label>
  <label><input type="radio" name="color" value="yellow">Yellow</label>
  <button>Send</button>
  <a href="reset.php">[reset]</a>
</form>

<?php

include('../app/_parts/_footer.php') ;
