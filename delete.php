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
 

// Function to delete a contact
  
    $sql = "DELETE FROM user WHERE id=$id";
  
    if ($conn->query($sql) === TRUE) {
      echo "Contact deleted successfully!";
    } else {
      echo "Error deleting contact: " . mysqli_error($conn);
    }
 
 
mysqli_close($conn);
?>