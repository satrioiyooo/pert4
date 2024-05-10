<?php
session_start();
// Periksa apakah pengguna sudah login
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    // Jika tidak, arahkan pengguna kembali ke halaman login
    header("Location: index.php");
    exit;
}
// Proses logout jika tombol Logout diklik
if (isset($_POST['logout'])) {
  // Hapus sesi atau token yang menandakan pengguna sudah login
  session_unset();
  session_destroy();
  // Redirect ke halaman login atau halaman lain yang sesuai
  header("Location: index.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Main</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet" />
        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

      <!-- Main css -->
      <link rel="stylesheet" href="css/style.css">



  </head>

  <body>


    <!-- ======= Why Us Section ======= -->
    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 video-box">
            <img src="images/images.png" class="img-fluid" alt="" style="width: 1000px; height: auto;"/>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title">
                <a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
            <form method="POST" class="register-form" id="register-form">
            <div class="form-group form-button">
              <input type="submit" name="logout" id="logout" class="form-submit" value="Log out"/>
            </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Features Section ======= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
