
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
      

      <!-- //////////     NAV-BAR     /////////// -->

      <?php 

      include"../../navbar.php";

      ?>
        <!-- //////////     SIDEBAR     /////////// -->
    
      <?php 

      include"../../sidebar.php";

      ?>
                    <?php


                  if(isset($_POST['submit']))
                    {
                      include "connection.php";
                      $name = $_POST['name'];
                      $description = $_POST['description'];
                      
                        if(isset($_FILES['image'])){
                        $errors= array();
                        $file_name = $_FILES['image']['name'];
                        $file_size =$_FILES['image']['size'];
                        $file_tmp =$_FILES['image']['tmp_name'];
                        $file_type=$_FILES['image']['type'];
                        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
                        
                        $extensions= array("jpeg","jpg","png");
                        
                        if(in_array($file_ext,$extensions)=== false){
                          $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                        }
                        
                        if($file_size > 2097152){
                          $errors[]='File size must be excately 2 MB';
                        }
                        
                        if(empty($errors)==true){
                           $destination = "uploadimg/".$file_name;
                          move_uploaded_file($file_tmp,$destination);
                        }else{
                          print_r($errors);
                        }
                      }
                    $query = " INSERT INTO category(name,description,image)
                    VALUES ('$name','$description','$file_name') "; 

                    $run = mysqli_query($conn,$query);

                    if(!$run)
                    {
                      echo "eror" . mysqli_error($conn);
                    }
                    else
                    {
                      echo "submited";
                    }
                  $category = $_POST['category'];
                }


                  ?>
             <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">CATEGORY</h4>
                
                   <form class="forms-sample" method="post"  enctype="multipart/form-data"> 
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="name" >
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="description"></textarea>
                    </div>
                  
                     <div class="form-group">
                      
                      <div class="input-group col-xs-12">      
                          <!-- <label for="myfile">Select an Image :</label> -->
                          <input  class="form-control" type="file" id="myfile" name="image">
                        <span class="input-group-append">
                          
                        </span>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputUsername1">parent category</label>
                
                      
                        <select class="form-control" name="category" id="cars">
                              <option id=1 value="Fantasy">Fantasy</option>
                              <option id=2 value="Sci-Fi">Sci-Fi</option>
                              <option id=3 value="Mystery">Mystery</option>
                              <option id=4 value="Thriller">Thriller</option>
                              <option id=5 value="Romance">Romance</option>
                              <option id=6 value="Westerns">Westerns </option>
                              <option id=7 value="Motivational">Motivational</option>
                        </select>
                     
                      </div> 
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>




  
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
     
        <!-- partial -->
      </div>
         <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
          </div>
        </footer>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
