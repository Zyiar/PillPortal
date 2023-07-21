<?php
session_start();

// Check if the user is logged in as a doctor
if (isset($_SESSION["userType"]) && $_SESSION["userType"] === "1") {
    // Display doctor-specific content or perform doctor-specific actions
    echo "<div style='position: absolute; top: 0; right: 0; padding: 10px;'>Welcome, Doctor " . $_SESSION["userName"] . "!</div>";
    // Rest of the doctor page content
} else {
    // Redirect to the login page or show an access denied message
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doc dashboard</title>
    <style type="text/css">
        .logout-btn {
          border-radius: 10px;
          padding: 0.5em;
          margin-top: 20px;
        }
    </style>
</head>
<body>
    <form action="logout.php" method="post">
   <input type="submit" value="Log Out" class="logout-btn">
</form>
</body>
</html>