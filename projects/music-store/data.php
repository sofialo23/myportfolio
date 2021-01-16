<?php
	header("Content-Type: text/html; charset=utf-8");
	include("connection.php");
	include("session.php");
	

	 /*
	//$_SESSION['message'] = '';
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }*/
	
	
	//session_start();
	
	if(isset($_GET["keyword"])&&($_GET["keyword"]!="")){
	  $sql_query = "SELECT * FROM `album` WHERE `Name` LIKE '%".$_GET["keyword"]."%'";
	}
	else if (isset($_GET["keyword2"])&&($_GET["keyword2"]!="")){
		$sql_query = "SELECT * FROM `album` WHERE `Artist` LIKE '%".$_GET["keyword2"]."%'";
	}
	else{
	  $sql_query = "SELECT * FROM `album`";
	}

    $result = mysqli_query($conn,$sql_query);

	$total_records = mysqli_num_rows($result);
	
	
    if(isset($_GET["action"])&&($_GET["action"]=="delete")){	
	$query_delMember = ("DELETE FROM `album` WHERE `Name` = '".$_GET['id']."'");
	mysqli_query($conn,$query_delMember); 

	header("Location: data.php"); 
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Album management system</title>
<script language="javascript">
function deletesure(){
    if (confirm('\nAre you sure to delete this album?\n')) return true;
    return false;
}
</script>
</head>
<body bgcolor="#51a072" align = "center">
<h1 align="center">Albums management system</h1> 
<h2 align="right"><a href = "logout.php">Sign Out</a></h2>
<h2 align="right"><a href="addData.php">Add new album </a></h2>
<h2 align="right"><a href="addArtist.php">Add new artist </a></h2>
<h2 align="left">Number of albums: <?php echo $total_records;?> </h2>

<p>Insert album name to search</p> 
              <form name="form1" method="get" action="data.php">
                <p>
                  <input name="keyword" type="text" id="keyword" value="Name" size="12" onClick="this.value='';"><br><br>
                  <input type="submit" value="submit">
                </p>
              </form> 
<br> 

<p>Insert artist name to search</p> 
              <form name="form2" method="get" action="data.php">
                <p >
                  <input  name="keyword2" type="text" id="keyword2" value="Artist" size="12" onClick="this.value='';"><br><br>
                  <input  type="submit" value="submit">
                </p>
              </form> 
<br> 


			  
<table border="1" style="text-align:center;" align="center" width="60%">
  
  <tr>
    <th> Album Name </th>
    <th> Release_date </th>
    <th> Artist </th>
    <th> Number_of_songs </th>
    <th> Producer </th>
    <th> Price </th>
	<th>  </th>
		<th>  </th>
	

  
<?php
	while($row_result=mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row_result["Name"]."</td>";
		echo "<td>".$row_result["Release_date"]."</td>";
		echo "<td>".$row_result["Artist"]."</td>";
		echo "<td>".$row_result["Number_of_songs"]."</td>";
		echo "<td>".$row_result["Producer"]."</td>";
		echo "<td>".$row_result["Price"]."</td>";
		echo "<td><a href='update.php?id=".$row_result["Name"]."'> Modify </a></td>";
		echo "<td><a href='?action=delete&id=".$row_result["Name"]."' onClick=\"return deletesure();\"> Delete </a></td>";
		echo "</tr>";
	}
	
	
?>


</table> <br><br><br>
	
</body>
</html>