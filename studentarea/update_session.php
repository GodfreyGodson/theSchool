<?php
session_start();
$selected_exam = $_GET['selected_exam'];

if ($_SESSION['selected_exam'] != $selected_exam) {
    $_SESSION['selected_exam'] = null;
}

$_SESSION['selected_exam'] = $selected_exam;
?>