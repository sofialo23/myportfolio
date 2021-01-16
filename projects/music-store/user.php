<?php
	header("Content-Type: text/html; charset=utf-8");
	include("session.php");
	

	$sql = "SELECT * FROM `orders` WHERE `cID` = '$login_session'";
	$res = mysqli_query($conn, $sql);
	
	
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
	
    if(isset($_GET["action"])&&($_GET["action"]=="add")){	
		/*$sql = "SELECT * FROM `album` WHERE `Name` LIKE '%".$_GET["id"]."%'";*/
		$sql = "SELECT * FROM `album` WHERE `Name` = '".$_GET["id"]."'";
		$oID = rand(0, 5000);
		$res = mysqli_query($conn, $sql);
		$object = mysqli_fetch_object($res);
		$name = $object->Name;
		$name = mysqli_real_escape_string($conn,$name);
		$price = $object->Price;
		
		$sql_query = "INSERT INTO `orders` (`oID` ,`cID`,`AlbumName`, `Price`) VALUES ('$oID','$login_session','$name','$price')";
		mysqli_query($conn,$sql_query);
	}
		
		
	

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Album store</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script language="javascript">

function addsure(){
    if (confirm('\nAre you sure to add this album to your cart?\n')) return true;
    return false;
}
</script>
</head>
<body>
<div id="header">
	<h1 id="welcome-text">Hi <?php echo $_SESSION['login_user']; ?>, welcome</h1> 
	<h1 id="main-title">Albums store</h1> 
<div id="subheader">
	<h2 id="logout"><a href = "logout.php">Sign Out</a></h2>
	<h2 id="cart"><a href = "cart.php"> View my cart</a></h2>
</div>
</div>



<!--<h2 align="left">Number of albums: <?php echo $total_records;?> </h2>-->

<p class="search">Type album name to search:</p> 
              <form name="form1" method="get" action="user.php">
                <div class="search-section">
                  <input class="search-text" name="keyword" type="text" id="keyword" value="Album" size="12" onClick="this.value='';"><br><br>
                  <input type="submit" value="Search" class="button">
                </div>
              </form> 
<br> 

<p class="search">Type artist name to search:</p> 
              <form name="form2" method="get" action="user.php">
                <div class="search-section" >
                  <input class="search-text" name="keyword2" type="text" id="keyword2" value="Artist" size="12" onClick="this.value='';"><br><br>
                  <input  type="submit" value="Search" class="button">
                </div>
              </form> 
<br> 


			  
<table align="center" width="60%">
  
  <tr>
    <th> Album Name </th>
    <th> Release_date </th>
    <th> Artist </th>
    <th> Number_of_songs </th>
    <th> Producer </th>
    <th> Price </th>
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
		echo "<td><a href='?action=add&id=".$row_result["Name"]."' onClick=\"return addsure();\"> Add </a></td>";

		echo "</tr>";
	}

?>


</table> <br><br><br>
	
</body>
</html>