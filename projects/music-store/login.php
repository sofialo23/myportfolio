<?php

   include("connection.php");
   session_start(); // Starting Session
   $_SESSION['message'] = '';
   
   
      if($_SERVER["REQUEST_METHOD"] == "POST") {
		   if (isset($_POST['login_user'])){
			   
			   $username = mysqli_real_escape_string($conn, $_POST['username']);
			   $password = mysqli_real_escape_string($conn, $_POST['password']);
			 
				
			  $password = md5($password);

			   
			   $sql = "SELECT * FROM accounts WHERE username='$username' and password='$password'";
				$result = mysqli_query($conn,$sql);

				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$active = $row['active'];
			  
				
			  if(mysqli_num_rows($result)==1){
					$_SESSION['message'] = "You have successfully logged in";

					  $_SESSION['login_user'] = $username;
							if($username=='admin')
							header("location: data.php");
							else 
							header("location: user.php");
						
	
			  
		   }
		   
		   else{
					$_SESSION['message'] = "Failed to log in, username or password incorrect";
					header("location: login.php");
			   }
		   }	   
	  }		
?>



<!DOCTYPE html>
<html>
<head>
  <title>Login page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2 id="login-text">Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
  	<div class="input-group" >
  		<label>Username:</label>
  		<input type="text" name="username" required class="regular-input" ">
  	</div>
  	<div class="input-group" >
  		<label>Password:</label>
  		<input type="password" name="password" required class="regular-input" >
  	</div>
  	<div class="input-group" id="submit-btn">
  		<button type="submit" class="button" name="login_user" >Login</button>
  	</div>
  	<p id="signin">
  		Not yet a member? <a href="registration.php">Sign up</a>
  	</p>
  </form>
</body>
</html>