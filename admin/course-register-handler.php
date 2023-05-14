<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $url = 'http://localhost:3000/api/courses';

    // Get the file data
    $files = $_FILES['files'];

    // Create a new cURL resource
    $ch = curl_init();

    // Set the URL and other options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);

    // Add the form fields and files to the request
    $post_data = array_merge($_POST, array('files' => array(curl_file_create($files['tmp_name'][0], $files['type'][0], $files['name'][0]), curl_file_create($files['tmp_name'][1], $files['type'][1], $files['name'][1]))));

   
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Send the request and get the response
    $response = curl_exec($ch);

    // Close cURL resource and free up system resources
    curl_close($ch);

    // Redirect back to the courses page
    header('Location: view-course.php');
    exit(0);
} else {
    header('Location: ../login.php');
    exit(0);
}

?>
