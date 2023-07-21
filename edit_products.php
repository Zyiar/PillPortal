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

// Retrieve user details based on name
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_price'])) {
    $product_price = $_POST['product_price'];

    $sql = "SELECT * FROM drugs WHERE price='$product_price'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {
    $product_name = $_POST['product_name'];
    $product_amount = $_POST['product_amount'];
    $product_price = $_POST['product_price'];

    $update_sql = "UPDATE drugs SET name='$product_name', amount='$product_amount', price='$product_price' WHERE price='$product_price'";
    $conn->query($update_sql);

    header("Location:shop.php");
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="">
        <label for="product_name">Name:</label>
        <input type="text" name="product_name" value="<?php echo isset($product['name']) ? $product['name'] : ''; ?>"><br><br>
        
        <label for="product_amount">Amount:</label>
        <input type="text" name="product_amount" value="<?php echo isset($product['amount']) ? $product['amount'] : ''; ?>"><br><br>

        <label for="product_price">Price:</label>
        <input type="number" name="product_price" value="<?php echo isset($product['price']) ? $product['price'] : ''; ?>"><br><br>

        <button type="submit" name="update_product">Update</button>
    </form>
</body>
</html>
