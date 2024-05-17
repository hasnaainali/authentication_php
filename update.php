

 


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
 
$id = $_POST['id']; // Assuming the ID is provided by the user
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
 
$sql = "UPDATE user SET name='$name', email='$email', phone='$phone' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Contact updated successfully!";
} else {
  echo "Error updating contact: " . mysqli_error($conn);
}
 
 
mysqli_close($conn);
?>