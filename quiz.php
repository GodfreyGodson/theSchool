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
                    <h1>Quiz</h1>
                    <p><a href="index.html">Home</a>/ <span>Quiz</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Breadcrubm area end-->

<!-- Quiz area start -->
<section class="educa-quiz-area-start space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="educa-quiz-filters">

<form action="localhost:3000/api/exam/filter-categories" method="GET">
 <?php
                     // Initialize cURL
$ch = curl_init();

// Set the endpoint URL
curl_setopt($ch, CURLOPT_URL, "localhost:3000/api/ecategories");

// Return the response as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute the request and retrieve the response
$response = curl_exec($ch);


// Close the cURL handle
curl_close($ch);


// Decode JSON response
$categories = json_decode($response);

// Decode the JSON response
//$data = json_decode($response, true);

echo'<div class="form-group">';
  echo ' <label for="category">Category</label>';
  echo ' <select name="category" id="category" class="form-control">';
  foreach ($categories as $category) {
  echo '<option value="' . $category->_id . '">' . $category->categoryName . '</option>';
           }
    echo '</select>';
 echo'</div>';

  ?>
                    
 <?php
                     // Initialize cURL
$ch = curl_init();

// Set the endpoint URL
curl_setopt($ch, CURLOPT_URL, "localhost:3000/api/levels");

// Return the response as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Execute the request and retrieve the response
$response = curl_exec($ch);


// Close the cURL handle
curl_close($ch);


// Decode JSON response
$levels = json_decode($response);
// var_dump($levels);

// Decode the JSON response
//$data = json_decode($response, true);

echo'<div class="form-group">';
  echo '<label for="level">Level</label>';
  echo '<select name="level" id="level" class="form-control">';
  foreach ($levels as $level) {
  echo '<option value="' . $level->_id . '">' . $level->levelName . '</option>';
           }
    echo '</select>';
 echo'</div>';

  ?>
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

            <!-- <div class="col-md-4 col-lg-3">
                <div class="educa-single-quiz-context">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl0vz9TTdqDma3ySo4ylHcVlQstSOanX5Gew&usqp=CAU" alt="Quiz">
                    <a href="quiz-single.php">English Language</a>
                    <p class="educa-quiz-context">
                        <span><i class="fal fa-book"></i> 10 Questions</span>
                        <span><i class="fal fa-user"></i> 100 Students</span>
                    </p>
                    <span class="educa-price">1000</span>
                </div>
            </div> -->
            <div class="d-flex flex-wrap">
    <?php

    // Initialize cURL
    $ch = curl_init();

    // Get the current page number from the query string, or set to 1 if not specified
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Set the endpoint URL with the current page number
    curl_setopt($ch, CURLOPT_URL, "http://localhost:3000/api/exam?page=$page");

    // Return the response as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Execute the request and retrieve the response
    $response = curl_exec($ch);

    // Close the cURL handle
    curl_close($ch);

    // Decode the JSON response
    $data = json_decode($response, true);

    // var_dump($data);

    // Check if the 'examCategories' index exists in the $data array
    if (isset($data['examCategories'])) {
        // Set the limit of exam categories per page
        $limit = 6;

        // Calculate the total number of pages based on the total number of exam categories and the limit per page
        $totalPages = ceil(count($data['examCategories']) / $limit);

        // Calculate the offset of exam categories based on the current page number and the limit per page
        $offset = ($page - 1) * $limit;

        // Get the exam categories for the current page
        $examCategories = array_slice($data['examCategories'], $offset, $limit);

        // Loop through the exam categories for the current page and display them
        foreach ($examCategories as $key => $category) {
            echo '<div class="educa-single-quiz-context mx-3 my-3">';
            echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhwZRqMzhxT0MmLav67bsszmy7S445Za0UVg&usqp=CAU" alt="Quiz">';
            echo '<a href="quiz-single.php">' . $category['examCategory'] . '</a>';
            echo '<p class="educa-quiz-context">';
            echo '<span><i class="fal fa-book"></i> 10 Questions</span>';
            echo '<span><i class="fal fa-user"></i> 100 Students</span>';
            echo '</p>';
            echo '<span class="educa-price">1500</span>';
            echo '</div>';
        }

        // Generate pagination links based on total number of pages
        if ($totalPages > 1) {
            echo '<div class="col-md-12">';
            echo '<div class="educa-pagination-area-start">';
            echo '<ul class="educa-paginate">';
            for ($i = 1; $i <= $totalPages; $i++) {
                $activeClass = ($i == $page) ? 'active' : '';
                echo "<li class='$activeClass'><a href='?page=$i'>$i</a></li>";
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'No exam categories found.';
    }
    ?>
</div>










<!-- 
            <div class="col-md-4 col-lg-3">
                <div class="educa-single-quiz-context">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5GRH1puetL991-1G1GL0VBbYH1AsbF51VNg&usqp=CAU" alt="Quiz">
                    <a href="quiz-single.php">Chemistry</a>
                    <p class="educa-quiz-context">
                        <span><i class="fal fa-book"></i> 10 Questions</span>
                        <span><i class="fal fa-user"></i> 100 Students</span>
                    </p>
                    <span class="educa-price">2000</span>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="educa-single-quiz-context">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJSdHD9UmZSF8ukSbqMUP9qthBFh1idQM61w&usqp=CAU" alt="Quiz">
                    <a href="quiz-single.php">Practical</a>
                    <p class="educa-quiz-context">
                        <span><i class="fal fa-book"></i> 10 Questions</span>
                        <span><i class="fal fa-user"></i> 100 Students</span>
                    </p>
                    <span class="educa-price">2500</span>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="educa-single-quiz-context">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyB9KccGkn-fUkkSmZKQMlpcZU7KcET-Ew6g&usqp=CAU" alt="Quiz">
                    <a href="quiz-single.php">Literature Analysis</a>
                    <p class="educa-quiz-context">
                        <span><i class="fal fa-book"></i> 10 Questions</span>
                        <span><i class="fal fa-user"></i> 100 Students</span>
                    </p>
                    <span class="educa-price">2000</span>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="educa-single-quiz-context">
                    <img src="https://www.exploringnature.org/graphics/header_classification.jpg" alt="Quiz">
                    <a href="quiz-single.php">Classification</a>
                    <p class="educa-quiz-context">
                        <span><i class="fal fa-book"></i> 10 Questions</span>
                        <span><i class="fal fa-user"></i> 100 Students</span>
                    </p>
                    <span class="educa-price">1000</span>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="educa-single-quiz-context">
                    <img src="https://media.istockphoto.com/photos/erlenmeyer-flasks-beaker-on-bench-laboratory-prepare-for-testing-picture-id1204589504?k=20&m=1204589504&s=612x612&w=0&h=wlY_YKEbtSFmidR4d8NHodBIPdLG60UgxcN4p1diIvc=" alt="Quiz">
                    <a href="quiz-single.php">Volumetric Analysis</a>
                    <p class="educa-quiz-context">
                        <span><i class="fal fa-book"></i> 10 Questions</span>
                        <span><i class="fal fa-user"></i> 100 Students</span>
                    </p>
                    <span class="educa-price">1000</span>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="educa-single-quiz-context">
                    <img src="https://media.istockphoto.com/vectors/electrolysis-of-water-vector-id1271622587?k=20&m=1271622587&s=612x612&w=0&h=CNgTEd8gcPO-e4VRFX4EuZ6Urt_ivUVvRKh4dRuzshg=" alt="Quiz">
                    <a href="quiz-single.php">Electrolysis</a>
                    <p class="educa-quiz-context">
                        <span><i class="fal fa-book"></i> 10 Questions</span>
                        <span><i class="fal fa-user"></i> 100 Students</span>
                    </p>
                    <span class="educa-price">1500</span>
                </div>
            </div> -->

            <!-- <div class="col-md-12">
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
</section>
<!-- Quiz area end -->
<?php
 include 'footer/footer-bottom.php';
 ?>
<!-- End of theSchool Bottom footer Area -->

<a href="#home" class="nav-link js-scroll-trigger btm-to-top"><i class="fal fa-long-arrow-up"></i></a>



<script>
    const filterButton = document.querySelector('.filter-btn');
    filterButton.addEventListener('click', (event) => {
        event.preventDefault();
        const category = document.querySelector('#category').value;
        const level = document.querySelector('#level').value;
        const price = document.querySelector('#price').value;
        const url = `localhost:3000/api/exam/filter-categories?examCategory=${category}&level=${level}&isPaid=${price}`;
        window.location.href = url;
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
