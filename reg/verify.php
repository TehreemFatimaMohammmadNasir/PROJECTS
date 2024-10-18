<?php
require 'db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validate token
    $sql = "SELECT * FROM box WHERE verification_token='$token'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // Token is valid, update verification status
        $update_sql = "UPDATE box SET verified=1 WHERE verification_token='$token'";
        $connection->query($update_sql);

        echo "Email verified successfully!";
    } else {
        echo "Invalid or expired token!";
    }
} else {
    echo "Verification token not provided. Please check the verification link.";
}
?>
