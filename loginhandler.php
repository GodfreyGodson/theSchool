<?php
  session_start();
  // Get the form data
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Create a data array to hold the form data
  $data = array("email" => $email, "password" => $password);

  // Encode the data array as JSON
  $json_data = json_encode($data);

  // Set up cURL
  $url = "http://api.theschool.ac.tz/api/login"; // Replace with the actual API endpoint URL
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

  // Execute the cURL request
  $response = curl_exec($ch);

  // Close the cURL connection
  curl_close($ch);

  // Check for a successful response
  if ($response === false) {
      // Handle the error
      $_SESSION['message'] = "An error occurred while Login";
      header("Location: login.php");
      exit(0);
  } else {
    // Decode the JSON response
    $user_data = json_decode($response, true);

    // Check if the user is of type "Admin"
    if (isset($user_data['user']) && $user_data['user']['userType'] === "Admin") {
      // Store the user data in a session
      $_SESSION['user'] = $user_data['user'];
      // Redirect to the admin page
      header("Location: admin/index.php");
    } else {
      // Show a message if the user is not of type "Admin"
      $_SESSION['message'] = "You are not authorized";
      header("Location: login.php");
      exit(0);
    }
  }
?>
