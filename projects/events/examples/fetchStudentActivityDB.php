<?php
	header('Content-Type: application/json');
	if(isset($_POST["elId"]))
	{
		include("conn.php");
		$elId = $_POST["elId"];
		// $activity_creator = $data[0];
		// $activity_id = $data[1];
		$query = "Select activity_info.activity_id, activity_info.activity_host_depto, activity_info.activity_name, activity_info.activity_created_date, activity_info.activity_date, activity_info.activity_staff_limit, activity_info.activity_staff_counter, activity_info.activity_creator, activity_info.activity_place, departments.name_department, activity_info.activity_info
		 from activity_info inner join departments 
		 where activity_info.activity_host_depto=departments.id_department and activity_id=".$elId.";";
		$result = mysqli_query($db_link,$query);
		if($result)
		{
			$jsonvar = array();
			while($row_col = mysqli_fetch_array($result))
			{
				$array["activityid"] = $row_col["activity_id"];
				$array["activityname"]=$row_col["activity_name"];
				$array["activityhostdepto"] = $row_col["name_department"];
				$array["activitycreateddate"] = $row_col["activity_created_date"];
				$array["activitydate"] = $row_col["activity_date"];
				$array["activityinfo"] = $row_col["activity_info"];
				$array["activitystafflimit"] = $row_col["activity_staff_limit"];
				$array["activitystaffcounter"] = $row_col["activity_staff_counter"];
				$array["activitycreator"] = $row_col["activity_creator"];
				$array["activityplace"] = $row_col["activity_place"];
				$array["activityhostid"] = $row_col["activity_host_depto"];
				

				array_push($jsonvar, $array);
			}
				$jsonstring = json_encode($jsonvar);
				echo $jsonstring;
		}
	}
	if(isset($_POST["go"]))
	{	
		//Process to join as a staff
		include("conn.php");
		$go = $_POST["go"];
		$query_activity_atst = "Insert into activity_atst (user_name,activity_id,rol) VALUES('".$go[0]."',".$go[1].",".$go[2].")";
		$result = mysqli_query($db_link,$query_activity_atst);
		if($result)
		{	
			if($go[2]==1)
				alterStaff($go[1], 1);
			else
				echo "success";
		}else
		{
			echo "caca2";
		}

	}
	if(isset($_POST["chck"]))
	{	
		//Process to join as a staff
		include("conn.php");
		$go = $_POST["chck"];
		$query_chck = "Select * from activity_atst where activity_atst.user_name='".$go[0]."' and activity_atst.activity_id=".$go[1]."";
		$result = mysqli_query($db_link,$query_chck);
		if(mysqli_num_rows($result)==1)
		{
			echo "success";
		}else
		{
			echo "caca";
		}
	}
	if(isset($_POST["del"]))
	{	
		//Process to join as a staff
		include("conn.php");
		$del = $_POST["del"];


		// first find whether student is attending or is staff 

		$rol = mysqli_query($db_link,"SELECT rol FROM activity_atst WHERE user_name ='".$del[0]."'"); 
		$rol_value = mysqli_fetch_assoc($rol);
		$userol = $rol_value['rol'];
		
		if($userol == 1){
			alterStaff($del[1], 0);

		}

		//query to substract 1 from the staff column in activity info table

		


		$query_del = "Delete from activity_atst where user_name='".$del[0]."' and activity_id=".$del[1]."";
		$result_del = mysqli_query($db_link,$query_del);
		if($result_del)
		{
			echo "success";
		}else
		{
			echo "popo";
		}
	}
	if(isset($_POST["editV"]))
	{
		$editV = $_POST["editV"];
		include("conn.php");
		$query_edit = "Update activity_notif set activity_notif_msg ='".$editV[0]."' where activity_notif_id=".$editV[2]."";
		$result_edit = mysqli_query($db_link,$query_edit);
		if($result_edit)
		{
			echo "success";
		}else
		{
			echo "muchopopo";
		}
	}
	function alterStaff($activityId, $action)
	{ // 1 adds 0 substracts in $action
		include("conn.php");
		if($action==1){
			$query_alter = "update activity_info set activity_staff_counter = activity_staff_counter + 1 where activity_id =".$activityId."";
		}
		else
		{
			$query_alter = "update activity_info set activity_staff_counter = activity_staff_counter - 1 where activity_id =".$activityId."";
		}
		
		$result_alter = mysqli_query($db_link,$query_alter);
		if($result_alter)
		{
			if($action==1)
				echo "success";
		}else
		{
			echo "cacaAlter";
		}
	}
?>