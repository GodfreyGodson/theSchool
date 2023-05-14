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
  <h4 class="mt-4">View Subscribers</h4>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Select course to see subscribers</li>
  </ol>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Subscribers</h4>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Courses</th>
                <th scope="col">View Subscribers</th>
              </tr>
            </thead>
            <tbody id="courseTableBody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Fetch the course data from the Node.js endpoint
  fetch('http://localhost:3000/api/courses')
    .then(response => response.json())
    .then(data => {
      // Loop through the course data and add it to the HTML table
      const courseTableBody = document.getElementById('courseTableBody');
      data.forEach((course, index) => {
        const row = `
          <tr>
            <th scope="row">${index + 1}</th>
            <td>${course.title}</td>
            <td>
              <button type="button" class="btn btn-primary view-subscribers-btn" data-course-id="${course._id}">View Subscribers</button>
            </td>
          </tr>
        `;
        courseTableBody.innerHTML += row;
      });

      // Add event listener to each "View Subscribers" button
      const viewSubscribersBtns = document.querySelectorAll('.view-subscribers-btn');
      viewSubscribersBtns.forEach(btn => {
        btn.addEventListener('click', async () => {
          try {
            const courseId = btn.dataset.courseId;
            const response = await fetch(`http://localhost:3000/api/course/${courseId}`);
            const data = await response.json();
            console.log(data); // Log the obtained data
              /* save the requested data in the session */
      sessionStorage.setItem('subscribersData', JSON.stringify(data));
      /* redirect to the subscribers.php page */
      window.location.href = 'subscribers.php';
          } catch (error) {
            console.error(error);
          }
        });
      });
    })
    .catch(error => console.error(error));
</script>

<?php
  include('includes/footer.php');
  //include('includes/scripts.php');
?>
