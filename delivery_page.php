<?php
session_start();

// Check if the user is logged in as a patient
if (isset($_SESSION["userType"]) && $_SESSION["userType"] === "4") {
    // Display patient-specific content or perform patient-specific actions
    echo "<div style='position: absolute; top: 0; right: 0; padding: 10px;'>Welcome, DP " . $_SESSION["userName"] . "!</div>";
    // Rest of the patient page content
} else {
    // Redirect to the login page or show an access denied message
    header("Location: login.php");
    exit();
}
?>
