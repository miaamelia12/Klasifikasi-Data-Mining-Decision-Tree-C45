<?php
session_start();
if($_SESSION){
    if($_SESSION['level']=="Administrator")
    {
        header("Location: admin");
    }
    
    if($_SESSION['level']=="Mahasiswa")
    {
        header("Location: mahasiswa");
    }
}
include('login.php'); 
?>

<!doctype html>
<html class="no-js" lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  </head>

  <body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
          <a href="./" class="navbar-brand" ></a>
            <div class="login-box ptb--100">
              <form class="row-border" name="form1"  action="" method="post">
                <div class="login-form-head">
                  <h4>Sign In</h4>
                </div>
                <div class="login-form-body">
                  <div class="form-gp">
                    <label>Username <span class="required">*</span></label>   
                    <i class="ti-user"></i>
                    <input name="username" type="text" class="required form-control" required>
                    <div class="text-danger"></div>
                  </div>
                  <div class="form-gp">
                    <label>Password <span class="required">*</span></label>
                    <i class="ti-lock"></i>
                    <input name="password" type="password" class="form-control" required>
                    <div class="text-danger"></div>
                  </div>
                  <div class="submit-btn-area">
                    <button id="form_submit" name="submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                  </div>
                  <!-- <div class="form-footer text-center mt-5">
                    <p class="text-muted">Don't have an account? <a href="regist.php">Sign up</a></p>
                  </div> -->
                </div>
              </form>
            </div>
       </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
  </body>

</html>