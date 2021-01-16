<?php
include ('conn.php');
session_start();
if(!isset($_SESSION['name'])){;
      header("Location: ./loginpage.php");
  }

     if(isset($_POST["insert"]))  
 {  
    $act_id = $_GET['eventid'];
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  

      //if no image yet
      $searchimage = "SELECT * FROM tbl_images WHERE act_id = '$act_id'";
      if($result = mysqli_query($db_link, $searchimage)){
          $rowcount = mysqli_num_rows($result);
      }
      else{
        $rowcount = 0;
      }

      if($rowcount>0)
        $query = "UPDATE tbl_images SET name='$file' WHERE act_id = '$act_id'";  
      else 
        $query="INSERT INTO tbl_images(name, act_id) VALUES ('$file', '$act_id')"; 

      if(mysqli_query($db_link, $query))  
      {  
       //    echo '<script>alert("Image updated successfully")</script>';  
           header("Location: ./activityInfo.php?eventid=".$act_id);
      }  
      
 } 

    if(isset($_POST["delete"]))  
 {  
    $act_id = $_GET['eventid'];
      //$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "DELETE FROM tbl_images WHERE act_id = '$act_id'"; 
      if(mysqli_query($db_link, $query))  
      {  
           header("Location: ./activityInfo.php?eventid=".$act_id);
      } 
  }  


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <!--   Core JS Files   -->
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- <script src="../assets/js/core/popper.min.js"></script> THIS IS THE ONE ************************* -->
  <!-- <script src="../assets/js/core/bootstrap.min.js"></script>  THIS IS THE ONE ************************* -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script> <!-- THIS IS THE ONE ************************* -->
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <!-- END OF ALL THE SCRIPTS AND LINKS ORIGINALLY AT THE END OF THIS-->
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  
  <!-- Links and Scripts for the fucking MULTISELECT SEARCH DROPDOWN:  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
 
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

  <!--  ******************************************************************************   -->
  <!--  *****************************DATEPICKER*******************   -->

  
 <!--  
  <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
  <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
  
 -->

  <title>
    NDHU Events
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <!-- <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />  THIS IS THE ONE ************************* -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <link href="../assets/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  
  <script type="text/javascript" src="clockpicker.js"></script>
  <link href="clockpicker.css" rel="stylesheet">
  
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
    
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li >
            <a href="./dashboard.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./allactivities.php">
              <i class="now-ui-icons education_atom"></i>
              <p>All Activities</p>
            </a>
          </li>
            <li >
            <a href="./allmyactivities.php">
              <i class="now-ui-icons education_atom"></i>
              <p>My Activities</p>
            </a>
          </li>
          <li >
            <a href="./createActivity.php">
              <i class="now-ui-icons location_map-big"></i>
              <p>Create Activity</p>
            </a>
          </li>
          <li>
            <a href="./createAnouns.php">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Create Announcements</p>
            </a>
          </li>
          <li >
            <a href="./announcement.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Announcements</p>
            </a>
          </li>
          <li>
            <a href="./contactadmin.php">
              <i class="now-ui-icons users_single-02"></i>
              <p>Message to Admin</p>
            </a>
          </li>
          <li>
            <a href="logout.php">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Sign out</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <img src="../assets/img/LOGO_NDHU.png" style="width:80px;height:80px;" > &nbsp; &nbsp; &nbsp;
            <a class="navbar-brand" href="#pablo">Update Activity</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
       <div class="collapse navbar-collapse justify-content-end" id="navigation"> 
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search..." id="keyword">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <button class="form-control" id="search_btn" type="button"> 

                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </button>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Search by
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="searchbydept.php"> Department</a>
                  <a class="dropdown-item" href="searchbycat.php">Category</a>
                  <a class="dropdown-item" href="searchbydate.php">Date</a>
                </div>
              </li>
            </ul>
          </div>  
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">

              <div class="row">

                 <div class="col-md-4 pr-1" style="float:left;" >
                  <div class="form-group">
                    <div class="panel panel-default" style="text-aling:left;"> 
                      <div class="panel-body"><button id="btn_back" type="button" style="background-color:#F1EBF1;color:#4B4A4B;" class="btn btn-light" ><-Go back!</button></div>

                    </div>
                  </div>
                </div>   

                <div class="card-header">
                  <h4 class="card-title">Update Activity</h4>
                </div>

              </div>

              <div class="card-body">
                <form id="frm_createactivity">
                  <div class="row">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                      <label class="custom-control-label" for="defaultUnchecked">Modify Activity</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Activity Name</label>
                        <input type="text" class="form-control" id="txt_activityname"  placeholder="Company" required disabled>
                      </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Host Department</label>
                        <select id="slct_departments" class="form-control"  data-live-search="true" required disabled>
                        </select>
                        <!-- <input type="text" class="form-control" placeholder="Department Name" id="txt_hostdepartment" value="" required> -->
                      </div>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control" placeholder="Date (Click on)" id="txt_date" value="" required disabled>
                      </div>
                    </div>

                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Time</label>
                        <div class="input-grou clockpicker">
                          <input type="text" id="txt_time" class="form-control" placeholder="Time" value="" required disabled>
                          <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Activity Place</label>
                        <input type="text" class="form-control" id="txt_activityplace" placeholder="Activity Place" value="" required disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <!-- Default checked -->
                        <!-- Default unchecked -->
                        <!-- Material unchecked -->
                        <!-- Default checked -->
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" disabled>
                        <label class="custom-control-label" for="defaultChecked2">Staff Needed</label>
                      </div>
                        <!--
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="">
                        -->
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Staff Number</label>
                        <input type="text" id="staff_input" size=3 class="form-control"  placeholder="Staff Number: 0" value="0" disabled>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group" >
                        <label>Category</label>
                        <select class="selectpicker" id="slct_category" multiple data-live-search="true" style="font-color:white;" requried disabled>
                          <!-- <option>Mustard</option>
                          <option>Ketchup</option>
                          <option>Relish</option> -->
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Activity Information</label>
                        <textarea rows="4" cols="80" class="form-control" id="txt_activityinformation" placeholder="Here can be your description" value="" required disabled></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row " >
                    <button type="button" id="btn_submit" class="btn btn-primary btn-lg btn-block">Cancel, Go back to all my activities</button>
                  </div>
                  <div class="row " >
                    <button type="button" class="btn btn-success" id="btn_save">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
                <div class="card-header">
                  <h5 class="title">Image</h5>
                </div>
              
           
                 
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group"><?php
                      $id = $_GET['eventid'];
                     $queryim = "SELECT * FROM tbl_images WHERE act_id = '$id' limit 1";  
                $result = mysqli_query($db_link, $queryim);  
                while($row = mysqli_fetch_array($result))  
                {  
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="200" width="200" class="img-thumnail" align="center" />  
                               </td>  
                          </tr>  
                     ';  
                } ?>
                      </div>
                      <form id="searchform" method="post" enctype="multipart/form-data"> <!-- start of form body for search by department-->
                  <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="insert" id="insert" value="Change Image" class="btn btn-primary" />
                     <?php
                     $act_id = $_GET['eventid'];
                      $searchimage = "SELECT * FROM tbl_images WHERE act_id = '$act_id'";
                      if($result = mysqli_query($db_link, $searchimage)){
                          $rowcount = mysqli_num_rows($result);
                      }
                      else{
                        $rowcount = 0;
                      }
                      if($rowcount>0)
                        ?><input type="submit" name="delete" id="delete" value="Delete Image" class="btn btn-primary" />
                     

                </form>
                    </div>
                  </div>
              <hr>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
<script >
    $(document).ready(function(){
        $('#txt_date').datepicker();
        $('.clockpicker').clockpicker();
        $("#btn_save").hide();
        var datas=[]; 
        datas[0]= "<?php echo $_SESSION['userID']; ?>";
        datas[1] = "<?php echo $_GET['eventid']; ?>";   //Coming from the button they click on allmyactivities.php

        //NEED TO DISABLE ALL THE INPUTS HERE 

        //Going to look for this activity_creator 'first' and activity_id=8
        //And load up the info into the inputs
        departments();
        loadTheCat(datas[1]);
        $.ajax({
          url:'fetchActivityInfoDB.php',
          dataType: 'json',
          method: 'POST',
          data: {datas,datas},
          success: function(data){
            
            $.each(data,function(index,element){
              // alert(element.activityhostdepto);
              $("#txt_activityname").val(element.activityname);
              $("#slct_departments").val(element.activityhostid);
              var ddd = element.activityname;
              var completedate = element.activitydate;
              if(typeof completedate != 'undefined')
              {
                var fecha = (completedate).substr(0,10);
                var time = (completedate).substr(11,16);
                $("#txt_date").val(fecha);
                $("#txt_time").val(time);
              }
              if(element.activitystafflimit > 0)
              {
                $("#defaultChecked2").prop('checked',true);
                $("#staff_input").val(element.activitystafflimit);
              }
              $("#txt_activityplace").val(element.activityplace);
              $("#txt_activityinformation").val(element.activityinfo);
            });
          }
        });
      function departments()
      {
        loadCategories();
        var info = "all";
        $.ajax({
            type:'POST',
            url:'fetchCreateActivity.php',
            dataType:'json',
            data: {info,info},
            success:function(data)
            {
                var toAppend_col = '<option value="0"> Select one department </option>';
                $("#slct_departments").append(toAppend_col);
                $.each(data,function(index,element){
                  var dd = '<option value="'+element.iddepartment+'">'+element.namedepartment+'</option>';
                  $("#slct_departments").append(dd);
                });
            }
          });
      }
      function loadAll()
      {
        departments();
        $.ajax({
          url:'fetchActivityInfoDB.php',
          dataType: 'json',
          method: 'POST',
          data: {datas,datas},
          success: function(data){
            $.each(data,function(index,element){
              $("#txt_activityname").val(element.activityname);
              $("#slct_departments").val(element.activityhostdepto);
              var ddd = element.activityname;
              var completedate = element.activitydate;
              if(typeof completedate != 'undefined')
              {
                var fecha = (completedate).substr(0,10);
                var time = (completedate).substr(11,16);
                $("#txt_date").val(fecha);
                $("#txt_time").val(time);
              }
              if(element.activitystafflimit > 0)
              {
                $("#defaultChecked2").prop('checked',true);
                $("#staff_input").val(element.activitystafflimit);
              }
              $("#txt_activityplace").val(element.activityplace);
              $("#txt_activityinformation").val(element.activityinfo);
            });
          }
        });
      }
      function loadCategories(activityId)
      {
        var loadThem = "CACA";
        // slct_category; fetchCategoriesDB.php
        $.ajax({
          url:'fetchCategoriesDB.php',
          dataType: 'json',
          method: 'POST',
          data: {loadThem,loadThem},
          success: function(data)
          {
            var toAppend_col = '<option value="0"> --------------- </option>';
            $("#slct_category").append(toAppend_col);
            $.each(data,function(index,element){
              var dd = '<option value="'+element.idcategory+'">'+element.namecategory+'</option>';
              $("#slct_category").append(dd);
            });
            $('#slct_category').selectpicker('refresh');
          }
        });
      }
      function loadTheCat(activityId)
      {
          var actId = activityId;
          $.ajax({
            url:'fetchCategoriesDB.php',
            dataType: 'json',
            method: 'POST',
            data: {actId, actId},
            success: function(data)
            {
              var catsAct = [];
              var count = 0;
              $.each(data,function(index,element)
              {
                  catsAct[count++] = element.idcategory;

              });
              $('#slct_category').selectpicker('val',catsAct);
              // $('#slct_category').selectpicker('refresh');
            }
          });
      }
      //Calling initial function to load the info in the the inputs
      $("#btn_submit").on('click',function(e){
          window.location.href = "allmyactivities.php";

      });
      $("#btn_back").on('click',function(e){

          window.location.href = "allactivities.php?eventid="+datas[1];

        });
      //This event is to save the data updated
      $("#btn_save").on('click', function(e){
          var allinfo = [];
          //add a function to check if all the inputs are filled.
          var chckbx = $("#staff_input").val();
          
          if($("#defaultChecked2").is(":checked"))
          {
            chckbx = $("#staff_input").val();
          }
          var fecha = $('#txt_date').datepicker('getDate');
          var year = fecha.getFullYear();
          var month = fecha.getMonth()+1;
          if(month < 10)
          {
            month = "0"+month;
          }
          var day= fecha.getDate();
          allinfo[0] = $('#txt_activityname').val();
          allinfo[1] = $('#slct_departments').val();
          allinfo[2] = year+"-"+month+"-"+day;
          allinfo[3] = $('#txt_time').val() + ":00";
          allinfo[4] = $('#txt_activityplace').val();
          allinfo[5] = chckbx;
          allinfo[6] = $('#txt_activityinformation').val();
          allinfo[7] = year+"-"+month+"-"+day + " " + allinfo[3];
          allinfo[8] = datas[0];
          allinfo[9] = datas[1];
          e.preventDefault();
          $.ajax({
            method:'POST',
            dataType:"text",
            url: 'fetchActivityInfoDB.php',
            data: {allinfo,allinfo},
            success:function(data){
              if(data == "success")
              {
                updatingCategories();
                alert("Changes applied succesfully");
                window.location.href = "allmyactivities.php";
                backLoading();
                loadAll();
              }
            }
          });
      });
        /*
       $("#frm_createactivity").on('submit',function(e){
          window.location.href = "allactivities.php";
        });*/
        //Event for the 'updating activity' Checkbox
        $('#defaultUnchecked').click(function(){

          if($(this).is(":checked"))
          {
            $("#btn_submit").hide();
            $("#btn_save").css('display','block');
            $("#txt_activityname").removeAttr('disabled');
            $("#slct_departments").removeAttr('disabled');
            $("#txt_date").removeAttr('disabled');
            $("#txt_time").removeAttr('disabled');
            $("#defaultChecked2").removeAttr(
              'disabled');
            $("#txt_activityplace").removeAttr('disabled');
            $("#txt_activityinformation").removeAttr('disabled');
            $("#slct_category").attr('disabled', false);
            $("#slct_category").selectpicker('refresh');
            if($("#staff_input").val() > "0")
            {
                $("#staff_input").removeAttr('disabled');
            }
            //$("#staff_input").removeAttr('disabled');
          }else if($(this).is(":not(:checked)") == true)
          {
            $("#btn_submit").show();
            $("#btn_save").hide();
            //$("#staff_input").attr('disabled', 'disabled');
            $("#txt_activityname").attr('disabled','disabled');
            $("#slct_departments").attr('disabled','disabled');
            $("#txt_date").attr('disabled','disabled');
            $("#txt_time").attr('disabled','disabled');
            $("#txt_activityplace").attr('disabled','disabled');
            $("#txt_activityinformation").attr('disabled','disabled');
            $("#defaultChecked2").attr('disabled','disabled');
            $("#staff_input").attr('disabled','disabled');
            $("#slct_category").attr('disabled', true);
            $("#slct_category").selectpicker('refresh');
          }
        });
        function backLoading()
        {
            $("#btn_submit").show();
            $("#btn_save").hide();
            //$("#staff_input").attr('disabled', 'disabled');
            $("#txt_activityname").attr('disabled','disabled');
            $("#slct_departments").attr('disabled','disabled');
            $("#txt_date").attr('disabled','disabled');
            $("#txt_time").attr('disabled','disabled');
            $("#txt_activityplace").attr('disabled','disabled');
            $("#txt_activityinformation").attr('disabled','disabled');
            $("#defaultChecked2").attr('disabled','disabled');
            $("#staff_input").attr('disabled','disabled');
            $("#slct_category").attr('disabled', true);
            $("#slct_category").selectpicker('refresh');
        }
        function updatingCategories()
        {
          // datas[1] = "<?php echo $_GET['eventid']; ?>";
          var delet = [];
          delet [0] = datas[1];
          delet[1] = $("#slct_category").val();
          delet[2] = delet[1].length;
          //delet[1] is the list of all the categories and delet[2] the length
          $.ajax({
            method:'POST',
            url: 'fetchCategoriesDB.php',
            data: {delet,delet},
            success:function(data)
            {
                  alert("Categories Changed successfully! ")
            }
          });
        }

        //Event on the Checkbox to change the staff textBox disabled value.
        $('#defaultChecked2').click(function(){

          if($(this).is(":checked"))
          {
            
            $("#staff_input").removeAttr('disabled');
          }else if($(this).is(":not(:checked)") == true)
          {
            $("#staff_input").attr('disabled', 'disabled');
          }
        });


    });
      
</script>

<script type="text/javascript">
  $(document).ready(function(){

            $("#keyword").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#search_btn").click();
    }
});
    $("#search_btn").on('click',function(e){

          var kw = $("#keyword").val();
          window.location.href = "searchbyword.php?keyword="+kw;
        });


     $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      }); 
  });



</script>

</html>
