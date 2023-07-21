<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "simpleAppDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['prescription_id']) && isset($_POST['prices']) && isset($_POST['amounts'])) {
    $prescriptionId = $_POST['prescription_id'];
    $prices = $_POST['prices'];
    $amounts = $_POST['amounts'];

    // Update the database with the dispensed price and amount for each drug
    foreach ($prices as $drugName => $price) {
        $amount = $amounts[$drugName];

        // Perform any necessary validation or sanitization of the input values

        // Update the database with the dispensed price and amount
        $updateSql = "UPDATE drugs SET price='$price', amount='$amount' WHERE name='$drugName'";
        $conn->query($updateSql);
    }

    // Set a success message to be displayed on the shop page
    $successMessage = "Drugs dispensed successfully.";

    // Store the success message in a session variable for retrieval on the shop page
    session_start();
    $_SESSION['success_message'] = $successMessage;

    // Redirect
    header("Location: pharmacist_page.php");
    exit();
} else {
    echo "Invalid request.";
    exit();
}

$conn->close();
?>
