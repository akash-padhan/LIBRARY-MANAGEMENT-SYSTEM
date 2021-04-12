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


          <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Author</th>
              <th scope="col">Relese</th>
              <th scope="col">Category</th>
            </tr>
          </thead>
          <tbody>
            
      <?php

          include "connection.php";


          $selectQuery = " SELECT * FROM books ";

          $query = mysqli_query($conn,$selectQuery);

          if(!$query)
          {
            echo "err" . mysqli_error($conn);
          }

          $nums = mysqli_num_rows($query);


          $res = mysqli_fetch_array($nums);


          while ($res = mysqli_fetch_array($query)) 
          {
  
      ?>
            <tr>

              <td><?php echo $res['name']; ?></td>
              <td><?php echo $res['description']; ?></td>

              <td>
                <img src="booksimage/<?php echo $res['image']; ?> " width="100" height="100">
              </td>

              <td><?php echo $res['author']; ?></td>
              <td><?php echo $res['relese']; ?></td>
              <td><?php echo $res['category']; ?></td>     
              
            </tr>

     <?php } ?> 

          </tbody>
        </table>

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
