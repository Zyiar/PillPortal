<!DOCTYPE html>
<html>
<head>
    <title>Dispense Drugs</title>
</head>
<body>
    <h1>Dispense Drugs</h1>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "simpleAppDB";

        if (isset($_GET['id'])) {
            $prescriptionId = $_GET['id'];

            // Fetch prescription details from the database using the prescription ID
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $prescriptionQuery = "SELECT * FROM prescriptions WHERE id = $prescriptionId";
            $prescriptionResult = $conn->query($prescriptionQuery);

            if ($prescriptionResult->num_rows > 0) {
                $row = $prescriptionResult->fetch_assoc();
                $patient = $row["patient"];
                $prescription = $row["prescription"];

                echo "<h2>Patient: $patient</h2>";
                echo "<h3>Prescription: $prescription</h3>";

                // Dispense the drugs and show prices and amounts
                echo "<h3>Dispense Drugs:</h3>";
                echo "<form action='process_dispense.php' method='POST'>";
                echo "<input type='hidden' name='prescription_id' value='$prescriptionId'>";

                // Example: Assuming you have a database table named 'drugs' that contains drug information
                // Fetch drugs from the 'drugs' table to display options
                $drugsQuery = "SELECT * FROM drugs";
                $drugsResult = $conn->query($drugsQuery);

                if ($drugsResult->num_rows > 0) {
                    while ($drugRow = $drugsResult->fetch_assoc()) {
                        $drugName = $drugRow['name'];

                        // Display drug options with input fields for prices and amounts
                        echo "<div>";
                        echo "<label>$drugName:</label>";
                        echo "<input type='text' name='prices[$drugName]' placeholder='Price'>";
                        echo "<input type='text' name='amounts[$drugName]' placeholder='Amount'>";
                        echo "</div>";
                    }
                } else {
                    echo "No drugs found.";
                }

                echo "<br>";
                echo "<input type='submit' value='Submit'>";
                echo "</form>";
            } else {
                echo "Prescription not found.";
            }

            $conn->close();
        } else {
            echo "Invalid prescription ID.";
        }
    ?>
</body>
</html>
