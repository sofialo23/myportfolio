<?php
/*
$hostname = "localhost";
  $username = "root";
  $password = "";
  $db = "events";
*/

  $hostname = "localhost";
  $username = "u655508457_sofialo23";
  $password = "U655508457_events";
  $db = "u655508457_events";

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