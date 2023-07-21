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
$sql = "SELECT * FROM prescriptions";
$prescriptionsResult = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prescriptions</title>
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

        .logout-btn {
          border-radius: 10px;
          padding: 0.5em;
          margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php
    if ($prescriptionsResult->num_rows > 0) {
        echo "<h2>Prescriptions</h2>";
        echo "<table>";
        echo "<tr><th>Patient</th><th>Prescription</th><th>Action</th></tr>";

        while ($row = $prescriptionsResult->fetch_assoc()) {
            $patient = $row["patient"];
            $prescription = $row["prescription"];
            $prescriptionId = $row["id"];

            echo "<tr>";
            echo "<td>$patient</td>";
            echo "<td>$prescription</td>";
            echo "<td><a href='dispense.php?id=$prescriptionId'>Dispense</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No prescriptions found.";
    }

    $conn->close();
    ?>

<h2>History of Dispensed Drugs</h2>
<?php
// Database connection and query to fetch dispensed drugs history
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch dispensed drugs history associated with prescriptions
$dispensedDrugsQuery = "SELECT p.patient, d.name AS drug, d.price, d.amount FROM prescriptions p INNER JOIN drugs d ON p.id = d.prescription_id";
$dispensedDrugsResult = $conn->query($dispensedDrugsQuery);

if ($dispensedDrugsResult->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Patient</th><th>Drug</th><th>Price</th><th>Amount</th></tr>";

    while ($row = $dispensedDrugsResult->fetch_assoc()) {
        $patient = $row["patient"];
        $drug = $row["drug"];
        $price = $row["price"];
        $amount = $row["amount"];

        echo "<tr>";
        echo "<td>$patient</td>";
        echo "<td>$drug</td>";
        echo "<td>$price</td>";
        echo "<td>$amount</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No dispensed drugs found.";
}

$conn->close();
?>

    <form action="logout.php" method="post">
        <input type="submit" value="Log Out" class="logout-btn">
    </form>

</body>
</html>
