<?php 
include("connection.php");
include("session.php");

if(isset($_POST["action"])&&($_POST["action"]=="update")){
 $sql=("UPDATE `album` SET 
 `Name`='$_POST[Name]', 
 `Release_date`='$_POST[Release_date]',
 `Artist`='$_POST[Artist]', 
 `Number_of_songs`='$_POST[Number_of_songs]', 
 `Producer`='$_POST[Producer]', 
 `Price`='$_POST[Price]' 
 WHERE `Name`='".$_POST['Name']."'");
mysqli_query($conn,$sql);
	header("Location: data.php");

}
$sql_db = ("SELECT * FROM `album` WHERE `Name`= '".$_GET['id']."'");
$result = mysqli_query($conn,$sql_db);
$row_result=mysqli_fetch_assoc($result);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Album management system</title>
</head>
<body bgcolor="#51a072" align = "center">
<h1 align="center">Album management system - Modify</h1>
<p align="center"><a href="data.php">Home</a></p>
<form action="" method="post" name="formFix" id="formFix">
  <table border="1" align="center" cellpadding="4">
  
    <tr>
      <th>Field</th><th>Data</th>
    </tr>
    <tr>
      <td>Name</td><td><input type="text" name="Name" id="Name" value="<?php echo $row_result["Name"];?>"></td>
    </tr>
    <tr>
      <td>Release date</td><td><input type="text" name="Release_date" id="Release_date" value="<?php echo $row_result["Release_date"];?>"></td>
    </tr>
    <tr>
      <td>Artist</td><td><input type="text" name="Artist" id="Artist" value="<?php echo $row_result["Artist"];?>"></td>
    </tr>
    <tr>
      <td>Number of songs</td><td><input type="text" name="Number_of_songs" id="Number_of_songs" value="<?php echo $row_result["Number_of_songs"];?>"></td>
    </tr>
    <tr>
      <td>Producer</td><td><input name="Producer" type="text" id="Producer" size="40" value="<?php echo $row_result["Producer"];?>"></td>
    </tr>
	<tr>
      <td>Price</td><td><input name="Price" type="text" id="Price" size="40" value="<?php echo $row_result["Price"];?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input name="Name" type="hidden" value="<?php echo $row_result["Name"];?>">
      <input name="action" type="hidden" value="update">
      <input type="submit" name="button" id="button" value="Update">
  
      </td>
    </tr>
  </table>
  
  
</form>
</body>
</html>