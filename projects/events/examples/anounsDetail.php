<?php
include ('conn.php');
session_start();
 if(!isset($_SESSION['name'])){
      header("Location: ./loginpage.php");
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
                  <li  >
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
          <li >
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
            <a class="navbar-brand" href="#pablo">Announcement details</a>
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
                  <h4 class="card-title">Announcement</h4>
                  <h7 >(General notification)</h7>
                </div>

              </div>

                
              
              <div class="card-body">
                <div class="table-responsive">
                    <div class="custom-control custom-checkbox" style="float:left;">
                  <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                  <label class="custom-control-label" for="defaultUnchecked">Edit</label>
                </div>
                  <table class="table">
                  
                <?php 
                  $notifid = $_GET['notifid'];
                  $activityid = $_GET['activity'];

                  $query = "SELECT activity_info.activity_name, activity_notif.activity_notif_msg, activity_notif.activity_notif_id, activity_notif.activity_notif_date_created, activity_notif.activity_notif_activity_id FROM activity_notif inner join activity_info on activity_info.activity_id=activity_notif.activity_notif_activity_id where activity_notif.activity_notif_id=$notifid";
                  $result = mysqli_query($db_link, $query); 

                  if ($row = mysqli_fetch_array( $result)) { 
                        

                        echo " <table class='table'>";

                        
                        echo "<tr> <td class= 'text-primary'> Activity Name </td> <td >" . $row['activity_name'] . " </td><td></td> </tr>";
                        echo "<tr> <td class= 'text-primary'> Announcement </td> <td ><label style='text-align:justify;color:black;' id='lbl_anouns'>" . $row['activity_notif_msg']. "</label><textarea rows='4' id='txt_anouns' cols='80' class='form-control' placeholder='Here can be your Announcement Info' value='" . $row['activity_notif_msg']. "' required></textarea></td> <td></td></tr>";
                        
                        // echo "<tr>";
                        // echo "<td><a href= 'activityInfo.php?eventid=$id' id=".$row['activity_id']." class= 'btn btn-primary btn-lg btn-block'>Modify this Activity</a></td> </td><td></td><td></td></tr>";
                  }
                     ?>
                  
                  </table>

                    <div class="panel panel-default" style="text-aling:center;"> 
                          <div class="panel-body"><button id="btn_save" type="button" class="btn btn-info btn-lg" style="width:150px;font-size:15px;text-aling:left;padding-top:25px;padding-bottom:25px;" >Save</button></div>
                    </div>    
                  

                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
                <div class="card-header">
                  <h5 class="title">Activity Information</h5>
                </div>
                <div class="row">
                  <div class="col-md-5 pr-1">
                    <div class="form-group">
                      <label>Activity Name</label>
                      <input type="text" class="form-control" id="txt_activityname"  placeholder="Company" required disabled>
                    </div>
                  </div>
                  <div class="col-md-5 px-1">
                    <div class="form-group">
                      <label>Host Department</label>
                      <input type="text" class="form-control" placeholder="Department Name" id="txt_hostdepartment" value="" required disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control" placeholder="Date (Click on)" id="txt_date" value="" required disabled>
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
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
                  <div class="col-md-4 px-1">
                    <div class="form-group">
                      <label>Staff Number</label>
                      <input type="text" id="staff_input" size=3 class="form-control"  placeholder="Staff Number: 0" value="0" disabled>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>Activity Information</label>
                        <textarea rows="4" cols="60" class="form-control" id="txt_activityinformation" placeholder="Here can be your description" value="" required disabled></textarea>
                      </div>
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
<script>
  $(document).ready(function(){
    // select: id="slct_activities"
    // txtArea: id="txt_anouns_content"
    var info = "all";
    var slct = $("#slct_activities");
    $("#btn_save").hide();
    $("#txt_anouns").hide();
    var activityNotifId = getQueryVariable("notifid");
    var activityId = getQueryVariable("activity");
    var elId = activityId;
    var rol = getQueryVariable("rol");

    //IF rol es 1, the button to go back will have another address, to the actAnouns page with the respective parameters
    //If rol es 0, the buttong to go back, will have parameters to the announcement page
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

    //Filling in the select HTML element
      $.ajax({
        type:'POST',
        url:'fetchStudentActivityDB.php',
        dataType:'json',
        data: {elId,elId},
        success:function(data)
        {
          $.each(data,function(index,element){
            //Fill in all the Labels into the info Card on the right
            // $("#lbl_activityname").append(element.activityname);
            $("#txt_activityname").val(element.activityname);
            $("#txt_hostdepartment").val(element.activityhostdepto);
            var ddd = element.activityname;
            var completedate = element.activitydate;
            if(typeof completedate != 'undefined')
            {
              var fecha = (completedate).substr(0,10);
              var time = (completedate).substr(11,16);
              $("#txt_date").val(fecha);
              $("#txt_time").val(time);
            }
            $("#staff_input").val(element.activitystafflimit);
            $("#txt_activityplace").val(element.activityplace);
            $("#txt_activityinformation").val(element.activityinfo);
          });
        }
      });
      
      

      $("#btn_back").on('click',function(e){

        if(rol == 0)
        {
          window.location.href = "announcement.php";
        }else if(rol == 1)
        {
          window.location.href = "actAnouns.php?id="+activityId;
        }

        });
      var el_text = $("#lbl_anouns").text();

      $('#defaultUnchecked').click(function(){
        
        if($(this).is(":checked"))
        {
          $("#btn_save").css('display','block');
          $("#lbl_anouns").hide();
          $("#txt_anouns").css('display','block');
          $("#txt_anouns").text(el_text);
        }else if($(this).is(":not(:checked)") == true)
        {
          $("#btn_save").hide();
          $("#txt_anouns").hide();
          $("#lbl_anouns").css('display','block');
          $("#lbl_anouns").text(el_text);
        }
      });

      $("#btn_save").on('click', function(e){
        var anouns = $("#txt_anouns").val();
        el_text = anouns;
        var editV = [];
        editV[0] = anouns;
        editV[1] = activityId;
        editV[2] = activityNotifId;
        editV[3] = rol;
        $.ajax({
        type:'POST',
        url:'fetchStudentActivityDB.php',
        dataType:'text',
        data: {editV,editV},
        success:function(data)
        {
            if(data == "success")
            {
              //AUN NO HE TERMINADOOOOOO DESPUES DE HACER UPDATE EN LA BASE DE DATOS
              //first, do not mark it selected. 
              setUp();
            }
        }
      });

    });
    function setUp()
      {
        alert("dentro de setUp");
          // $("#btn_save").hide();
          // $("#txt_anouns").hide();
          var activityNotifId = getQueryVariable("notifid");
          var activityId = getQueryVariable("activity");
          var elId = activityId;
          var rol = getQueryVariable("rol");
          $.ajax({
          type:'POST',
          url:'fetchStudentActivityDB.php',
          dataType:'json',
          data: {elId,elId},
          success:function(data)
          {
            alert("dentro de setUp success");
            $.each(data,function(index,element){
               $("#btn_save").hide();
              $("#txt_anouns").hide();
              $("#lbl_anouns").css('display','block');
              $("#lbl_anouns").text(el_text);
              //Fill in all the Labels into the info Card on the right
              // $("#lbl_activityname").append(element.activityname);
              $("#txt_activityname").val(element.activityname);
              $("#txt_hostdepartment").val(element.activityhostdepto);
              var ddd = element.activityname;
              var completedate = element.activitydate;
              if(typeof completedate != 'undefined')
              {
                var fecha = (completedate).substr(0,10);
                var time = (completedate).substr(11,16);
                $("#txt_date").val(fecha);
                $("#txt_time").val(time);
              }
              $("#staff_input").val(element.activitystafflimit);
              $("#txt_activityplace").val(element.activityplace);
              $("#txt_activityinformation").val(element.activityinfo);
            });
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