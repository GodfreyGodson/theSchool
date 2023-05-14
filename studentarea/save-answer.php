<?php
session_start();

// Get the selected exam from the URL parameter
$selected_exam = $_GET['selected_exam'];

// Check if the selected exam has changed
if ($_SESSION['exam'] != $selected_exam) {
    // If it has changed, reset the session variable
    $_SESSION['exam'] = null;
}

// Save the selected exam as "exam" in the session
$_SESSION['exam'] = $selected_exam;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = $_POST['answer'];
    $question = $_POST['question'];

    // Save the selected answer and exam to PHP session
    $sessionData = [
        'answer' => $answer,
        'exam' => $_SESSION['exam'] // add exam variable to session data
    ];
    $_SESSION['quiz'][$question] = $sessionData;

    echo 'Answer saved to session.';
}

// Destroy the session after use
session_destroy();
?>
