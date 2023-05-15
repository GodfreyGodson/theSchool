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
  <h4 class="mt-4">Subscribers</h4>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
    <li class="breadcrumb-item active">Users Who Subscribed to This Course</li>
  </ol>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Subscribed Users</h4>
        </div>

        <div class="card-body">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

        </div>

      </div>
    </div>
  </div>
</div>

<script>
  // Retrieve the saved data from session storage
  const subscribersData = JSON.parse(sessionStorage.getItem('subscribersData'));
  console.log(subscribersData);
  // Use the data to populate the table
  subscribersData.enrollments.forEach((enrollment, index) => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <th scope="row">${index + 1}</th>
      <td>${enrollment.student.name}</td>
      <td>${enrollment.student.email}</td>
      <td>
        <button type="button" class="btn ${enrollment.isPaid ? 'btn-success' : 'btn-danger'}">
          ${enrollment.isPaid ? 'Paid' : 'Pending'}
        </button>
      </td>
    `;

    row.querySelector('button').addEventListener('click', () => {
      const newStatus = enrollment.isPaid ? false : true;
      enrollment.isPaid = newStatus;
      row.querySelector('button').classList.remove('btn-success', 'btn-danger');
      row.querySelector('button').classList.add(newStatus ? 'btn-success' : 'btn-danger');
      row.querySelector('button').textContent = newStatus ? 'Paid' : 'Pending';

      // Send the request to update the enrollment status
      const enrollmentId = enrollment._id;
      fetch(`http://api.theschool.ac.tz/api/enrollments/${enrollmentId}`, {
        method: 'PUT',
        body: JSON.stringify({ isPaid: newStatus }),
        headers: {
          'Content-Type': 'application/json'
        }
      })
      .then(response => {
        if (response.ok) {
          console.log('Enrollment status updated successfully.');
        } else {
          console.log('Enrollment status update failed.');
        }
      })
      .catch(error => {
        console.log(`Enrollment status update failed: ${error.message}`);
      });
    });
    document.querySelector('tbody').appendChild(row);
  });
</script>

<?php
include('includes/footer.php');
?>
