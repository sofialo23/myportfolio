<?php
session_start();
if(session_destroy())
{
	echo "You have successfully logged out from your account."; ?>
	<a href="loginpage.php">Go back to login page</a>

<?php
}
?>