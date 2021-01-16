<?php
	header("Content-Type: text/html; charset=utf-8");
	include("session.php");
	

	$sql = "SELECT * FROM `orders` WHERE `cID` = '$login_session'";
	$res = mysqli_query($conn, $sql);
	
	

	  $sql_query = "SELECT * FROM `album`, `orders` WHERE `Name` = `AlbumName` and `cID` = '$login_session'";
	
    $result = mysqli_query($conn,$sql_query);

	$total_records = mysqli_num_rows($result);
	

		
		//if checkout
	
    if((isset($_GET["action"])&&($_GET["action"]=="checkout"))){
	$query_delMember = "DELETE FROM `orders` WHERE `cID` = '$login_session'";
	echo($query_delMember);
	mysqli_query($conn,$query_delMember); 

	header("Location: user.php"); 
	}

	//if one element is deleted

	if((isset($_GET["action"])&&($_GET["action"]=="delete"))){	
	$query_delMember = "DELETE FROM `orders` WHERE `cID` = '$login_session' AND `AlbumName` = '".$_GET["id"]."' limit 1" ;
	mysqli_query($conn,$query_delMember); 

	}



?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title >Album store</title>
<script language="javascript">
function deletesure(){
    if (confirm('\nAre you sure to delete this album from your cart?\n')) return true;
    return false;
}

function addsure(){
    if (confirm('\nAre you sure you want to check out?\n')) return true;
    return false;
}

</script>
</head>
<body>
<h1 id="main-title">Albums store</h1> 
<h1> <?php echo $_SESSION['login_user']; ?>'s cart</h1> 
<h2 align="right"><a href = "logout.php">Sign Out</a></h2>


<h2 align="left">Number of albums: <?php echo $total_records;?> </h2>


		  
<table border="1" style="text-align:center;" align="center" width="60%">
  
  <tr>
    <th> Album Name </th>
    <th> Release_date </th>
    <th> Artist </th>
    <th> Number_of_songs </th>
    <th> Producer </th>
    <th> Price </th>
	<th> Total </th>
	
</tr>
  
<?php 
$total = (float) 0;
	while($row_result=mysqli_fetch_assoc($result)){
		$cdname = $row_result["Name"];
		echo "<tr>";
		echo "<td>".$row_result["Name"]."</td>";
		echo "<td>".$row_result["Release_date"]."</td>";
		echo "<td>".$row_result["Artist"]."</td>";
		echo "<td>".$row_result["Number_of_songs"]."</td>";
		echo "<td>".$row_result["Producer"]."</td>";
		echo "<td>".$row_result["Price"]."</td>";
		echo "<td><a href='?action=delete&id=".$row_result["Name"]."' onClick=\"return deletesure();\"> Delete </a></td>";
		$total= $row_result["Price"] + $total;
		/*echo "<td><a href='?action=delete&id=".$row_result["Name"]."' onClick=\"return deletesure();\"> Delete </a></td>";*/
		echo "</tr>";
	}

?>

		<th> TOTAL TO PAY </th>
		<th> </th>
		<th> </th>
		<th> </th>
		<th> </th>
		<th> $ <?php echo number_format($total,2); ?> </th>
		<th> </th>

</table> <br><br><br>
<?php

		echo "<h2><a href='?action=checkout' onClick=\"return addsure();\"> Check out </a></h2>";
		echo "<br>"; echo "<br>";

?>

<h2><a href= "user.php"> Continue shopping </a> </h2>
</body>
</html>
