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

// Retrieve user details based on email
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_email'])) {
    $user_email = $_POST['user_email'];

    $sql = "SELECT * FROM users WHERE userEmail='$user_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_tel = $_POST['user_tel'];

    $update_sql = "UPDATE users SET userName='$user_name', userEmail='$user_email', userTel='$user_tel' WHERE userEmail='$user_email'";
    $conn->query($update_sql);

    header("Location: admin_page.php");
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="">
        <input type="hidden" name="user_email" value="<?php echo $user['userEmail']; ?>">
        <label for="user_name">Name:</label>
        <input type="text" name="user_name" value="<?php echo $user['userName']; ?>"><br><br>
        
        <label for="user_type">User Type:</label>
        <input type="text" name="user_tel" value="<?php echo $user['userTel']; ?>"><br><br>

        <button type="submit" name="update_user">Update</button>
    </form>
</body>
</html>