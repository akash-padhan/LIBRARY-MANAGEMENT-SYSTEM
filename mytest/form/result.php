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
<!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="../index.php">Student Library</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="./index.php">Register</a></li>
                   
                    </ul>
                </div>
            </div>
        </nav>


<?php

include 'connection.php';

if(isset($_POST['submit']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pwd = md5($_POST['pwd']); //https://www.google.com/search?q=adloons%2Ccom&oq=adloons%2Ccom&aqs=chrome..69i57j33i160l4.6684j0j4&sourceid=chrome&ie=UTF-8

    if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploadimg/".$file_name);
      }else{
         print_r($errors);
      }
    }

}


$query = " INSERT INTO info(first_name,last_name,dob,gender,email,phone,pwd,file)
VALUES ('$first_name','$last_name','$birthday','$gender','$email','$phone','$pwd','$file_name') ";

$run = mysqli_query($conn,$query);

if(!$run)
{
    echo "form not submited" . mysqli_error($conn);
}



?>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h1 style="font-size: 80px; color: #9b3eda">Thank you . . </h1>
                    <h3 class="title">This is your Registration Data</h3>
                    <table class="table">
                        <thead>
                          <tr>
                            <th> FormInfo </th>
                            <th> Data</th>
                        
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>First Name</td>
                            <td><?php echo $_POST['first_name']?></td>
                          </tr>
                          <tr>
                            <td>Last Name</td>
                            <td><?php echo $_POST['last_name']?></td>
                          </tr>
                          <tr>
                            <td>BOD</td>
                            <td><?php echo $_POST['birthday']?></td>
                          </tr>
                          <tr>
                            <td>Gender</td>
                            <td><?php echo $_POST['gender']?></td>
                          </tr>
                          <tr>
                            <td>Email</td>
                            <td><?php echo $_POST['email']?></td>
                          </tr>
                          <tr>
                            <td>Phone</td>
                            <td><?php echo $_POST['phone']?></td>
                          </tr>     
                      
                        </tbody>
                      </table>
                </div>

                  <div class="p-t-15">
                         <!--    <button class="btn btn--radius-2 btn--blue" type="submit" name="submit">
                                <a style="text-decoration: none; color: white;" href="login.php">go to login page -></a>
                            </button> -->
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