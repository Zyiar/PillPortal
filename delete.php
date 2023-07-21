<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "simpleAppDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $user_email = $_POST['user_email'];

    $delete_sql = "DELETE FROM users WHERE userEmail='$user_email'";
    $conn->query($delete_sql);
}

// Close database connection
$conn->close();