<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Dashtreme Admin - Free Dashboard for Bootstrap 4 by Codervent</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
   <!--font vie style-->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>

<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   
<!---side bar---->
   <?php include 'sidebar.php' ?>


<!--side bar---->

<?php include 'header.php' ?>

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row mt-3">
         <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
              <div class="card-title">Form</div>
                      <hr>
                      <form action="index_insert.php" method="post">
                        <div class="form-group">
                          <label for="start_date">Start Date</label>
                          <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter Start Date">
                        </div>
                        <div class="form-group">
                          <label for="end_date">End Date</label>
                          <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter End Date">
                        </div>
                        <div class="form-group">
                          <label for="content">Content</label>
                          <input type="text" class="form-control" id="content" name="content" placeholder="Enter Content">
                        </div>
                        <div>
                          <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                        </div>
                      </form><br><br>
                      <div class="table-responsive">
                      <table class="table">
                         <thead>
                            <tr>
                              <th scope="col">S.No</th>
                              <th scope="col">Start Date</th>
                              <th scope="col">End Date</th>
                              <th scope="col">Content</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php
                              include"../hospital.php";
                              $link=opencon();
                              $qr="SELECT * FROM alerts"; 
                              $qr_exe=mysqli_query($link,$qr);
                              if (!$qr_exe) {
                                // Output error message if the query fails
                                die("Error in SQL query: " . mysqli_error($link));
                              }
                              $i=1;
                              // Loop through the results
                              while ($fetch_qr = mysqli_fetch_array($qr_exe)) {
                              ?>
                              <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $fetch_qr['start_date'];?></td>
                              <td><?php echo $fetch_qr['end_date'];?></td>
                              <td><?php echo $fetch_qr['content'];?></td>
                              <td><a href="indexdelete.php?content=<?php echo urlencode( $fetch_qr['content']); ?>"onclick="return confirm('Are you sure you want to delete this record?');"><span class="material-symbols-outlined">delete</span></a></td>
                              </tr>
                              <?php
                              }
                              ?>
                          </tbody>
                          </form>
                        </table>
                  </div>
              <div>
              </div>
            </div>
          </div>
       </div>
</div>
</div>
    
	  
	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<?php include'footer.php' ?>
	<!--End footer-->
	
  <!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="assets/js/jquery.loading-indicator.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
 
  <!-- Index js -->
  <script src="assets/js/index.js"></script>

  
</body>
</html>
