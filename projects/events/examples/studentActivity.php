<?php
include ('conn.php');
session_start();
if(!isset($_SESSION['name'])){
      header("Location: ../examples/loginpage.php");
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery-ui.css">
  <script src="jquery-ui.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <!-- END OF ALL THE SCRIPTS AND LINKS ORIGINALLY AT THE END OF THIS-->
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   NDHU Events
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
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
          <li >
            <a href="./allactivities.php">
              <i class="now-ui-icons education_atom"></i>
              <p>All Activities</p>
            </a>
          </li>
          <li  >
            <a href="./allmyactivities.php">
              <i class="now-ui-icons education_atom"></i>
              <p>My Activities</p>
            </a>
          </li>


          <?php 

            if($_SESSION["rol"] == 1)
            {
                echo "
                  <li>
                    <a href='./createActivity.php'>
                      <i class='now-ui-icons location_map-big'></i>
                      <p>Create Activity</p>
                    </a>
                  </li>
                  <li>
                    <a href='./createAnouns.php'>
                      <i class='now-ui-icons ui-1_bell-53'></i>
                      <p>Create Announcements</p>
                    </a>
                  </li>
                  <li>
                    <a href='./contactadmin.php'>
                      <i class='now-ui-icons users_single-02'></i>
                      <p>Message to Admin</p>
                    </a>
                  </li>
                ";

            }

          ?>

          <li  >
            <a href="./announcement.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Announcements</p>
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
            <a class="navbar-brand" href="#pablo">Activity Details</a>
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
          <div class="col-md-8" style="text-align:center;display: inline-block;margin:0 auto;">
            <div class="card" style="text-align:center;display: inline-block;margin:0 auto;">
              
              <div class="row">
                
                <div class="col-md-4 pr-1" style="float:left;" >
                  <div class="form-group">
                    <div class="panel panel-default" style="text-aling:left;"> 
                      <div class="panel-body"><button id="btn_back" type="button" style="background-color:#F1EBF1;color:#4B4A4B;" class="btn btn-light" ><-Go back!</button></div>

                    </div>
                  </div>
                </div>  
              

                <div class="card-header">
                  <h5 class="title">Activity Information</h5>
                </div>

                <div class="col-md-4 pr-1" style="float:right;" >
                  <div class="form-group">
                    <div class="panel panel-default" style="text-aling:left;"> 
                      <div class="panel-body"><button id="btn_thisAnouns" type="button" style="background-color:#006600;color:#f2f2f2;" class="btn btn-success" ><-Announcements!</button></div>

                    </div>
                  </div>
                </div>

              </div>

              <div class="card-body" >
                <form id="frm_createactivity" style="display: block; margin-left: auto; margin-right: auto;">

                <div class="row">
      
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
                
                </div>

                  <div class="row">
                    <div class="col-md-6 pr-3">
                    	 
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Activity Name</h5>
                          </div>
                          <div class="panel-body"><h6 id="lbl_activityName"></h6></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-3">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Host Department</h5>
                          </div>
                          <div class="panel-body"><h6 id="lbl_hostDepartment"></h6></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 pr-3">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Activity Date</h5>
                          </div>
                          <div class="panel-body"><h6 id="lbl_activityDate"></h6></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-3">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Activity Time</h5>
                          </div>
                          <div class="panel-body"><h6 id="lbl_activityTime"></h6></div>
                        </div>
                      </div>
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class="col-md-12 pr-3">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Activity Place</h5>
                          </div>
                          <div class="panel-body" ><h6 id="lbl_activityPlace"></h6></div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-4 pr-3">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Staff Required</h5>
                          </div>
                          <div class="panel-body"><h6 id="lbl_activityStaffLimit"></h6></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 px-3">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Staff counter</h5>
                          </div>
                          <div class="panel-body"><h6 id="lbl_activityStaffCounter"></h6></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 px-3">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Status</h5>
                          </div>
                          <div class="panel-body"><h6 id="lbl_activityStatus"></h6></div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12 pr-3">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          <div class="panel-heading" style="background-color:#f1f1f1;border-radius: 25px; text-align: center;">
                            <h5 class="panel-title">Activity Information</h5>
                          </div>
                          <div class="panel-body"><h6 id="lbl_activityInformation"></h6></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="row " >
                    <div class="col-md-12">
                      <button type="button" id="btn_submit" class="btn btn-primary btn-lg btn-block">Cancel, Go back to all my activities</button>
                    </div>
                  </div> -->

                  <div class="row" style="float:right;padding-right:10px; text-aling:left;" >
                    <div class="col-md-6 pr-2">
                      <div class="form-group">
                        <div class="panel panel-default" style="text-aling:left;"> 
                          <div class="panel-body"><button id="btn_attend" type="button" class="btn btn-info btn-lg" style="width:150px;font-size:15px;text-aling:left;padding-top:25px;padding-bottom:25px;">Attend</button></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 px-2">
                      <div class="form-group">
                        <div class="panel panel-default"> 
                          
                          <div class="panel-body"><button id="btn_join" type="button" class="btn btn-warning btn-lg" style="width:150px;font-size:15px;">+ Join Staff!</button></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" style="float:left;padding-right:10px; text-aling:left;" >
                    <div class="col-md-6 pr-2">
                      <div class="form-group">
                        <div class="panel panel-default" style="text-aling:left;"> 
                          <div class="panel-body"><button id="btn_cancel" type="button" class="btn btn-danger" style="width:150px;font-size:15px;text-aling:left;padding-top:25px;padding-bottom:25px;">Cancel request</button></div>

                        </div>
                      </div>
                    </div>
                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script >
    $(document).ready(function(){ 
/*
            if(  "#lbl_activityStaffLimit".val()==0  ||  "#lbl_activityStaffCounter".val() == "#lbl_activityStaffLimit".val()){

              $("#btn_join").attr('disabled','disabled');

            }*/ 

        $('#txt_date').datepicker();
        $('.clockpicker').clockpicker();
        $("#btn_save").hide();
        var status = "none";
        var flag = getQueryVariable("flag");
        var datas=[]; 
        datas[0]= "<?php echo $_SESSION['userID']; ?>";
        datas[1] = getQueryVariable("eventid");
        datas[2] = "";
        var elId = datas[1];

        //NOW WE ARE GOING TO COMPARE THE DATE so we can hide the cancel button
        var date_flag = getQueryVariable("flag"); 
        //date_fla=1 means that the activity has not passed yet.
        // alert(date_flag);
        if(date_flag == "0")
        {
            $("#btn_cancel").attr('disabled','disabled');
            $("#btn_attend").attr('disabled','disabled');
            $("#btn_join").attr('disabled','disabled');
        }else if(date_flag == "1")
        {
          $("#btn_cancel").removeAttr('disabled');
          $("#btn_attend").removeAttr('disabled');
          $("#btn_join").removeAttr('disabled');
        }


        // alert(datas[1] + " " + datas[0]);


        // datas[1] -> Id of the activity
        // datas[0] -> ID del student para insert into notif_atst
        //NEED TO DISABLE ALL THE INPUTS HERE 

        //Going to look for this activity_creator 'first' and activity_id=8
        //And load up the info into the inputs
        
        //The function below is to catch the value of the Get parameter in the URL
        function getQueryVariable(variable)
        {
               var query = window.location.search.substring(1);
               var vars = query.split("&");
               for (var i=0;i<vars.length;i++) {
                       var pair = vars[i].split("=");
                       if(pair[0] == variable){return pair[1];}
               }
               return(false);
        }
        checkStatus();
        $.ajax({
          url:'fetchStudentActivityDB.php',
          dataType: 'json',
          method: 'POST',
          data: {elId,elId},
          success: function(data){
            
            $.each(data,function(index,element){
              // alert(element.activityhostdepto);
              $("#lbl_activityName").text(element.activityname);
              datas[2] = element.activityname;
              $("#lbl_hostDepartment").text(element.activityhostdepto);
              var completedate = element.activitydate;
              if(typeof completedate != 'undefined')
              {
                var fecha = (completedate).substr(0,10);
                var time = (completedate).substr(11,13);

                $("#lbl_activityDate").text(fecha);
                $("#lbl_activityTime").text(time);
              }
              // alert(element.activitydate);
              //fecha: 2019-04-12 18:00:00
              $("#lbl_activityStaffLimit").text(element.activitystafflimit);
              $("#lbl_activityStaffCounter").text(element.activitystaffcounter);

              $("#lbl_activityInformation").text(element.activityinfo);
              $("#lbl_activityPlace").text(element.activityplace);

              if(element.activitystafflimit == element.activitystaffcounter || element.activitystafflimit==0 ) // either staff is full or no staff is required
              {
                  $("#btn_join").attr('disabled','disabled');
              }
              atst();
              
            });
          }
        });
        function checkStatus()
        {
          // datas[0]= "<?php echo $_SESSION['userID']; ?>";
          // datas[1] = getQueryVariable("eventid");
          var status = [];
          status = datas;
          $.ajax({
            url:'fetchActivityInfoDB.php',
            dataType: 'text',
            method: 'POST',
            data: {status,status},
            success:function(data){
              // alert(data);
              if(data == "0")
              {
                // alert("primer if");
                setStatus("Attending");
                $("#lbl_activityStatus").text(givingStatus());

              }else if(data == "1")
              {
                  // alert("segundo if");
                  setStatus("Staff");
                  $("#lbl_activityStatus").text(givingStatus());
              }
            }
          });
        }
        function setStatus(thaStatus)
        {
            status = thaStatus;
        }
        function givingStatus()
        {
            return status;
        }
        $("#btn_back").on('click',function(e){
            window.location.href = "allactivities.php";

        });
        $("#btn_join").on('click',function(e)
        {
            saveIntoDB(1); //1 is value for Joinning Staff

        });
        $("#btn_attend").on('click',function(e)
        {
            saveIntoDB(0); // 0 is value for Attending the activity

        });
        $("#btn_thisAnouns").on('click', function (e)
        {
            window.location.href = "actAnouns.php?id="+datas[1]+"&title="+datas[2]+"&flag="+flag;
        });
        $("#btn_cancel").on('click',function(e)
        {
            var del = [];
            del[0] = datas[0];
            del[1] = datas[1];
            $.ajax({
              type:'POST',
              url: 'fetchStudentActivityDB.php',
              dataType: 'text',
              data: {del,del},
              success:function(data)
              {
                if(data == "success")
                {
                  $("#btn_cancel").attr('disabled','disabled');
                  $("#btn_attend").removeAttr('disabled');

                  // this should only work when staff required is >0 $("#lbl_activityStaffCounter").text(element.activitystaffcounter);

                  if( $("#lbl_activityStaffLimit").text()!='0' &&  $("#lbl_activityStaffCounter").text()-'0' < $("#lbl_activityStaffLimit").text()-'0')
                  $("#btn_join").removeAttr('disabled');
                }
              }
            });
        });
        function saveIntoDB(rod)
        {
            var go = [];
            go[0] = datas[0];
            go[1] = datas[1];
            go[2] = rod;
            $.ajax({
              type:'POST',
              url:'fetchStudentActivityDB.php',
              dataType:'text',
              data: {go,go},
              success:function(data)
              {
                if(data=="success")

                {
                  if(rod==1)
                  {
                    alert("You have joined this activity succesfully!");
                  }else if(rod == 0)
                  {
                    alert("Congrats! We are looking forward to have you with us");
                  }
                  $("#btn_join").attr('disabled','disabled');
                  $("#btn_attend").attr('disabled','disabled');
                  $("#btn_cancel").removeAttr('disabled');
                }
                  
                  // atst();
              }
            });
        }
        
        //Function to check if the user (student)
        //is already attending or staff y desabilitar los 
        //botones no matter which one he chosed.
      function atst()
      {
        // datas[0] -> ID del student para insert into notif_atst
        var chck = [];
        chck[0] = datas[0];
        chck[1] = datas[1];
        var flag = false;
        $.ajax({
          type:'POST',
          url:'fetchStudentActivityDB.php',
          dataType:'text',
          data: {chck,chck},
          success:function(data)
          {
              if(data=="success")//means it is in the DB already
              {
                $("#btn_join").attr('disabled','disabled');
                $("#btn_attend").attr('disabled','disabled');
              }else if (data=="caca")
              {
                $("#btn_cancel").attr('disabled','disabled');
              }
          }
        });
      }
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
  });
</script>

</html>
