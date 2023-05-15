<?php
session_start(); // Start the PHP session
include ('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    
    <script>
        const user = sessionStorage.getItem("user");
        if (!user) {
            window.location.href = "../login.php";
        }
        // else, user is authenticated
    </script>
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                    if(@$_GET['q']==0) {
                        // Clear the selected exam session variable if it is undefined
                        if (!isset($_SESSION['selected_exam'])) {
                            $_SESSION['selected_exam'] = null;
                        }

                        echo '
                        <div class="row">
                            <span class="title1" style="margin-left:40%;font-size:30px;color:#fff;"><b>Select Quiz</b></span><br /><br />
                            <div class="col-md-3"></div>
                            <div class="col-md-6">   
                            <div class="col-md-6">';
                            // Make an AJAX request to the endpoint to get the list of exam categories
                            $url = 'http://api.theschool.ac.tz/api/exam';
                            $response = file_get_contents($url);
                            $response_array = json_decode($response, true);
                            echo '<form class="form-horizontal title1" name="form" action="" method="POST" onsubmit="updateSessionVariable()">
                              <fieldset>';
                                // Loop through the exam categories and generate input fields
                                foreach ($response_array['examCategories'] as $category) {
                                    $exam_category = $category['examCategory'];
                                    echo '
                                    <div class="form-group">
                                        <label class="col-md-12 control-label" for="name"></label>  
                                        <div class="col-md-12">
                                            <center>
                                                <div style="width: 200%;">
                                                    <input name="exam" value="' . $exam_category . '" class="form-control input-md" type="submit" style="width: 100%;" onclick="updateSessionVariable(\'' . $exam_category . '\')">
                                                </div>
                                            </center>
                                        </div>
                                    </div>';
                                }
                                
                                echo '</fieldset>
                            </form>
                          </div>
                          
                        </div>
                        </div>';
                    } else {
                        echo '<div class="quiz-header"><h2><b>' . $_SESSION['selected_exam'] . ' Quiz</b></span><br /><br /></h2></div>';
                    } ?>
                </div>
            </div>
        </div>
    
        <script src="js/jquery.js" type="text/javascript"></script>
        <script>
  function updateSessionVariable(title) {
    if (title) {
        console.log("Title: " + title);

        $.ajax({
            url: "update_session.php?selected_exam=" + title,
            success: function(data) {
                console.log("Session variable updated");
            }
        });
    }
}


  $(document).ready(function() {
    $("form").submit(function(event) {
      event.preventDefault(); // Prevent the form from submitting normally

      var title = $(this).find(":focus").val();
      console.log("Title from input field: " + title);

      $.ajax({
        url: "quiz.php?title=" + title,
        success: function(data) {
          $(".container").html(data);
        }
      });
    });
  });
</script>





    </body>
</html>
