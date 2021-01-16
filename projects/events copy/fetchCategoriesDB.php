<?php
	header('Content-Type: application/json');


	if(isset($_POST["loadThem"]))
	{
		include("conn.php");
		$query_categories = "Select * from categories;";
		$result_categories = mysqli_query($db_link,$query_categories);
		if($result_categories)
		{
		  $jsonvar = array();
		  while($row_col = mysqli_fetch_array($result_categories))
		  {
		    $array["idcategory"] = $row_col["id_category"];
		    $array["namecategory"]=$row_col["name_category"];
		    array_push($jsonvar, $array);
		  }
		    $jsonstring = json_encode($jsonvar);
		    echo $jsonstring;
		}
	}
	if(isset($_POST["actId"]))
	{
		include("conn.php");
		$actId = $_POST["actId"];
		$query_cat = "Select * from activity_category where activity_id=".$actId.";";
		$result_cat = mysqli_query($db_link,$query_cat);
		if($result_cat)
		{
		  $jsonvar = array();
		  while($row_col = mysqli_fetch_array($result_cat))
		  {
		  	$array["id"] = $row_col["id"];
		    $array["idcategory"] = $row_col["category_id"];
		    // $array["namecategory"]=$row_col["name_category"];
		    array_push($jsonvar, $array);
		  }
		    $jsonstring = json_encode($jsonvar);
		    echo $jsonstring;
		}
	}
	//THIS FOLLOWING IF IS TO DELETE ALL THE DATA WITH THE ID AS 'delet'
	if(isset($_POST["delet"]))
	{
		include("conn.php");
		$actId = $_POST["delet"];
		$query_delete = "Delete from activity_category where activity_id=".$actId[0].";";
		$result_delete = mysqli_query($db_link,$query_delete);
		if($result_delete)
		{
		  categoriesInAgain($actId[0],$actId[1],$actId[2]);
		}
	}
	function categoriesInAgain($idActivity,$listCat, $length)
	{
		//INSERTING DATA IN category_activity and
		for($i=0; $i<$length; $i++)
	    {
	        include("conn.php");
	        $query = "Insert into activity_category (activity_id,category_id)Values(".$idActivity.",".$listCat[$i].")";
	        $result = mysqli_query($db_link,$query);
	        if($result)
	        {
	            echo "success";
	        }
	    }
	}
?>