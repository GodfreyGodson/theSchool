<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Site Title-->
    <title>theSchool | Online e-Learing Platform</title>
    <!--Remove below this code before responsive layouts for WordPress theme conversion-->
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Responsive layout supports-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">


    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png"> -->
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


<!--Breadcrubm area start-->
<section class="educa-breadcrumb-area-start space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="educa-breadcrumb-content">
                    <h1>All Courses</h1>
                    <p><a href="index.php">Home</a>/ <span>All Courses</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcrubm area end-->

<!-- Quiz area start -->
<div class="educa-quiz-area-start space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="educa-quiz-filters">
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="0">English Language</option>
                                <option value="1">Chemistry</option>
                                <option value="2">Biology</option>
                                <option value="3">Literature</option>
                                <option value="4">Sexual Health</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control">
                                <option value="0">Form one</option>
                                <option value="1">Form Two</option>
                                <option value="2">Form Three</option>
                                <option value="3">Form Four</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Quiz Price</label>
                            <select name="price" id="price" class="form-control">
                                <option value="0">Paid Quiz</option>
                                <option value="1">Free Quiz</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="filter-btn"><i class="fal fa-filter"></i> Filter</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="row" id="course-list"></div>
<div class="row">
  <div class="col-6">
    <button class="btn btn-primary" id="prev-btn">Previous</button>
  </div>
  <div class="col-6 text-right">
    <button class="btn btn-primary" id="next-btn">Next</button>
  </div>
</div>


<!-- 
            <div class="col-md-12">
                <div class="educa-pagination-area-start">
                    <ul class="educa-paginate">
                        <li><a href="javascript:void(0)"><i class="fal fa-angle-left"></i></a></li>
                        <li><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li class="active"><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">4</a></li>
                        <li><a href="javascript:void(0)">5</a></li>
                        <li><a href="javascript:void(0)">6</a></li>
                        <li><a href="javascript:void(0)"><i class="fal fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div> -->

        </div>
    </div>
</div>
<!-- Quiz area end -->
<!-- start of theSchool bottom footer area -->
<?php
 include 'footer/footer-bottom.php';
 ?>
<!-- End of theSchool Bottom footer Area -->

<a href="#home" class="nav-link js-scroll-trigger btm-to-top"><i class="fal fa-long-arrow-up"></i></a>


<script>
  const courseList = document.getElementById('course-list');
  const prevBtn = document.getElementById('prev-btn');
  const nextBtn = document.getElementById('next-btn');
  let currentPage = 1;
  let totalPages = 0;
  function renderCourses(courses) {
  courseList.innerHTML = '';
  courses.forEach(course => {
    const div = document.createElement('div');
    div.classList.add('col-md-4', 'col-lg-3');
    div.innerHTML = `
      <div class="educa-single-quiz-context">
        <img src="http://localhost:3000/${course.image}" alt="${course.title}">
        <a href="course-details.php">${course.title}</a>
        <p class="educa-quiz-context">
          <span><i class="fal fa-book"></i> Best Seller</span>
          <span><i class="fal fa-user"></i> 100 Students</span>
        </p>
        <span class="educa-price">${course.price}</span>
      </div>
    `;
    const a = div.querySelector('a');
    a.addEventListener('click', () => {
      sessionStorage.setItem('selectedCourse', course.title);
    });
    courseList.appendChild(div);
  });
}

  function renderPaginationLinks() {
    const paginationLinks = document.querySelector('.educa-paginate');
    paginationLinks.innerHTML = '';
    for (let i = 1; i <= totalPages; i++) {
      const li = document.createElement('li');
      if (i === currentPage) {
        li.classList.add('active');
      }
      const a = document.createElement('a');
      a.href = 'javascript:void(0)';
      a.innerText = i;
      li.appendChild(a);
      paginationLinks.appendChild(li);
    }
  }

  function fetchCourses(page) {
    fetch(`http://localhost:3000/api/course?page=${page}&limit=8`)
      .then(response => response.json())
      .then(data => {
        totalPages = data.pages;
        currentPage = data.current;
        renderCourses(data.courses);
        renderPaginationLinks();
        if (currentPage === 1) {
          prevBtn.disabled = true;
        } else {
          prevBtn.disabled = false;
        }
        if (currentPage === totalPages) {
          nextBtn.disabled = true;
        } else {
          nextBtn.disabled = false;
        }
      });
  }

  prevBtn.addEventListener('click', () => fetchCourses(currentPage - 1));
  nextBtn.addEventListener('click', () => {
    currentPage++;
    fetchCourses(currentPage);
  });

  fetchCourses(1);
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
