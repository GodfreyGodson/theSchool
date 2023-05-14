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
  <h4 class="mt-4">Quizes</h4>
  <ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Dashboard</li>
  <li class="breadcrumb-item active"> Quizes</li>
 </ol>
  
 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
               <h4>Add Quizes     </h4>
            </div>

    <div class="card-body">

            <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Quize <a href="view-quize.php" class="btn btn-danger float-end ">Back</a></strong>
                             </div>
                            <div class="card-body card-block">
                                <div class="col-md-6 mb-3 form-group">
                                    <label for="company" class=" form-control-label">New Quize Category</label>
                                    <input type="text" id="company" placeholder="Enter quize category" class="form-control">
                                </div>
                                    <div class="col-md-6 mb-3 form-group">
                                        <label for="vat" class=" form-control-label">Exam Time in Minutes</label>
                                        <input type="text" id="vat" placeholder="Enter Exam Time" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                     <button type="submit" name="add_quize" class="btn btn-primary ">Add Quize</button>
                                     </div>
                                     
                                    </div>
                                    </div>
            </div>



            


            </div>

           
        </div>
    </div>


    
</div>



<?php

include('includes/footer.php');
include('includes/scripts.php');
?>