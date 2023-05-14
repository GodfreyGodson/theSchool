<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <!-- Site Title-->
    <title>theSchool | Online e-Learing Platform</title>
    <!--Remove below this code before responsive layouts for WordPress theme conversion-->
    <meta name="desc ription" content="">
    <meta name="keywords" content="">
    <!-- Responsive layout supports-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png"> -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png"> -->
    <link rel="manifest" href="assets/images/favicons/site.webmanifest">
    <!-- Animate CSS-->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Aos CSS-->
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- SlickNav ( Mobile Menu ) CSS-->
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <!-- Modal Video CSS-->
    <link rel="stylesheet" href="assets/css/modal.video.min.css">
    <!-- Normalize CSS-->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <!-- Owl Carousel CSS-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <!-- Owl Carousel Theme Default CSS-->
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- Scroller CSS-->
    <link rel="stylesheet" href="assets/css/scroller.css">
    <!-- Selectizer CSS-->
    <link rel="stylesheet" href="assets/css/selectize.default.css">
    <!-- Chart CSS-->
    <link rel="stylesheet" href="assets/css/Chart.min.css">
    <!-- FlexSlider CSS-->
    <link rel="stylesheet" href="assets/css/flexslider.css">
    <!-- Calendar CSS-->
    <link rel="stylesheet" href="assets/css/fullcalendar.min.css">
    <!-- Style ( Main Stylesheet ) CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive ( Cross Plateform Capability ) CSS-->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body id="home">

  <!-- start of theSchool to-header -->
   <?php
  include 'header/top-header.php';
    ?>
<!-- End of theSchool top-header -->

<!-- Start of theSchool Navbar -->
<?php
include 'header/navbar.php';
 ?>

<!-- End of theSchool Navbar -->









<!--subscribe area start-->
<div class="educa-subscribe-area-start space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="educa-subscribe-content text-center">
                    <h2>ENROLL NOW</h2>
                    <p>Enroll now and gain access to download notes, popular summary and more from us. Please enter your email address and follow the instructions to make the payment. Please ensure that you have already registered with us before enrolling. If you haven't registered yet, please click here to register.</p>
                    <form action="#" method="POST">
                        <input type="text" name="email" id="emails" placeholder="Email">
                        <button type="submit" class="sub-btn">ENROLL <i class="fal fa-envelope"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--subscribe area end-->

<!-- End of theSchool Subscribe area -->

<!-- start of theSchool bottom footer area -->
<?php
 include 'footer/footer-bottom.php';
 ?>
<!-- End of theSchool Bottom footer Area -->


<a href="#home" class="nav-link js-scroll-trigger btm-to-top"><i class="fal fa-long-arrow-up"></i></a>


<script>
const form = document.querySelector('form');
form.addEventListener('submit', (event) => {
  event.preventDefault();
  const email = document.getElementById('emails').value;
  const selectedCourse = sessionStorage.getItem('selectedCourse');
  if (!email || !selectedCourse) {
    alert('Please enter email and select a course');
    return;
  }
  console.log(selectedCourse); // console log the selectedCourse variable
  const data = { email, course: selectedCourse }; // modified object with "course" instead of "selectedCourse"
  fetch('http://localhost:3000/api/student', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data) // send the updated object in the body
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    alert('Enrollment successful!');
    window.location.href = 'payment.php';
  })
  .catch(error => {
    console.error(error);
    alert('Enrollment failed');
  });
});



</script>
<!-- Modernizr ( Cross-Browser Capability ) JS-->
<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
<!-- Moment JS-->
<script src="assets/js/moment.min.js"></script>
<!-- jQuery ( Dependency ) JS-->
<script src="assets/js/jquery.min.js"></script>
<!--AOS JS-->
<script src="assets/js/vendor/aos.min.js"></script>
<!-- Bootstrap JS-->
<script src="assets/js/vendor/bootstrap.min.js"></script>
<!--Waypoints JS-->
<script src="assets/js/vendor/waypoints.min.js"></script>
<!--Counter-UP JS-->
<script src="assets/js/vendor/counterup.min.js"></script>
<!--Owl Carousel JS-->
<script src="assets/js/vendor/owl.carousle.min.js"></script>
<!--Easing JS-->
<script src="assets/js/vendor/easing.min.js"></script>
<!--Scrolling Nav JS-->
<script src="assets/js/vendor/scrolling.nav.min.js"></script>
<!--Iscroll JS-->
<script src="assets/js/vendor/iscroll.min.js"></script>
<!--Slicknav JS-->
<script src="assets/js/vendor/jquery.slicknav.min.js"></script>
<!--Parallax JS-->
<script src="assets/js/vendor/parallax.min.js"></script>
<!--Modal Video JS-->
<script src="assets/js/vendor/modal.video.min.js"></script>
<!--Vanilla Tilt JS-->
<script src="assets/js/vendor/vanillatilt.min.js"></script>
<!--Newsscoller JS-->
<script src="assets/js/scroller.js"></script>
<!--Selectize JS-->
<script src="assets/js/selectize.min.js"></script>
<!--Chart JS-->
<script src="assets/js/Chart.min.js"></script>
<!--FlexSlider JS-->
<script src="assets/js/jquery.flexslider-min.js"></script>
<!--Calendar JS-->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/fullcalendar.js"></script>
<!--Canvas js-->
<script src="assets/js/jquery.canvasjs.min.js"></script>
<!--Canvas js-->
<script src="assets/js/vendor/countdown-timer.js"></script>
<!-- Main JS-->
<script src="assets/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')

</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
