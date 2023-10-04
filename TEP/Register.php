<?php
$servername = "localhost";
$username   = "root";  // default username for XAMPP MySQL
$password   = "";  // default password for XAMPP MySQL
$dbname     = "Bright Boost";  // name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$school = $conn->real_escape_string($_POST['school']);
$password = $conn->real_escape_string($_POST['password']);
$subjects = $conn->real_escape_string(implode(", ", $_POST['subjects']));

$sql = "INSERT INTO Student (name, email, school, password, subjects) VALUES ('$name', '$email', '$school', '$password','$subjects')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: Login.html");  // If successful, redirect to Login.html
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}
?>
