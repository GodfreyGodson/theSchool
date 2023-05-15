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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

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
    let courseId;

    $.ajax({
      url: "http://api.theschool.ac.tz/api/courses",
      type: "GET",
      headers: {
        Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("user")).token,
      },
      success: function (response) {
        var courses = response;
  
        // Loop through the courses and append to table
        courses.forEach(function (course) {
          var courseTitle = course.title;
          courseId = course._id;
          var downloadLink = `<a href="#" class="btn sub1" data-course-id="${courseId}" style="color:black;margin:0px;background:#1de9b6"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Download</b></span></a>`;
  
          var row = `<tr><td><center>${courseTitle}</center></td><td><center><b>${downloadLink}</b></center></td></tr>`;
          $("table").append(row);
        });
  
        $(".sub1").click(function (e) {
          e.preventDefault(); // Prevent default form submission
          courseId = $(this).data("course-id");
          console.log("courseId:", courseId); // Log courseId to console
          console.log(JSON.parse(sessionStorage.getItem("user")));
          console.log(JSON.parse(sessionStorage.getItem("user")).token);
  
          downloadNotes();
        });
      },
    });
  
    function downloadNotes() {
      const token = JSON.parse(sessionStorage.getItem("user")).token; // replace with your actual auth token
      const headers = new Headers();
      headers.append("Authorization", `Bearer ${token}`);
      const request = new Request(`http://api.theschool.ac.tz/api/courses/${courseId}/notes`, {
        headers: headers,
      });
      fetch(request)
        .then((response) => {
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }
          response.blob().then((blob) => {
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.style.display = "none";
            a.href = url;
            a.download = "notes.pdf";
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
          });
        })
        .catch((error) => {
          console.error(error);
          alert("Error downloading notes");
        });
    }
</script>';

echo '</table></div></div>';
}
?>

        </div>
    </div>
</div>


</body>
