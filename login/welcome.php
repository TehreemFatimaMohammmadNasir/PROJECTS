<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 400px;
      margin: 40px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #66ccff;
      margin-top: 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome, <?php echo $_SESSION['email']; ?>!</h1>
    <p>You are now logged in.</p>
  </div>
</body>
</html>
