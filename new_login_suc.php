<?php
ob_start();
include("config.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $servername = "localhost";
    $username = "a16673ai_payamath";
    $password = "Payamath@2016";
    $dbname = "a16673ai_suguna";
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare a SQL statement using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM org_login WHERE login = :username AND pass = :password");

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
            // Redirect to a secure page after successful login
            header("Location: secure_page.php");
            exit();
        } else {
            // Incorrect credentials - handle accordingly (display error message or redirect)
            header("Location: index.php?valid=false.php");
            exit();
        }
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Connection failed: " . $e->getMessage();
    } finally {
        // Close the database connection
        $conn = null;
    }
} else {
    // CSRF token verification failed - handle accordingly (display error message or redirect)
    header("Location: csrf_error.php");
    exit();
}
?>