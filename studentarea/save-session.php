<!-- <?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = $_POST['answer'];
    $question = $_POST['question'];

    // Save the selected answer to PHP session
    $sessionData = [
        'answer' => $answer,
        'question' => $question
    ];
    $_SESSION['quiz'][$question] = $sessionData;

    
    

    echo 'Answer saved to session.';
}
?> -->

// Destroy the session after use

<?php

session_start();

// Get the selected exam from the GET parameter
$selected_exam = $_GET['selected_exam'];

// Rename selected_exam to exam
$_SESSION['exam'] = $selected_exam;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = $_POST['answer'];
    $question = $_POST['question'];

    // Save the selected answer to PHP session along with the exam
    $sessionData = [
        'answer' => $answer,
        'question' => $question,
        'exam' => $_SESSION['exam']
    ];
    $_SESSION['quiz'][$question] = $sessionData;

    echo 'Answer saved to session.';
}

// Destroy the session after use
session_destroy();
?>



