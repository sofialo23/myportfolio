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
          <li class="active ">
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
          <li  >
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
            <a class="navbar-brand" href="#pablo">Create Activity</a>
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
              <div class="card-header">
                <h5 class="title">Create Activity</h5>
              </div>
              <div class="card-body">
                <form id="frm_createactivity">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Activity Name</label>
                        <input type="text" class="form-control" id="txt_activityname"   required>
                      </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Host Department</label>
                        <select id="slct_departments" class="form-control"  data-live-search="true">
                        </select>
                        <!-- <input type="text" class="form-control" placeholder="Department Name" id="txt_hostdepartment" value="" required> -->
                      </div>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Date</label>
                        <input type="text" class="form-control" placeholder="(Click on)" id="txt_date" value="" required>
                      </div>
                    </div>

                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Time</label>
                        <div class="input-grou clockpicker">
                          <input type="text" id="txt_time" class="form-control"  value="" required>
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
                        <input type="text" class="form-control" id="txt_activityplace"  value="" required>
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
                        <input type="checkbox" class="custom-control-input" id="defaultChecked2" >
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
                        <select class="selectpicker" id="slct_category" multiple data-live-search="true" style="color:white;">
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
                        <textarea rows="4" cols="80" class="form-control" id="txt_activityinformation" placeholder="Here can be your description" value="" required></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row" >
                    <button type="submit" id="btn_submit" class="btn btn-primary btn-lg btn-block">Create Activity</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script >
    $(document).ready(function(){
        // $('#txt_date').datetimepicker();
     
        $('#txt_date').datepicker();
        $('.clockpicker').clockpicker();
        $('#slct_category').selectpicker();
        var info = "all";
        loadingCategories();
        //Filling in the select HTML element
          $.ajax({
            type:'POST',
            url:'fetchCreateActivity.php',
            dataType:'json',
            data: {info,info},
            success:function(data)
            {

                var toAppend_col = '<option value="0"> ------------------- </option>';
                $("#slct_departments").append(toAppend_col);
                $.each(data,function(index,element){
                  var dd = '<option value="'+element.iddepartment+'">'+element.namedepartment+'</option>';
                  $("#slct_departments").append(dd);
                });
            }
          });
          //FUNCTION TO FILLL UP THE CATEGORIES DROPDOWN
          function loadingCategories()
          {
            
              var categories = "pop";
              $.ajax({
                type:'POST',
                url:'fetchCreateActivity.php',
                dataType:'json',
                data: {categories,categories},
                success:function(data)
                {
                    $.each(data,function(index,element){
                      var dd = '<option value="'+element.idcategory+'">'+element.namecategory+'</option>';
                      $("#slct_category").append(dd);
                    });
                    $('#slct_category').selectpicker('refresh');
                }
              });
          }

        /*  
            CLOCK PICKER GETTING VALUE INTERNET RESOURCE
            var end = $('#end').clockpicker({
                afterHourSelect: function() {
                    var c = end.data();
                    $('#end').val(c.clockpicker.hours + ':00');
                }
            });
            methods FOR CLOCK PICKER 
            https://github.com/mlitwiniuk/clockpicker-seconds

            FORMAAA DOSSS
            $('.container').clockpicker().find('input').change(function(){
              $('#new').val(this.value);
            });

        */

        /*FIRST PART OF HOW TO GET THE DATA
          $("#datepicker").datepicker({
             onSelect: function(dateText, inst) { 
                var dateAsString = dateText; //the first parameter of this function
                var dateAsObject = $(this).datepicker( 'getDate' ); //the getDate method
             }
          });
          SECOND PART TO PUT IT INSIDE THE METHOD
          var jsDate = $('#your_datepicker_id').datepicker('getDate');
          if (jsDate !== null) { // if any date selected in datepicker
              jsDate instanceof Date; // -> true
              jsDate.getDate();
              jsDate.getMonth();
              jsDate.getFullYear();
          }
        */
        //Event on the Submit Button.

       $("#frm_createactivity").on('submit',function(e){
          var alldate = [];
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
          var categg = [];
          categg = $("#slct_category").val();

          // alert(categg.length);
          alldate[0] = $('#txt_activityname').val();
          alldate[1] = $('#slct_departments').val();
          alldate[2] = year+"-"+month+"-"+day; 
          alldate[3] = $('#txt_time').val() + ":00";
          alldate[4] = $('#txt_activityplace').val();
          alldate[5] = chckbx;
          alldate[6] = $('#txt_activityinformation').val();
          alldate[7] = year+"-"+month+"-"+day + " " + alldate[3];
          alldate[8] = "<?php echo $_SESSION['userID']; ?>";
          alldate[9] = $("#slct_category").val();
          alldate[10] = categg.length;
        //  if(!alldate[10]) alldate[10] = 0;

          e.preventDefault();
          $.ajax({
            dataType:'text',
            method:'POST',
            url: 'fetchCreateActivity.php',
            data: {alldate,alldate},

            success:function(data){
              console.log("Entered THE function");
              console.log(data);
              debugger;
              window.location.href = "upimage.php" + "?id=" + data;
              
            }
          });
        });

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
