
<?php
$error = NULL;
$msg = NULL;


function checkUser($sid){
  include ('conn.php');
          global $db;
          $query = mysqli_query($db_link, "SELECT * FROM user_info WHERE user_name = '$sid'");
          if(mysqli_num_rows($query) > 0){
              $row = mysqli_fetch_array( $query);
              global $uemail;
              $uemail = $row['user_email'];       
              return 'true';
          }
          else{
              return 'false';
          }
}


if(isset($_POST['submit'])) {
  include ('conn.php');
  $sid = $_POST['sid'];
  /*$uemail = $_POST['uemail'];

  $uemail = mysqli_real_escape_string($db_link, $uemai);*/
 // $uemail = $sid."@gms.ndhu.edu.tw";
  

  if(checkUser($sid) == "true"){

    $token = md5(time().$sid);

      $finduser = mysqli_query($db_link, "SELECT * FROM recovery_keys WHERE userID = '$sid'");  
          // check if user is in the table already
          if(mysqli_num_rows($finduser) > 0){
              // update  
              $query = mysqli_query($db_link, "UPDATE recovery_keys SET token = '$token', valid = 1 WHERE userID = $sid; ");
          }
          else{ //create a new entry
                $query = mysqli_query($db_link, "INSERT INTO recovery_keys (userID, token) VALUES ( $sid , '$token') ");
          }
  
     
    if($query) {
              //SEND EMAIL with link to renew password
          $to = $uemail;
          $subject = "Password Recovery";
          $message ="<a href='http://localhost/Events/examples/forget.php?id=$sid&token=$token'> Click Here to reset your password</a>";
          $headers = "From: esofia91@gmail.com \r\n";
          $headers .= "MIME-Version:1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          mail($to, $subject, $message, $headers);
          //header('location:login.php');//$msgclass = 'bg-danger';
          $msg = 'A mail with recovery instruction has been sent to your email.';    
    }
    else{  
      $error = 'There is something wrong.';  
      //$msgclass = 'bg-danger';   
    }
  }
  else{
    $error = "This student ID / username doesn't exist in our Website. Please check it and try again";
    //$msgclass = 'bg-danger';
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
            <a class="navbar-brand" href="#pablo">Password reset</a>
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
                <h5 class="title">Reset your password</h5>
              </div>
              <div class="card-body">
                <form id="login_form" method="post">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Student ID / username </label>
                        <input type="text" class="form-control" id="student_id" name="sid" required = "true">
                      </div>
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <button type="submit" id="submit" name = "submit" class="btn btn-primary btn-lg btn-block">Send email</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <?php 

                if($error!=NULL)
                 echo "<h5 style='color:red;'> *** $error *** </h5>";
              else if($msg!=NULL)
                 echo "<h5 style='color:green;'> *** $msg *** </h5>";
              ?>
            </div>
            <a href="loginpage.php"> Go back to Login Page </a>
          </div>
          <div class="col-md-4">
              
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
