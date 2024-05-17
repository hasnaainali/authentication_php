<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>

  <?php
  <?php
  // Connect to the database (same as previous examples)
  // ... (Replace with your connection details)
  
  session_start(); // Start session
  
  if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
  
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) === 1) {
      $user = mysqli_fetch_assoc($result);
      if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        $_SESSION['message'] = "Login successful!";
        header('Location: contacts.php'); // Redirect to contacts page
      } else {
        echo "Invalid username or password.";
      }
    } else {
      echo "Invalid username or password.";
    }
  
    mysqli_free_result($result);
  }
  
  mysqli_close($conn);
  ?>
  
  include('login_process.php');

  // Display any session messages
  if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']); // Clear message after displaying
  }
  ?>

  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" name="login" value="Login">
  </form>
</body>
</html>
