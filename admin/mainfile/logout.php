 <?php
 session_start();
 session_destroy();
 echo "<script type='text/javascript'>setTimeout(function(){window.location = '../../index.php';}, 1);</script>";
 ?>