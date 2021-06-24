<?php

	
  if(isset($_POST["alldate"]))
  {
    //I WILL RECEIVE THE ARRAY FROM THE CREATEACTIVITY.PHP OF THE CATEGORIES
    //WILL SEND IT INTO A STORED PROCEDURE SO I GET AUTOMATICALLY THE ID OF THE DATA INSERTED IN 
    //ACTIVITY_INFO AND WILL BE ABLE TO INSERT IT INTO THE CATEGORY_ACTIVITY TABLE
    //AL OBTENER EL ID DE LA DATA RECIEN INSERTED, HACER UNA FUNCTION AQU[I EN EL FETCH
    //Y POR MEDIO DE FOR, INSERTAR CADA CATEGORIA CON EL ID ACTIVITY EN LA TABLA INDICADA
    include("conn.php");
    $alldate = $_POST["alldate"];
    $nuevoId = 0;


    /*$query_insert_activity = "Insert into activity_info(activity_name, 
        activity_host_depto, activity_date, activity_info, 
         activity_staff_limit,activity_staff_counter,activity_creator, 
        activity_place) VALUES( 'book reading', '42', '2021-01-27 05:00:00', 's', '0', '0', '410321161', 'garden');";*/

/*
        "Insert into activity_info(activity_name, 
        activity_host_depto, activity_date, activity_info, 
         activity_staff_limit,activity_staff_counter,activity_creator, 
        activity_place) VALUES('Football Game',5,'2021-01-30 16:00:00','come and join us!!','0',0, '410321161','School's football field');"*/


       $query_insert_activity = "Insert into activity_info(activity_name, 
        activity_host_depto, activity_date, activity_info, 
         activity_staff_limit,activity_staff_counter,activity_creator, 
        activity_place) VALUES('".$alldate[0]."','".$alldate[1]."','".$alldate[7]."','".$alldate[6]."','".$alldate[5]."', '0' , '".$alldate[8]."','".$alldate[4]."');";

        /*$query_new = "Select * from activity_info where activity_name = '".$alldate[0]."' and activity_date = '".$alldate[7]."';";*/

        $query_new = "Select * from activity_info where activity_name = '".$alldate[0]."' and activity_date = '".$alldate[7]."';";
        

   /* $query_insert_activity = "Call InsertGetActivity('".$alldate[0]."',".$alldate[1].", '2021-01-11 01:00:00' , '".$alldate[7]."','".$alldate[6]."','".$alldate[5]."',0, '".$alldate[8]."','".$alldate[4]."')";*/

/*

    echo '<script>';
    echo 'console.log('.$query_insert_activity.')';
    echo '</script>';
  
*/
    $result_insert = mysqli_query($db_link,$query_insert_activity);

    $result_query = mysqli_query($db_link,$query_new);

    //echo 'console.log('.$result_insert.')';

    if($result_insert)
    {
      while($row = mysqli_fetch_array($result_query))
      {
          
          $nuevoId = $row["activity_id"];
          
          $isTouch = empty($alldate[10]);
          if($isTouch==true);
            $alldate[10] = 0;

          categoriesAct($nuevoId, $alldate[9], $alldate[10]);
          echo $nuevoId;
          
          break;
      }
      // echo "Success";
    }
  }
  function categoriesAct($idActivity, $listCat,$length)
  {
    
    for($i=0; $i<$length; $i++)
    {
        include("conn.php");
        $query = "Insert into activity_category (activity_id,category_id)Values(".$idActivity.",".$listCat[$i].")";
        $result = mysqli_query($db_link,$query);
        if($result)
        {
           //echo "success on ".$i."!";
        }
    }
  }
  if(isset($_POST["info"]))
  {
    include("conn.php");
    $query_departments = "Select * from departments;";
    $result_query_departments = mysqli_query($db_link,$query_departments);
    if($result_query_departments)
    {
      $jsonvar = array();
      while($row_col = mysqli_fetch_array($result_query_departments))
      {
        $array["iddepartment"] = $row_col["id_department"];
        $array["namedepartment"]=$row_col["name_department"];
        $array["idcollege"] = $row_col["id_college"];
        array_push($jsonvar, $array);
      }
        $jsonstring = json_encode($jsonvar);
        echo $jsonstring;
    }
  }
  if(isset($_POST["categories"]))
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

?>