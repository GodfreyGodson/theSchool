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
                if(@$_GET['q']==1) 
                {
                    echo '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
                    <tr><td><center><b>Quize Title</b></center></td><td><center><b>Scored</b></center></td></tr>';

                    // Make AJAX request to get the exam categories
                    echo '<script>
                    $.ajax({
                        url: "http://api.theschool.ac.tz/api/exam",
                        type: "GET",
                        success: function(response) {
                            var examCategories = response.examCategories;
                    
                            // Loop through the exam categories and append to table
                            examCategories.forEach(function(examCategory) {
                                examCategory.data.forEach(function(data) {
                                    var examTitle = data.examCategory;
                                    var examCategoryValue = examCategory.value;
                                    var checkLink = "<a href=\"#\" class=\"btn sub1\" data-exam-category=\"" + examTitle + "\" style=\"color:black;margin:0px;background:#1de9b6\"><span class=\"glyphicon glyphicon-new-window\" aria-hidden=\"true\"></span>&nbsp;<span class=\"title1\"><b>Check</b></span></a>";
                    
                                    var row = "<tr><td><center>" + examTitle + "</center></td><td><center><b>" + checkLink + "</b></center></td></tr>";
                                    $("table").append(row);
                                });
                            });
                    
                            // Declare examCategory variable
                            var examCategory;
                            $(".sub1").click(function(e){
                                e.preventDefault(); // Prevent default form submission
                                examCategory = $(this).data("exam-category");
                                console.log("examCategory:", examCategory); // Log examCategory to console
                    
                                // Make AJAX request to get the results for the selected exam category
                                $.ajax({
                                    url: "http://api.theschool.ac.tz/api/results/" + examCategory,
                                    type: "GET",
                                    success: function(response) {
                                        console.log(response);
                                        // Save the results data in a session variable
                                        sessionStorage.setItem("results", JSON.stringify(response));
                                        console.log(JSON.parse(sessionStorage.getItem("results")));
                                        // Redirect to the showresult.php page
                                        window.location.href = "showresult.php";
                                    },
                                    error: function() {
                                            alert("Failed to get results for exam category " + examCategory);
                                        }
                                    });
                                    // Save session data
                                    //session_write_close();
                                });
                                
                                
                                
                            }
                        });
                    </script>';

                    echo '</table></div></div>';

            
                }
                ?>
            </div>
       
