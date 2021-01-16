<?php
	header('Content-Type: application/json');
	if(isset($_POST["datas"]))
	{
		include("conn.php");
		$data = $_POST["datas"];
		$activity_creator = $data[0];
		$activity_id = $data[1];
		$query = "Select activity_info.activity_id, activity_info.activity_host_depto, activity_info.activity_name, activity_info.activity_created_date, activity_info.activity_date, activity_info.activity_staff_limit, activity_info.activity_staff_counter, activity_info.activity_creator, activity_info.activity_place, departments.name_department, activity_info.activity_info
		 from activity_info inner join departments 
		 where activity_info.activity_host_depto=departments.id_department and activity_creator='".$activity_creator."' 
		and activity_id=".$activity_id.";";
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
	if(isset($_POST["allinfo"]))
	{
		include("conn.php");

		/*
		 alldata[0] = ("#txt_activityname").val();
          alldate[1] = ("#slct_departments").val();
          alldate[2] = ("#txt_date").datepicker('getDate'); ***
          alldate[3] = ("#txt_time").val();   *****
          alldate[4] = ("#txt_activityplace").val();
          alldate[5] = chckbx;
          alldate[6] = ("#txt_activityinformation").val();
          alldate[7] = it is the whole time already put together in a variable
          alldate[8]= user who created the activity
          alldate[9] = id of the activity
	*/
		$allinfo = $_POST["allinfo"]; 	 
		$query_update_activity = "Update `activity_info` SET `activity_name` = '".$allinfo[0]."',
		`activity_host_depto`=".$allinfo[1].", `activity_date`='".$allinfo[7]."',
		`activity_info`='".$allinfo[6]."', `activity_staff_limit`=".$allinfo[5].", `activity_place`='".$allinfo[4]."'
		Where `activity_info`.`activity_id`=".$allinfo[9]." and 
		`activity_info`.`activity_creator`='".$allinfo[8]."'";
		$result = mysqli_query($db_link,$query_update_activity);
		if($result)
      	{	
      		echo "success";
      	}
	}
	if(isset($_POST["status"]))
	{
		include("conn.php");
		$status = $_POST["status"];
		$query_status = "Select * from activity_atst where user_name='".$status[0]."' and activity_id=".$status[1]."";
		$result_status =  mysqli_query($db_link, $query_status);
		if($result_status)
		{
			while($row = mysqli_fetch_assoc($result_status))
			{
				echo $row["rol"];
				break;
			}
		}
	}
	if(isset($_POST["confrm"]))
	{
		include("conn.php");
		$confrm = $_POST["confrm"];
		$query_confrm = "Select * from activity_info where activity_id=".$confrm[1]." and activity_creator='".$confrm[0]."'";
		$result_query = mysqli_query($db_link,$query_confrm);
		if(mysqli_num_rows($result_query) == 1 )
		{	
			echo "success";
		}else
		{
			echo "no suc";
		}
	}
?>