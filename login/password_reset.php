
<?php
require 'db.php';

if (isset($_POST['reset'])) {
  $email = $_POST['email'];
  $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
  $password_reset_token = bin2hex(random_bytes(16));

  $sql = "UPDATE users SET password = '$new_password', password_reset_token = '$password_reset_token' WHERE email = '$email'";

  if (mysqli_query($conn, $sql)) {
    echo "Password reset successful!";
  } else {
    echo "Error resetting password: " . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

body {
  font-family: Arial, sans-serif;
  background-color: #f5f5f5;
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

h2 {
  color: #66ccff;
  margin-top: 0;
}

label {
  display: block;
  margin-bottom: 10px;
  color: #777;
}

input[type="email"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
  color: #333;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #3e8e41;
}

.error {
  color: #f00;
  font-size: 12px;
  margin-bottom: 10px;
}

.success {
  color: #0f0;
  font-size: 12px;
  margin-bottom: 10px;
}

/* Add some extra styling */
.container {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-top: 3px solid #66ccff;
}

h2 {
  font-weight: bold;
  font-size: 24px;
}

label {
  font-size: 16px;
}

input[type="email"] {
  font-size: 16px;
}

button[type="submit"] {
  font-size: 16px;
}

    </style>
</head>
<body>
<form action="password_reset.php" method="post">
  <label>Email:</label>
  <input type="email" name="email" required>
  <br>
  <label>New Password:</label>
  <input type="password" name="new_password" required>
  <br>
  <button type="submit" name="reset">Reset</button>
</form>
</body>
</html>
