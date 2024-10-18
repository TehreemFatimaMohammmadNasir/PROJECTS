
<?php 
require 'db.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
      // Start session
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['logged_in'] = true;

      // Redirect to welcome page
      header("Location: welcome.php");
      exit;
    } else {
      echo "Invalid password!";
    }
  } else {
    echo "Invalid email!";
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
<div class="container">
    <h2>Login</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <label>Email:</label>
      <input type="email" name="email" required>
      <br>
      <label>Password:</label>
      <input type="password" name="password" required>
      <br>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>
