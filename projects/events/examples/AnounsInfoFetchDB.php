<?php
	header('Content-Type: application/json');
	if(isset($_POST["anounsId"]))
	{
		include("conn.php");
		$anounsId = $_POST["anounsId"];
		$query_activities = "Select * from `activity_notif` where activity_notif_id=".$anounsId."";
		$result = mysqli_query($db_link,$query_activities);
		if($result)
		{
			$jsonvar = array();
			while($row_col = mysqli_fetch_array($result))
			{
				$array["notifid"] = $row_col["activity_notif_id"];
				$array["creator"]=$row_col["activity_notif_creator"];
				$array["msg"]=$row_col["activity_notif_msg"];
				$array["activityid"]=$row_col["activity_notif_activity_id"];
				$array["datecreated"]=$row_col["activity_notif_date_created"];
				array_push($jsonvar, $array);
			}
				$jsonstring = json_encode($jsonvar);
				echo $jsonstring;
		}
	}
	if(isset($_POST["allinfo"]))
	{
		include("conn.php");
		$allinfo = $_POST["allinfo"];
		// $allinfo[0] -> activityId
		// $allinfo[1] -> anounsmsg
		// $allinfo[2] -> anounsId
		$query_update_anouns = "Update activity_notif SET activity_notif_activity_id =".$allinfo[0].", activity_notif_msg='".$allinfo[1]."' Where activity_notif.activity_notif_id=".$allinfo[2]."";
		$result_update_anouns = mysqli_query($db_link,$query_update_anouns);
		if($result_update_anouns)
		{
			echo "success";
		}else
		{
			echo "failed";
		}
	}
	if(isset($_POST["info"]))
	{
		include("conn.php");
		$query_activities = "Select * from `activity_info` where 1;";
		$result = mysqli_query($db_link,$query_activities);
		if($result)
		{
			$jsonvar = array();
			while($row_col = mysqli_fetch_array($result))
			{
				$array["activityid"] = $row_col["activity_id"];
				$array["activityname"]=$row_col["activity_name"];
				array_push($jsonvar, $array);
			}
				$jsonstring = json_encode($jsonvar);
				echo $jsonstring;
		}
	}
?>