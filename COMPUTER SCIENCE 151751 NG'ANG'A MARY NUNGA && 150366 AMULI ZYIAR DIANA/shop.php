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

// Fetch data
$sql = "SELECT * FROM drugs";
$results = $conn->query($sql);

// Handle edit functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $update_sql = "UPDATE drugs SET name='$product_name', amount='$product_amount', price='$product_price' WHERE id='$product_id'";
    $conn->query($update_sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <style type="text/css">
         td, th {
            border: 1px solid white;
            padding: 4px;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 50%;
        }
        tr {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <?php
    if ($results->num_rows > 0) {
            echo "<h2>Products</h2>";
            echo "<table>";
            echo "<tr><th>Name</th><th>Amount</th><th>Price</th><th>Edit</th></tr>";
            
            while ($row = $results->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>$" . $row['price'] . "</td>";

                echo "<td>";
                echo "<form method='POST' action='edit_products.php'>"; // Edit product form
                echo "<input type='hidden' name='product_name' value='" . $row['name'] . "'>";
                echo "<input type='hidden' name='product_amount' value='" . $row['amount'] . "'>";
                echo "<input type='hidden' name='product_price' value='" . $row['price'] . "'>";

                echo "<button type='submit' name='edit_product'>Edit</button>";
                echo "</form>";
                echo "</td>";

                echo "</tr>";
            }

        
            echo "</table>";
        }
    ?>

    <h2>Add New Product</h2>
    <form action="add_products.php" method="POST">
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="text" name="product_amount" placeholder="Product Amount" required>
        <input type="number" step="0.01" name="product_price" placeholder="Product Price" required>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>