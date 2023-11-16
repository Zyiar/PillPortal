<?php
include("header.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simpleAppDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['image'])) {
    $image = $_GET['image'];
    $sql = "SELECT name, category, price, description, dosage, side_effects, precautions, manufacturer, availability FROM drug WHERE image = '$image'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $drugDetails = [
            'name' => $row['name'],
            'category' => $row['category'],
            'price' => $row['price'],
            'description' => $row['description'],
            'dosage' => $row['dosage'],
            'side_effects' => $row['side_effects'],
            'precautions' => $row['precautions'],
            'manufacturer' => $row['manufacturer'],
            'availability' => $row['availability'],
        ];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Your CSS styles here */
        .details-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
        }

        .details-container img {
            max-width: 50%;
            max-height: 70vh;
            padding: 10px;
        }

        .details-text {
            flex: 1;
            padding: 10px;
        }
    </style>
</head>
<body>
<div class="details-container">
    <img src="<?php echo $_GET['image']; ?>" alt="Medicine" />
    <div class="details-text">
    <?php
    if (!empty($drugDetails)) {
        echo '<div class="drug-card">';
        echo '<h2>Drug Details</h2>';
        echo '<p><strong>Name:</strong> ' . $drugDetails['name'] . '</p>';
        echo '<p><strong>Category:</strong> ' . $drugDetails['category'] . '</p>';
        echo '<p><strong>Price:</strong> ' . $drugDetails['price'] . '</p>';
        echo '<p><strong>Description:</strong> ' . $drugDetails['description'] . '</p>';
        echo '<p><strong>Dosage:</strong> ' . $drugDetails['dosage'] . '</p>';
        echo '<p><strong>Side Effects:</strong> ' . $drugDetails['side_effects'] . '</p>';
        echo '<p><strong>Precautions:</strong> ' . $drugDetails['precautions'] . '</p>';
        echo '<p><strong>Manufacturer:</strong> ' . $drugDetails['manufacturer'] . '</p>';
        echo '<p><strong>Availability:</strong> ' . $drugDetails['availability'] . '</p>';
        echo '</div>';
    } else {
        echo '<p>No drug details available.</p>';
    }
    ?>
    </div>
</div>
</body>
</html>
