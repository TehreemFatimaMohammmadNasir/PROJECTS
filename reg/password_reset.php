<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "post") {
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    } else {
        echo "Token is missing!";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Validate token
    $sql = "SELECT * FROM box WHERE verification_token='$token'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Token is valid, update password
        $update_sql = "UPDATE box SET Password='$new_password' WHERE verification_token='$token'";
        $update_result = $connection->query($update_sql);

        if ($update_result) {
            echo "Password updated successfully!";
        } else {
            echo "Error updating password!";
        }
    } else {
        echo "Invalid or expired token!";
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="hidden" name="token" value="<?php echo $_post['token']; ?>">
    <label>New Password:</label>
    <input type="password" name="new_password" required>
    <button type="submit">Reset Password</button>
</form>

