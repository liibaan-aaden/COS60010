<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "Bright Boost";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['student-email']) && isset($_POST['student-password'])) {
    $email = $conn->real_escape_string($_POST['student-email']);
    $password = $conn->real_escape_string($_POST['student-password']);
    
    $sql = "SELECT * FROM student WHERE email = '$email' AND password = '$password'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        header("Location: test.php");  // Redirect to student dashboard or homepage
        exit;
    } else {
        echo "Incorrect student credentials";
    }
}

if (isset($_POST['tutor-email']) && isset($_POST['tutor-password'])) {
    $email = $conn->real_escape_string($_POST['tutor-email']);
    $password = $conn->real_escape_string($_POST['tutor-password']);
    
    $sql = "SELECT * FROM tutor WHERE email = '$email' AND password = '$password'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        header("Location: test.php");  // Redirect to tutor dashboard or homepage
        exit;
    } else {
        echo "Incorrect tutor credentials";
    }
}

$conn->close();
?>
