<?php
  include("conn.php");
  session_start();
   if(!isset($_SESSION['name'])){
      header("Location: ./loginpage.php");
  }
  
  $error = NULL;
  $query =NULL;

  if(isset($_POST["search"])){
     

    foreach ($_POST['slct_category'] as $selectedOption)
    echo $selectedOption."\n";
/*
  $query = "SELECT * FROM `` WHERE `$column` IN(".implode(',',$array).")";

  $matches = implode(',', $galleries);
  SELECT *
FROM galleries
WHERE id IN ( $matches ) 

$ids = join("','",$galleries);   
$sql = "SELECT * FROM galleries WHERE id IN ('$ids')";

*/
  
      $query = "SELECT * FROM activity_info INNER JOIN activity_category WHERE activity_category.activity_id = activity_info.activity_id AND activity_category.category_id IN(".implode(',',$_POST['slct_category']).") GROUP BY activity_info.activity_id;";
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
          <li class="active ">
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
          <li >
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
          <li>
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
            <h5 class="navbar-brand" href="#pablo">Welcome, <?php echo  $_SESSION['name']; ?></h5>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">  <!-- start to copy-->
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
                <h5 class="title">Search by Category</h5>
              </div>
              <div class="card-body">
                <form id="catsearch" method="post">
          
                  <div class="row">
                    <div class="col-md-4 pl-1">
                      <div class="form-group" >
                        <label>Category</label>
                        <select class="selectpicker" name = "slct_category[]" id="slct_category" multiple data-live-search="true" style="color:white;" required="true">
                     
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row" >
                    <button type="submit" id="btn_submit" name = "search" class="btn btn-primary">Search</button>
                  </div>
                </form>
          <?php
          if($query!=NULL){
            $result = mysqli_query($db_link, $query);
            $actname =[];
            $actdep = [];
            $actdate = [];
            $actinfo = [];
            $counter = 0;

           
              if(mysqli_num_rows($result)==0){
                  echo "No activities found for the category you searched";
              }

              else{
                  while ($row = mysqli_fetch_array( $result)) { 
                  $id = $row['activity_id'];
                  $depto = $row['activity_host_depto'];
                                                  // GET THE DEPARTMENT NAME WITH THE NUMBER 
                  $getDept = "SELECT name_department FROM departments WHERE id_department = '$depto'; ";
                  $hostDept = mysqli_query($db_link, $getDept); 
                  $deprow = mysqli_fetch_array( $hostDept);

                  $actname[$counter] = $row['activity_name'];
                  $actdep[$counter] = $deprow['name_department'];
                //$actinfo[$counter] = $row['activity_info'];
                  $date =$row['activity_date'];
                  $date = strtotime($date);
                  $actdate[$counter] = date('M d, Y', $date);
                
                    echo "<div class='card'> ";
                      echo "<div class='card-header'>";
         
                        echo "<div class='col-md-8'>";
                        echo "<h4 class=card-category>" .$deprow['name_department']. "</h4>";
                        echo "</div>";

                        echo "<div class='col-md-8'>";
                        echo "<h4 class='card-title'>" .$row['activity_name']. "</h4>";
                        echo "</div>";

                        echo "<div class='col-md-8'>";
                        echo "<h4 class=card-category>" .$actdate[$counter]. "  &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<a class='btn btn-primary' href='activitydetails.php?eventid=$id' id='".$row['activity_id']."'> more info </a></h4>";
                       // echo "<a class='title' href='#'> more info </a>";
                        echo "</div>";
                      echo "</div> ";
                    echo "</div>";
                              $counter++;
                  }
              }
          }
                  ?>



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
        $('#slct_category').selectpicker();
        $('#slct_category').css("background-color","white");
        var info = "all";
        loadingCategories();
 
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
