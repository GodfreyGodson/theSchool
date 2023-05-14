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
               <h4>Registered Courses
                <a href="course-register.php" class="btn btn-primary float-end ">Add Course</a>
               </h4>
            </div>

            <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>course id</th>
                        <th>course-name</th>
                        <th>course-price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="table-body"></tbody>
            </table>

            </div>
        </div>
    </div>

 </div>


</div>


<script>
  fetch("http://localhost:3000/api/courses")
    .then(response => response.json())
    .then(courses => {
      const tbody = document.getElementById("table-body");
      courses.forEach((course, index) => {
        const tr = document.createElement("tr");
        const td1 = document.createElement("td");
        td1.innerText = index + 1;
        const td2 = document.createElement("td");
        td2.innerText = course.title;
        const td3 = document.createElement("td");
        td3.innerText = course.price + "tsh";
        const td4 = document.createElement("td");
        const editBtn = document.createElement("a");
        editBtn.href = "course-edit.php?id=" + course.id;
        editBtn.className = "btn btn-success";
        editBtn.innerText = "Edit";
        td4.appendChild(editBtn);
        const td5 = document.createElement("td");
        const deleteForm = document.createElement("form");
        const deleteBtn = document.createElement("button");
        deleteBtn.type = "button";
        deleteBtn.className = "btn btn-danger";
        deleteBtn.innerText = "Delete";
        
        // add event listener to the delete button
        deleteBtn.addEventListener('click', async () => {
  const response = await fetch(`http://localhost:3000/api/courses/${course.id}`, {
    method: 'DELETE'
  });
  const result = await response.json();
  console.log(result);
  // show success message
  Toastify({
    text: "Course deleted successfully",
    duration: 3000,
    close: true,
    gravity: "top", // top or bottom
    position: "right", // left, center, or right
    backgroundColor: "green",
    stopOnFocus: true // Prevents dismissing of toast on hover
  }).showToast();
  // reload the page to update the table
  location.reload();
});


        deleteForm.appendChild(deleteBtn);
        td5.appendChild(deleteForm);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tbody.appendChild(tr);
      });
    })
    .catch(error => console.error(error));
</script>


<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php

include('includes/footer.php');

?>