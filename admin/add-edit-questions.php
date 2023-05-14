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
  <h4 class="mt-4">Questions</h4>
  <ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Dashboard</li>
  <li class="breadcrumb-item active">Add Questions</li>
 </ol>
  
 <div class="row">
    <div class="col-md-12">
     <div class="card">
            <div class="card-header">
               <h4>Add Questions Inside (category Quize)</h4>
            </div>

        <div class="card-body">

        <div class="row">

            <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add New Questions </strong>
                             </div>
                            <div class="card-body card-block">
                                <div class=" form-group">
                                    <label for="company" class=" form-control-label">Add Question</label>
                                    <input type="text" id="company" placeholder="Add Question" class="form-control">
                                </div>
                                    <div class=" form-group">
                                        <label for="vat" class=" form-control-label">Add Opt1</label>
                                        <input type="text" id="vat" placeholder="Add Opt1" class="form-control">
                                    </div>

                                    <div class=" form-group">
                                        <label for="vat" class=" form-control-label">Add Opt2</label>
                                        <input type="text" id="vat" placeholder="Add Opt2" class="form-control">
                                    </div>

                                    <div class=" form-group">
                                        <label for="vat" class=" form-control-label">Add Opt3</label>
                                        <input type="text" id="vat" placeholder="Add Opt3" class="form-control">
                                    </div>

                                    <div class=" form-group">
                                        <label for="vat" class=" form-control-label">Add Opt4</label>
                                        <input type="text" id="vat" placeholder="Add Opt4" class="form-control">
                                    </div>


                                    <div class="col-md-12 mb-3 form-group">
                                        <label for="vat" class=" form-control-label">Add Answer</label>
                                        <input type="text" id="vat" placeholder="Add Answer" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                     <button type="submit" name="add_quize" class="btn btn-primary ">Add Question</button>
                                     </div>
                                     
                                    </div>
                        </div>
            </div>






            
            <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add New Questions with Image </strong>
                             </div>
                            <div class="card-body card-block">
                                <div class=" form-group">
                                    <label for="company" class=" form-control-label">Add Question</label>
                                    <input type="text" id="company" placeholder="Add Question" class="form-control">
                                </div>
                                    <div class=" form-group">
                                        <label for="vat" class=" form-control-label">Add Opt1</label>
                                        <input type="file"  name="fopt1" class="form-control">
                                    </div>

                                    <div class=" form-group">
                                        <label for="vat" class=" form-control-label">Add Opt2</label>
                                        <input type="file"  name="fopt2" class="form-control">
                                    </div>

                                    <div class=" form-group">
                                        <label for="vat" class=" form-control-label">Add Opt3</label>
                                        <input type="file"  name="fopt3" class="form-control">
                                    </div>

                                    <div class=" form-group">
                                        <label for="vat" class=" form-control-label">Add Opt4</label>
                                        <input type="file"  name="fopt4" class="form-control">
                                    </div>


                                    <div class="col-md-12 mb-3 form-group">
                                        <label for="vat" class=" form-control-label">Add Answer</label>
                                        <input type="file"  name="fans" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                     <button type="submit" name="add_quize" class="btn btn-primary ">Add Question</button>
                                     </div>
                                     
                                    </div>
                        </div>
            </div>

        </div>







        




            



            </div>

            </div>
        </div>
     </div>



    <div class="row">
    <div class="col-md-12">
     <div class="card">
            <div class="card-header">
               <h4>View Questions & Options Inside (category Quize)</h4>
            </div>

     </div>

        <div class="card-body">

        <table class="table table-bordered">
            <thead>
            <tr>
            <th>No</th>
            <th>Questions</th>
            <th>Opt1</th>
            <th>Opt2</th>
            <th>Opt3</th>
            <th>Opt4</th>
            <th>edit</th>
            <th>delete</th>
           </tr>
            </thead>


            <tbody>
                <td>1</td>
                <td>5+7 = ?</td>
                <td>9</td>
                <td>12</td>
                <td>8</td>
                <td>13</td>
                <td><a href="" class="btn btn-success">Edit</a></td>
                <td><form action="">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </form></td>
                
            </tbody>
          
        </table>

        </div>

    </div>
    </div>
    </div>
  



<?php

include('includes/footer.php');
include('includes/scripts.php');
?>