<?php 
  include('config/constants.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Student Job</title>

  <!-- Favicons -->
  <link href="images/logoo.png" rel="icon">
  <link href="images/logoo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js">
  </script>
  <style type="text/css">
    .select {
      display: none;
    }

    /*-------
annonce
-----*/
    .toggle-text {
      display: none;
    }

    .toggle-text-button {
      color: #EB7B68;
    }
  </style>


</head>

<body>
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">info@Studentjob.tn</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+216 99 123 456</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i>@StudentJobTN</a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i>Student Job TN</a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i>StudentJobTN</a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.php">Tunisian Student Job</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <?php
          if(isset($_SESSION['user'])){
            echo '          
            <li><a href="announce.php">Announcements</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="" data-bs-toggle="modal" data-bs-target="#logoutModal">Log out</a></li>
            ';
          }else{
            echo '
              <li><a href="signup.php">Sign up</a></li>
              <li><a href="signin.php">Sign in</a></li>
            ';
          }
          ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    <!-- logoutModal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to log out?        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick='window.open("logout.php","_self")'>Yes</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>