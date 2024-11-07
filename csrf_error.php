<?php
// Capturing timestamp, date, and session information
date_default_timezone_set('Asia/Kolkata'); // Set the time zone to Indian Standard Time (IST)
$timestamp = date("Y-m-d H:i:s");
$date = date("Y-m-d");
$sessionLocation = $_SERVER['REMOTE_ADDR']; // Capturing session IP address

// Creating a string with the captured information
$logInfo = "Timestamp: $timestamp | Date: $date | Session Location: $sessionLocation\n";

// File to store the session information (change the path as needed)
$filePath = "csrf_error_logs.txt";

// Appending the session information to the text file
file_put_contents($filePath, $logInfo, FILE_APPEND | LOCK_EX);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSRF Token Error</title>
    <!-- Add any necessary meta tags, stylesheets, or scripts -->
</head>
<body>
    <h1>CSRF Token Error</h1>
    <p>Oops! It seems like there was an issue with the CSRF token verification.</p>
    <p>Please ensure that you are submitting the form from a valid source.</p>
    <!-- Add any additional information or instructions for the user -->
</body>
</html>
