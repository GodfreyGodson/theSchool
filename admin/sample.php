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

    // Use the data to populate the table
    subscribersData.subscribers.forEach((subscriber, index) => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <th scope="row">${index + 1}</th>
        <td>${subscriber.name}</td>
        <td>${subscriber.email}</td>
        <td>
          <button type="button" class="btn ${subscriber.status === 'Paid' ? 'btn-success' : 'btn-danger'}">${subscriber.status}</button>
        </td>
      `;
      document.querySelector('tbody').appendChild(row);
    });
  </script>


<?php
include('includes/footer.php');
include('includes/scripts.php');
?>
