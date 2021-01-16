
<?php
session_name('adb-test');
   session_start();
   
   session_destroy();
      header("Location: login.php");
   
?>