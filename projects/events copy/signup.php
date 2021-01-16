<?php
  $error = NULL;
  include ('conn.php');

  if(isset($_POST['subForm'])){

    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $college = $_POST['college'];
    $department = $_POST['department'];
    $pw = $_POST['pw'];
    $p2 = $_POST['p2'];
    $date = date('Y-m-d H:i:s');
    $email = $student_id."@gms.ndhu.edu.tw";
                              //CHECK WHETHER THE USER IS A STUDENT OR TEACHER/STAFF
      function isNumber($s)  { 
            for ($i = 0; $i < strlen($s); $i++) 
                if (is_numeric($s[$i]) == false) 
                    return false; 
          
            return true; 
        } 
          

          
        if (isNumber($student_id))   //STUDENT
            $rol = 0;
          
        else
              //TEACHER
          $rol = 1;
            

    //CHECK IF THAT STUDENT ID HAS ALREADY BEEN REGISTERED
    $query = "SELECT * FROM user_info WHERE user_name = '$student_id'";
  
    $used = mysqli_query($db_link,$query);
    
      if(mysqli_num_rows($used) ==1 ){
         //$error = "This student id has already been registered";
    
      $error = "This student id has already been registered! Check your email and try again";
      }

      if($college == 0){
         $error = "Select your College";
      }

       else if($department == 0){
         $error = "Select your Department";
      }

      else if($pw != $p2){
        $error = "your passwords DO NOT match";
      }
    else{
        // GENERATE VKEY

      $vkey = md5(time().$name);
      
        // INSERT ACCOUNT INTO DB
      $pw = md5($pw);
      $p2 = md5($p2);
      $sql = "INSERT INTO user_info (name, user_name, user_email, user_rol, user_depto, pw, vkey, signup_date) VALUES ('$name', '$student_id', '$email', '$rol', '$department', '$pw', '$vkey', '$date');";

        $result = mysqli_query($db_link,$sql);
        if($result){
                //SEND EMAIL
          $to = $email;
          $subject = "Email Verification";
          $message ="<a href='http://ndhue.codeandwine.com/examples/verify.php?vkey=$vkey'> Click Here to register your account</a>";
          $headers = "From: esofia91@gmail.com \r\n";
          $headers .= "MIME-Version:1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

          mail($to, $subject, $message, $headers);
          header('location:thankyou.php');
        }
       
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
                <h5 class="title">Create a new account</h5>
              </div>
              <div class="card-body">
                <?php if($error!=NULL)echo "<h5 style='color:red;'> *** $error *** </h5>";?>
                <form id="login_form" method="post">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name = "name" required >
                      </div>
                    </div>
                  </div>
                   <div class="row"> 
                    <div class="col-md-5 pr-1"> 
                      <div class="form-group"> 
                        <label>Student ID </label>
                        <input type="text" class="form-control" id = "student_id"  name = "student_id" required >
                      </div> <div id="av_response" class="response"></div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>College</label>
                        <select class = "form-control" id="college" name="college" required >
                          <option value="0">Select your College</option>
                            <?php
                            include("conn.php");
                            $sql_getCollege = "Select * from colleges;";
                            $result_getCollege = mysqli_query($db_link, $sql_getCollege);
                            if($result_getCollege)
                            {
                              while($row_gtCol = mysqli_fetch_assoc($result_getCollege))
                              {
                                echo "<option name='optCol' value='".$row_gtCol["id_college"]."' id='".$row_gtCol["id_college"]."' >".$row_gtCol["name"]."</option>";
                              }
                            }else
                            {
                              do_alert("Error Loading the Colleges from the DB");
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                     <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Department</label>
                        <select class = "form-control" id="department" name="department" required >
                    <option value = 0>Select your department</option>
                   </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name = "pw" required>
                      </div>
                    </div>
                  </div>
                <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name = "p2" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <button type="submit" name="subForm" class="btn btn-primary btn-lg btn-block">Register</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
               
            </div>
             Already have an account?
            <a href="loginpage.php"> Go to Login Page </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


<script>
$(document).ready(function(){
    var choosedpt = "";
    var flag=1;
    $('#college').change(function(){
    var col = $("#college").val();
       $.ajax({
          type:'POST',
          url:'signupFetch.php',
          dataType: "json",
          data:{col:col},
          success:function(datacol){
              var toAppend_col = '';
              $('#department').empty();
              toAppend_col += '<option value = "0">--- Select a Department ---</option>';
              $('#department').append(toAppend_col);
              $.each(datacol,function(index_col, element_col){
              if(element_col.iddepartment!=choosedpt){
                  $('#department').append("<option value='"+element_col.iddepartment+"'  id='"+element_col.iddepartment+"' >" + element_col.namedepartment + "</option>");
              }
              else{
                  $('#department').append("<option selected value='"+element_col.iddepartment+"'  id='"+element_col.iddepartment+"' >" + element_col.namedepartment + "</option>");
              }
              });
          }
      });
    });
});

</script>
     
<script>  //CHECK IF STUDENT ID IS ALREADY IN DB OR NOT
$(document).ready(function(){
   $("#student_id").keyup(function(){

      var uname = $("#student_id").val().trim();

      if(uname != ''){
         $("#av_response").show();
         $.ajax({
            url: 'signupFetch.php',
            type: 'post',
            data: {uname:uname},
            success: function(response){

                if(response > 0){
                    $("#av_response").html("<span style='color:red;'>* Student ID already registered</span>");
                }else{
                    $("#av_response").html("<span style='color:green;'>Student ID available</span>");
                }

             }
          });
      }else{
         $("#av_response").hide();
      }

    });

 });
</script>