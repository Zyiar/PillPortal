<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simpleAppDB";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_amount'])) {
    $name = $_POST['product_name'];
    $amount = $_POST['product_amount'];
    $price = $_POST['product_price'];

    // Prepare and execute the SQL statement to insert the new product
    $stmt = $conn->prepare("INSERT INTO drugs (name, amount, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sdd", $name, $amount, $price);
    $stmt->execute();

    $stmt->close();

    // Redirect back to the shop page after adding the product
    header("Location: shop.php");
    exit();
}

$conn->close();
?>
