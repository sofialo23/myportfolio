<?php 
	include("connection.php");
	include("session.php");
	
if(isset($_POST["action"])&&($_POST["action"]=="add")){

	
	$sql = "INSERT INTO `artist`() VALUES (";
	$sql .= "'".$_POST["Stage_name"]."',";
	$sql .= "'".$_POST["Real_name"]."',";
	$sql .= "'".$_POST["Join_date"]."',";
	$sql .= "'".$_POST["Manager"]."',";
	$sql .= "'".$_POST["Age"]."',";
	$sql .= "'".$_POST["Sex"]."')";
	$result = mysqli_query($conn,$sql);
$total_records = mysqli_num_rows($result);
	header("Location: data.php");
}	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Artist management system</title>
</head>
<body bgcolor="#51a072">
<h1 align="center">Artist management system - add new </h1>
<p align="center"><a href="data.php">Home</a></p>
<form action="" method="post" name="formAdd" id="formAdd">
  <table border="1" align="center" cellpadding="4">
    <tr>
      <th>Field</th><th>Data</th>
    </tr>
    <tr>
      <td>Stage name</td><td><input type="text" name="Stage_name" id="Stage_name"></td>
    </tr>
  
      <td>Real name</td><td><input type="text" name="Real_name" id="Real_name"></td>
    </tr>
    <tr>
      <td>Debut date</td><td><input type="text" name="Join_date" id="Join_date"></td>
    </tr>
    <tr>
      <td>Manager </td><td><input type="text" name="Manager" id="Manager"></td>
    </tr>
     <tr>
      <td>Age</td><td><input type="text" name="Age" id="Age"></td>
    </tr>
	 <tr>
      <td>Sex</td><td><input type="text" name="Sex" id="Sex"></td>
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