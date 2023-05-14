<?php
  session_start();
  // Check if the user is logged in and of type "Admin"
  if (!isset($_SESSION['user']) || $_SESSION['user']['userType'] !== "Admin") {
    // Redirect to the login page if the user is not logged in or not of type "Admin"
    header("Location: ../login.php");
    exit(0);
  }
include('includes/header.php');
?>

<div class="container-fluid px-4">
  <h4 class="mt-4">Quizes Questions</h4>
  <ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Dashboard</li>
  <li class="breadcrumb-item active">select Quizes Categories to add questions</li>
 </ol>
  
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Add Questions</h4>
            </div>

            <div class="card-body">

            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Quize Name</th>
                                            <th scope="col">Quize Time</th>
                                            <th scope="col">Select</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Physics</td>
                                            <td>30</td>
                                            <td>  
                                        <form action="">
                                            <a href="add-edit-questions.php" class="">select</a>
                          
                                      </form></td>
                                        </tr>
                                          
                                    </tbody>
                     </table>



            </div>

            </div>
        </div>
    </div>
</div>



<?php

include('includes/footer.php');
include('includes/scripts.php');
?>