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
    <link  rel="stylesheet" href="css/bootstrap.min.css"/>
    <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
    <link rel="stylesheet" href="css/welcome.css">
    <link  rel="stylesheet" href="css/font.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"  type="text/javascript"></script>
</head>
<body>

    <div class="white-container">
        <div class="quiz-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="table-responsive">
                                <table class="table table-striped title1" id="resultsTable">
                                    <thead>
                                        <tr>
                                            <th><center>Quiz Type</center></th>
                                            <th><center>Scored Marks</center></th>
                                            <th><center>Total Questions</center></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Retrieve session data
        var sessionData = sessionStorage.getItem("results");
        if (sessionData) {
            var results = JSON.parse(sessionData);

            // Extract values
            var totalQuestions = results.totalQuestions;
            var totalMarks = results.totalMarks;
            var exam = results.results[0].exam;

            // Update table row
            var tableRow = "<tr><td><center>" + exam + "</center></td><td><center>" + totalMarks + "</center></td><td><center>" + totalQuestions + "</center></td></tr>";
            $("#resultsTable tbody").append(tableRow);
        }
    </script>

</body>
</html>
