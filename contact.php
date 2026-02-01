<?php
// Database connection
$servername = "localhost";
$username = "root";      // default XAMPP username
$password = "";          // default XAMPP password
$dbname = "tripsnehcontactus"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check form submission
if (isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $prefereddestination = $_POST['prefereddestination'];
    $comments = $_POST['comments'];

    $sql = "INSERT INTO contact_messages 
            (name, email, phonenumber, prefereddestination, comments)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phonenumber, $prefereddestination, $comments);

    if ($stmt->execute()) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contactus.html';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
