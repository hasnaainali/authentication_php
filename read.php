<?php
// Assuming you've already set up your database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your actual password
$dbname = "contactlists"; // Your database name

// Create connection (using mysqli_connect for broader compatibility)
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$id = isset($_POST['id']) ? $_POST['id'] : null; // Handle potential missing ID

// **Improved function to read and display a specific contact by ID:**
function readContactById($conn, $id) {
  $sql = "SELECT * FROM user WHERE id = ?"; // Prepared statement for security

  $stmt = mysqli_prepare($conn, $sql); // Prepare the statement

  if ($stmt) { // Check for successful preparation
    mysqli_stmt_bind_param($stmt, "i", $id); // Bind ID parameter (integer)
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
      $contact = mysqli_fetch_assoc($result);
      echo "<h1>Contact Details</h1>"; // Display heading
      echo "<ul>";
      echo "<li>ID: " . $contact['id'] . "</li>";
      echo "<li>Name: " . $contact['name'] . "</li>";
      echo "<li>Email: " . $contact['email'] . "</li>";
      echo "<li>Phone: " . $contact['phone'] . "</li>";
      echo "</ul>";
    } else {
      echo "Contact with ID $id not found.";
    }

    mysqli_stmt_close($stmt);
  } else {
    echo "Error preparing statement: " . mysqli_error($conn);
  }

  mysqli_free_result($result); // Free memory from query result
}

// Call the function to read and display contact if ID is provided
if ($id) {
  readContactById($conn, $id);
} else {
  echo "Please provide a valid contact ID.";
}

mysqli_close($conn);
?>
