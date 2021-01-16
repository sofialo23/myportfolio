
<?php
  $error = NULL;
  include ('conn.php');
  
  if (isset($_POST['submit'])){
    $id = $_POST['student_id'];
    $pw = $_POST['pw'];
    $pw = md5($pw);
      //query the DB
    $query = "SELECT * FROM user_info WHERE user_name ='$id' AND pw = '$pw' LIMIT 1";
    $resultSet = mysqli_query($db_link, $query);
    if(mysqli_num_rows($resultSet) == 1 ){
        //PROCESS LOGIN 
      if($row = mysqli_fetch_assoc($resultSet)){
        session_start();
          $verified = $row['verified'];

         // $_SESSION['message'] = "You have successfully logged in";
          $_SESSION['name'] = $row['name'];
          $_SESSION['email'] = $row['user_email'];
          $_SESSION['dept'] = $row['user_depto'];
          $_SESSION['userID'] = $row['user_name'];
          $_SESSION['rol'] = $row['user_rol'];
          $_SESSION['over'] = "false";
          $email = $row['user_email'];
          $date = $row['signup_date'];
          $date = strtotime($date);
          $date = date('M d Y', $date);
          if($verified == 1){
            //KEEP PROCESSING 
            header('location:dashboard.php');
            
          }
          else{
            $error = "This account has not yet been verified. And email was sent to $email on $date";
          }
        print "\r\n";
      }
    }
    else{
      // INVALID CREDENTIALS
      $error = "The username or password you entered is incorrect";
    }
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
    Activities Organizer
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
  
    <div >
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
            <a class="navbar-brand" href="#pablo">Log In</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
     
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
                <h5 class="title">Login to your account</h5>
              </div>
              <div class="card-body">
                <form id="login_form" method="post">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" class="form-control" id="student_id" name = "student_id" required = "true">
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name = "pw"  id="pw" value="" required>
                      </div>
                    </div>
                  </div>
             
                  <div class="row" >
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <button type="submit" id="submit" name = "submit" class="btn btn-primary btn-lg btn-block">Login</button>
                      </div>
                    </div>
                    
                  </div>
                </form>
              </div>
              <?php if($error!=NULL)echo "<h5 style='color:red;'> *** $error *** </h5>";?>
            </div>
            <a href="resetpw.php"> Forgot your password? </a>
          </div>
        </div> <br>Don't have an account yet?
            <a href="signup.php"> Create a new account </a>
      </div>
    </div>
  </div>
</body>

</html>
