<?php
    
include "connection.php";

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
       $myusername = mysqli_real_escape_string($conn,$_POST['email']);
       $mypassword = md5($_POST['pwd']);
      
      $sql = "SELECT id FROM info WHERE email = '$myusername' and pwd = '$mypassword'";
      $result = mysqli_query($conn,$sql);

      $result_id = $result->fetch_row();
      $resulId = $result_id[0];
      

      $row = mysqli_fetch_array($result);


    
      // $active = $row['active'];

      $count = mysqli_num_rows($result);


      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {

         $_SESSION['login_user'] = $resultId;

         // session_register("resultId;");

     
         
         header("location: ../admin/index.php");   
      }
      else 
      {
         echo "Your Login Name or Password is invalid";
      }
   }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
        <link href="../css/styles.css" rel="stylesheet" />

</head>

<body>
      <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../index.php">Student Library</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#"></a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">Register</a></li>
                        

                </div>
            </div>
        </nav>

    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">USER LOGIN</h2>

                    <form method="POST" action="#">
                        <div class="row row-space">
                            
                        <div class="form-group-row">
                            <div class="col-xs-4">
                                <div class="input-group">
                                    <label class="label">username</label>
                                    <input class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                         
                    
                        <div class="form-group-row">
                            <div class="col-xs-4">
                                <label for="pwd">Password:</label>
                                <input  class="input--style-4" type="password" id="pwd" name="pwd">
                            </div>
                        </div>


                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->