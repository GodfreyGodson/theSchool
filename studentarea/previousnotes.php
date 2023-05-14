<?php 
session_start(); // Start the PHP session
include ('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Online Quiz System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                if(@$_GET['q']==2) 
                {
                    echo '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                    <tr><td><center><b>Course Title</b></center></td><td><center><b>Action</b></center></td></tr>';

                    // Make AJAX request to get the courses
                    echo '<script>
                    $.ajax({
                        url: "http://localhost:3000/api/courses",
                        type: "GET",
                        headers: {
                            Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("user")).token
                        },
                        
                        success: function(response) {
                            var courses = response;
                    
                            // Loop through the courses and append to table
                            courses.forEach(function(course) {
                                var courseTitle = course.title;
                                var courseId = course._id;
                                var downloadLink = "<a href=\"#\" class=\"btn sub1\" data-course-id=\"" + courseId + "\" style=\"color:black;margin:0px;background:#1de9b6\"><span class=\"glyphicon glyphicon-download-alt\" aria-hidden=\"true\"></span>&nbsp;<span class=\"title1\"><b>Download</b></span></a>";
                    
                                var row = "<tr><td><center>" + courseTitle + "</center></td><td><center><b>" + downloadLink + "</b></center></td></tr>";
                                $("table").append(row);
                            });
                    
                            // Declare courseId variable
                            var courseId;
                            $(".sub1").click(function(e){
                                e.preventDefault(); // Prevent default form submission
                                courseId = $(this).data("course-id");
                                console.log("courseId:", courseId); // Log courseId to console
                                console.log(JSON.parse(sessionStorage.getItem("user")));
                               console.log(JSON.parse(sessionStorage.getItem("user")).token);
                               // Make AJAX request to download the notes for the selected course
$.ajax({
  url: "http://localhost:3000/api/courses/" + courseId + "/notes",
  type: "GET",
  headers: {
    Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("user")).token
  },
  success: function(response) {
    if (response.enrollments) {
      var enrollment = response.enrollments.find(function(enrollment) {
        return enrollment.student.email === JSON.parse(sessionStorage.getItem("user")).email;
      });

      if (enrollment && enrollment.isPaid) {
        // Download the notes
        $.ajax({
          url: "http://localhost:3000/api/courses/" + courseId + "/notes/download",
          type: "GET",
          headers: {
            Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("user")).token
          },
          success: function(response) {
            // Handle the file download
            var link = document.createElement("a");
            link.download = "notes.pdf";
            link.href = "data:application/pdf;base64," + response.data;
            link.click();
          },
          error: function(xhr) {
            console.log(xhr);
            alert("Error downloading notes");
          }
        });
      } else {
        alert("Please pay for this course");
      }
    } else {
      alert("Error retrieving course information");
    }
  },


});

                                
                            });
  
                        }
                    });
                </script>';

                echo '</table></div></div>';

                      
            }
            ?>
        </div>
    </div>
</div>
</body>