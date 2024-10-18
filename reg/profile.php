<?php
session_start();
require 'db.php';

if (isset($_SESSION['useremail'])) {
    $useremail = $_SESSION['useremail'];

    $sql = "SELECT * FROM box WHERE Email='$useremail'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        echo "Email: " . $user['Email'];
        echo "<br>Contact: " . $user['Contact'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_email = $_POST['Email'];
            $new_contact = $_POST['Contact'];

            $sql = "UPDATE box SET Email='$new_email', Contact='$new_contact' WHERE Email='$useremail'";
            if ($connection->query($sql)) {
                echo "Profile updated successfully!";
            } else {
                echo "Error updating profile: " . $connection->error;
            }
        }
    } else {
        echo "No user found.";
    }
}
?>

<form action="" method="post">
    <label>Email</label>
    <input type="email" name="Email" required>
    <label>Contact</label>
    <input type="text" name="Contact" required>
    <button type="submit">Update Profile</button>
</form>

