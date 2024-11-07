<?php
session_start();

// Check if the user is authenticated
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // If authenticated, redirect to home.php
    header("Location: home.php");
    exit();
} else {
    // If not authenticated, redirect to login page or handle accordingly
    header("Location: home.php"); // Replace with your login page
    exit();
}
?>
