<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    <style>
        td {
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
        tr {
          height: 40px;
        }
        .logout-btn {
          border-radius: 10px;
          padding: 0.5em;
          margin-top: 20px;
        }
    </style>
  </style>
</head>
<body>
  <h1>Welcome, Admin!</h1>
  <table>
    <tr>
      <td>Doctors</td>
      <td><a href="docTable.php">View</a></td>
    </tr>
    <tr>
      <td>Patients</td>
      <td><a href="patTable.php">View</a></td>
    </tr>
    <tr>
      <td>Delivery People</td>
      <td><a href="delTable.php">View</a></td>
    </tr>
  </table>

<form action="logout.php" method="post">
   <input type="submit" value="Log Out" class="logout-btn">
</form>

</body>
</html>