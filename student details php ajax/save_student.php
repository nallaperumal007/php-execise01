<?php
session_start();
require 'dbcon.php'; // Make sure dbcon.php is correctly configured

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    // Insert the student record into the database
    $query = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    $result = mysqli_query($con, $query);

    if($result) {
        $_SESSION['success'] = "Student record added successfully!";
    } else {
        $_SESSION['error'] = "Failed to add student record. Please try again.";
    }
}
?>
