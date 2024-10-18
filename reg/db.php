

<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "page";

$connection = new mysqli($servername, $username, $password, $db);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (!$connection->query($sql)) {
    die("Error creating database: " . $connection->error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS box (
    Id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Email VARCHAR(255),
    Password VARCHAR(255),
    Contact VARCHAR(255),
    verified INT DEFAULT 0,
    verification_token VARCHAR(255),
    password_reset_token VARCHAR(255)
)";
if (!$connection->query($sql)) {
    die("Error creating table: " . $connection->error);
}
?>