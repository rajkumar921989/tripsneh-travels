<?php
// Show errors (for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "tripsneh_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set timezone for correct timestamp
date_default_timezone_set("Asia/Kolkata");

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $mobile  = $_POST['mobile'];
    $message = $_POST['message'];

    $created_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO customer_query 
            (name, email, mobile, message, created_at) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {

        $stmt->bind_param("sssss", 
            $name, 
            $email, 
            $mobile, 
            $message, 
            $created_at
        );

        if ($stmt->execute()) {
            echo "<script>
                    alert('Message sent successfully 🚀');
                    window.location.href='contactus.html';
                  </script>";
        } else {
            echo "Execute Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Prepare Error: " . $conn->error;
    }
}

$conn->close();
?>