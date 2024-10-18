
<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $useremail = $_POST['Email'];

    $token = bin2hex(random_bytes(16));

    $sql = "UPDATE box SET password_reset_token='$token' WHERE Email='$useremail'";
    $connection->query($sql);

    $to = $useremail;
    $subject = "Reset Your Password";
    $message = "Click this link to reset your password: http://localhost/reg/reset_password.php?token=$token";
    $headers = "From: your-email@example.com";
    mail($to, $subject, $message, $headers);

    echo "Password reset email sent!";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label>Email:</label>
    <input type="email" name="Email" required>
    <button type="submit">Send Password Reset Email</button>
</form>
