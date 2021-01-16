<?php 
	
	if(isset($_GET['vkey'])){
		include ('conn.php');
		//PROCESS THE VERIFICATION
		$vkey = $_GET['vkey'];
		$query = "SELECT verified, vkey FROM user_info WHERE verified = 0 AND vkey = '$vkey' LIMIT 1";
		$result = mysqli_query($db_link,$query);

		if(mysqli_num_rows($result) ==1 ){
				// 	VALIDATE THE EMAIL
			$updatequery = "UPDATE user_info SET verified = 1 WHERE vkey = '$vkey' LIMIT 1";
			$update = mysqli_query($db_link,$updatequery);
			if($update){
				echo "Your account has been verified. You may now login.";
			}
			else{
				$mysqli->error;
			}
		}
		else{
			echo "This account is invalid or has been already verfied";
		}
		
	}
	else {
		die("Something went wrong");
	}
 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<a href="loginpage.php">Go to Login Page</a>
 </body>
 </html>	
