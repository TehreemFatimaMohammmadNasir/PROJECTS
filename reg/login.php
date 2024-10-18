


<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM box WHERE Email='$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password'])) {
            echo "Login successful!";
            // Redirect to dashboard or home page
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Email not found!";
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label>Email:</label>
    <input type="email" name="Email" required>
    <br>
    <label>Password:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>

