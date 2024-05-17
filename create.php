<?php
// Assuming you've already set up your database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contactlists"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$id = $_POST['id']; // Assuming the ID is provided by the user
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Construct the SQL query
$sql = "INSERT INTO user (id, name, email, phone) VALUES ('$id', '$name', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
