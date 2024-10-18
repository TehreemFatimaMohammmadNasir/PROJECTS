
<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    $contact = $_POST['Contact'];

    $sql = "SELECT * FROM box WHERE Email='$email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        $sql = "INSERT INTO box (Email, Password, Contact) VALUES ('$email', '$password', '$contact')";
        if ($connection->query($sql)) {
            echo "Signup successful!";
        } else {
            echo "Error signing up: " . $connection->error;
        }
    }
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label>Email:</label>
    <input type="email" name="Email" required>
    <br>
    <label>New Password:</label>
    <input type="password" name="new_password" required>
    <br>
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required>
    <br>
    <label>Contact:</label>
    <input type="text" name="Contact" required>
    <br>
    <button type="submit">Signup</button>
</form>