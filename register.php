<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>
  <h1>Register</h1>

  <?php
// Connect to the database (same as previous examples)
// ... (Replace with your connection details)

session_start(); // Start session

if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "Registration successful! Please login.";
    header('Location: login.php'); // Redirect to login page
  } else {
    echo "Error registering user: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>


  <form action="register.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" name="register" value="Register">
  </form>
</body>
</html>
