<?php 

header("Content-Type: text/html; charset=utf-8");
include("connection.php");
include("session.php");


if(isset($_POST["action"])&&($_POST["action"]=="add")){
	
	
			$sql = "INSERT INTO `album` (`Name` ,`Release_date` ,`Artist` ,`Number_of_songs` ,`Producer` ,`Price`) VALUES (";
			$sql .= "'".$_POST["Name"]."',";
			$sql .= "'".$_POST["Release_date"]."',";
			$sql .= "'".$_POST["Artist"]."',";
			$sql .= "'".$_POST["Number_of_songs"]."',";
			$sql .= "'".$_POST["Producer"]."',";
			$sql .= "'".$_POST["price"]."')";
			$result =	mysqli_query($conn,$sql);
	
	$total_records = mysqli_num_rows($result);
			header("Location: data.php");
	 
}	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Album management system</title>
</head>
<body bgcolor="#51a072">
<h1 align="center">Albums management system - add new</h1>
<p align="center"><a href="data.php">Home</a></p>
<form action="" method="post" name="formAdd" id="formAdd">
  <table border="1" align="center" cellpadding="4">
    <tr>
      <th>Field</th><th>Data</th>
    </tr>
    <tr>
      <td>Name</td><td><input type="text" name="Name" id="Name"></td>
    </tr>
  
      <td>Release date</td><td><input type="text" name="Release_date" id="Release_date"></td>
    </tr>
    <tr>
      <td>Artist</td><td><input type="text" name="Artist" id="Artist"></td>
    </tr>
    <tr>
      <td>Number of songs</td><td><input type="text" name="Number_of_songs" id="Number_of_songs"></td>
    </tr>
     <tr>
      <td>Producer</td><td><input type="text" name="Producer" id="Producer"></td>
    </tr>
	 <tr>
      <td>Price</td><td><input type="text" name="price" id="price"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input name="action" type="hidden" value="add">
      <input type="submit" name="button" id="button" value="submit">
      <input type="reset" name="button2" id="button2" value="Re-fill">
      </td>
    </tr>
  </table>
</form>
</body>
</html>