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
  <h4 class="mt-4">Courses</h4>
  <ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active">Dashboard</li>
  <li class="breadcrumb-item active">courses</li>
 </ol>
  
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
               <h4>Register Course
               <a href="view-course.php" class="btn btn-danger float-end ">Back</a>
               </h4>
            </div>

            <div class="card-body">
             <form id="course-form" action="" method="post">

             <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control">
                </div>

                <div class="col-md-6 mb-3 form-outline" style="width: 22rem;">
                
                <label class="form-label" for="form1">Price Course</label>
                <i class="fas fa-dollar-sign trailing"></i>
                <input type="number" name="price" id="form1" class="form-control form-icon-trailing" />
               
                </div>
                <div class="col-md-6 mb-3">
                <label for="formFileMultiple" class="form-label">Add CourseNotes & Image</label>
                <input class="form-control" name="files" type="file" id="formFileMultiple" multiple />
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" name="add_course" class="btn btn-primary">Register Course</button>
                </div>
             </div>


             </form>




            </div>

            </div>
        </div>
    </div>
</div>

<script>
const form = document.querySelector('#course-form');
form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new FormData(form);
  try {
    const response = await fetch('http://localhost:3000/api/courses', {
      method: 'POST',
      body: formData
    });
    const data = await response.json();
    console.log(data);
      // Redirect to the showresult.php page
      window.location.href = "view-course.php";
  } catch (error) {
    console.error(error);
  }
});
</script>

<?php

include('includes/footer.php');
//include('includes/scripts.php');
?>
