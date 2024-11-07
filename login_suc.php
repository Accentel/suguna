<?php
session_start();
date_default_timezone_set('Asia/Kolkata'); // Set the time zone to Indian Standard Time (IST)
$maxAttempts = 5; // Maximum allowed attempts per IP

// Function to get the user's IP address
function getUserIP()
{
    $ip = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $ip = 'UNKNOWN';
    }
    return $ip;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    require_once('config2.php');

    $userIP = getUserIP(); // Get the user's IP address

    try {
        // Establish a secure PDO database connection
        $link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare a SQL statement using prepared statements to prevent SQL injection
        $stmt = $link->prepare("SELECT * FROM login WHERE username = :username AND password = :password");

        // Sanitize and bind the parameters
        $username = $_POST['useacc'];
        $password = $_POST['pasacc'];
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Execute the query
        $stmt->execute();

        // Check if a row is returned (valid credentials)
        if ($stmt->rowCount() > 0) {
            // Successful login - set session variables or generate tokens
            $_SESSION["authenticated"] = true;
            $_SESSION['suguna'] = $username;
            $_SESSION['ename1'] = $empname;
            // Redirect to a secure page after successful login
            header("Location: home.php");
            exit();
        } else {
            // Store failed login attempt
            $failedAttempts = "Failed login attempt by: $username, IP: $userIP, Time: " . date('Y-m-d H:i:s') . "\n";
            file_put_contents('failed_logins.txt', $failedAttempts, FILE_APPEND);

            // Check and limit failed attempts per IP
            $_SESSION['login_attempts'][$userIP] = ($_SESSION['login_attempts'][$userIP] ?? 0) + 1;

            if ($_SESSION['login_attempts'][$userIP] >= $maxAttempts) {
                // Block further attempts or take necessary action (redirect, display error message, etc.)
                header("Location: login_blocked.php");
                exit();
            } else {
                // Incorrect credentials - redirect back to login with a login failed message
                header("Location: index.php?login_failed=true");
                exit();
            }
        }
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Connection failed: " . $e->getMessage();
    } finally {
        // Close the database connection
        $link = null;
    }
} else {
    // CSRF token verification failed - handle accordingly (display error message or redirect)
    header("Location: csrf_error.php");
    exit();
}
?>
