<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>
  <h1>Register</h1>

  <?php
  // Include a file for handling registration logic (register_process.php)
  include('register_process.php');
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
