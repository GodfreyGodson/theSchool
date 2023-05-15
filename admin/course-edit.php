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
               <h4>Edit Course</h4>
            </div>

            <div class="card-body">

            <form id="course-form" action="" method="post">
  <!-- Add a hidden input field to send the "edit_course" data -->
  <input type="hidden" name="_method" value="PUT">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="col-md-6 mb-3">
      <label for="description">Description</label>
      <input type="text" name="description" id="description" class="form-control">
    </div>
    <div class="col-md-6 mb-3 form-outline" style="width: 22rem;">
      <label class="form-label" for="price">Price Course</label>
      <i class="fas fa-dollar-sign trailing"></i>
      <input type="number" name="price" id="price" class="form-control form-icon-trailing" />
    </div>
    <div class="col-md-6 mb-3">
      <label for="formFileMultiple" class="form-label">Add CourseNotes & Image</label>
      <input class="form-control" name="files" type="file" id="formFileMultiple" multiple />
    </div>
    <div class="col-md-12 mb-3">
      <button type="submit" name="edit_course" class="btn btn-primary">Save Changes</button>
    </div>
  </div>
</form>











            </div>

            </div>
        </div>
    </div>
</div>


<script>
// Get the course ID from the URL query string
const params = new URLSearchParams(window.location.search);
const courseId = params.get("id");

// Fetch the course data and set the values of the input fields in the form
fetch("http://api.theschool.ac.tz/api/course/" + courseId)
  .then(response => response.json())
  .then(course => {
    document.getElementById("title").value = course.title;
    document.getElementById("description").value = course.description;
    document.getElementById("price").value = course.price;

    document.getElementById("course-form").action = "http://localhost:3000/api/course/" + course.id;
  })
  .catch(error => console.error(error));

// Handle the form submission
const form = document.getElementById("course-form");
form.addEventListener("submit", (event) => {
  event.preventDefault();
  const formData = new FormData(form);
  const title = formData.get('title');
  const description = formData.get('description');
  const price = formData.get('price');
  
  fetch(`http://api.theschool.ac.tz/api/courses/${courseId}`, {
    method: "PUT",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({title, description, price})
  })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error(error));
});


</script>

<?php

include('includes/footer.php');

?>
