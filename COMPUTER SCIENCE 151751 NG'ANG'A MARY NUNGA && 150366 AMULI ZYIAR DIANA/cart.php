<?php
session_start();

// Check if the product is added to the cart
if (isset($_GET['product'])) {
    $product = $_GET['product'];

    // Store the product in the cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    array_push($_SESSION['cart'], $product);
}

// Display the cart content
echo "<h1>Your Cart</h1>";
echo "<ul>";
foreach ($_SESSION['cart'] as $product) {
    echo "<li>$product</li>";
}
echo "</ul>";
?>