<?php
session_start();

// Check if the user is logged in as a patient
if (isset($_SESSION["userType"]) && $_SESSION["userType"] === "2") {
    // Display patient-specific content or perform patient-specific actions
    echo "<div style='position: absolute; top: 0; right: 0; padding: 10px;'>Welcome, Patient " . $_SESSION["userName"] . "!</div>";
    // Rest of the patient page content
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
    <title>Patient dashboard</title>
</head>
<body>
    <form action="logout.php" method="post">
   <input type="submit" value="Log Out" class="logout-btn">
</form>
</body>
</html>