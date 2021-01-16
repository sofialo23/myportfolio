
<?php
include("connection.php");

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//make sure 2 passwords are equal
	
	if ($_POST['password'] == $_POST['confirmpassword']) 
    {
		$username = $conn->real_escape_string($_POST['username']);
		$email = $conn->real_escape_string($_POST['email']);
		$password = md5($_POST['password']);
		
		$_SESSION['username'] = $username;
		
		$sql = "INSERT INTO accounts (username, email, password) "
		. "VALUES ('$username', '$email', '$password')";
	
			if ($conn->query($sql) === true){
				$_SESSION['message'] = "Registration succesful! Added $username to the database!";
				//redirect the user to welcome.php
				header( "location: login.php" );
			}
			else{
				$_SESSION['message'] = "User could not be added to the database";
			}
			
    }
	else {
		$_SESSION['message'] = "The passwords do not match";
	}
	
}

?>


<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="style.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1 id="login-text">Create an account</h1>
    <form class="form" action="registration.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
	      <input type="text" placeholder="User Name" name="username" required class="regular-input" /> </br>
	      <input type="email" placeholder="Email" name="email" required class="regular-input" /></br>
	      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required class="regular-input" /></br>
	      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required class="regular-input"/></br>
	      <input type="submit" value="Register" name="register" class="button" />
    </form>
  </div>
</div>