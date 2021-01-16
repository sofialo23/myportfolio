<?php

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $db = "events";
/*
  $hostname = "localhost";
  $username = "codeandwine";
  $password = "hzD-Ht2-TQe-3h8";
  $db = "codeandw_events";
*/
  /*$db_link = mysqli_connect($hostname, $username, $password, $db)  ORIGINAL CONNECTION 
  or die("Unable to connect to DB");
 //$seldb = @mysqli_select_db($db_link, "skillsdb");

*/
  $db_link = mysqli_connect($hostname, $username, $password, $db);
  if(!$db_link){
    die("Unable to connect to Database" . mysqli_error($db_link));
  }

  /*
  if(mysqli_connect_error()){
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  */


?>