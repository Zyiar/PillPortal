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

// Pagination variables
$rowsPerPage = 10;
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;
$startRow = ($currentpage - 1) * $rowsPerPage;

// Fetch total number of rows
$totalRows = $conn->query("SELECT COUNT(*) as count FROM users WHERE userType = '4'")->fetch_assoc()['count'];

// Calculate total number of pages
$totalPages = ceil($totalRows / $rowsPerPage);

// Fetch doctors' data
$sql = "SELECT userName, userEmail, userTel FROM users WHERE userType = '4' LIMIT $startRow, $rowsPerPage";
$results = $conn->query($sql);

// Handle edit functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_user'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_tel = $_POST['user_tel'];

    $update_sql = "UPDATE users SET userName='$user_name', userEmail='$user_email', userTel='$user_tel' WHERE userEmail='$user_email'";
    $conn->query($update_sql);
}

// Handle delete functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $user_email = $_POST['user_email'];

    $delete_sql = "DELETE FROM users WHERE userEmail='$user_email'";
    $conn->query($delete_sql);
 }

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deliveries</title>
    <style>
        td, th {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 50%;
        }
        tr:nth-child(odd) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>Delivery People</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $results->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['userName'] . "</td>";
                echo "<td>" . $row['userEmail'] . "</td>";
                echo "<td>" . $row['userTel'] . "</td>";

                echo "<td>";
                echo "<form method='POST' action='edit.php'>"; // Edit user form
                echo "<input type='hidden' name='user_name' value='" . $row['userName'] . "'>";
                echo "<input type='hidden' name='user_email' value='" . $row['userEmail'] . "'>";
                echo "<input type='hidden' name='user_tel' value='" . $row['userTel'] . "'>";

                echo "<button type='submit' name='edit_user'>Edit</button>";
                echo "</form>";
                echo "</td>";

                echo "<td>";
                echo "<form method='POST' onsubmit='return confirm(\"Are you sure you want to delete this user?\")'>"; // Delete user form
                echo "<input type='hidden' name='user_email' value='" . $row['userEmail'] . "'>";
                echo "<button type='submit' name='delete_user'>Delete</button>";
                echo "</form>";
                echo "</td>";
                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="pagination">
        <?php
        // Previous Page Link
        if ($currentpage > 1) {
            echo '<a href="?page='.($currentpage - 1).'">Previous</a>';
        }

        // Page Links
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentpage) {
                echo '<span class="current">'.$i.'</span>';
            } else {
                echo '<a href="?page='.$i.'">'.$i.'</a>';
            }
        }

        // Next Page Link
        if ($currentpage < $totalPages) {
            echo '<a href="?page='.($currentpage + 1).'">Next</a>';
        }
        ?>
    </div>
</body>
</html>