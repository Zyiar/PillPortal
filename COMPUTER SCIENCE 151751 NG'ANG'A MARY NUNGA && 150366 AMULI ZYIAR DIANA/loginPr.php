<?php
session_start();
require("sqlFunctions.php");
connect();
$userEmail = $_POST["userEmail"];
$userPassword = md5($_POST["userPassword"]);
$sql = "SELECT userName,userPassword, userType FROM users
WHERE userEmail = '$userEmail'";
$rowData = getData($sql);
$arr_length = count($rowData);
if($arr_length == 0){
?>
<script>
alert("You have not yet registered");
window.location.replace("register.php");
</script>
<?php
}
else{
if($userPassword == $rowData[0]["userPassword"]){
//Create Session variable
$_SESSION["userName"] = $rowData[0]["userName"];
$_SESSION["userType"] = $rowData[0]["userType"];

    $userType = $_SESSION["userType"];
        if ($userType == "1") { // 1 for doctor
            // Redirect doctors to doctor-welcome.php
            header("Location: doctor_page.php");
        } elseif ($userType == "2") { // 2 for patient
            // Redirect patients to patient-welcome.php
            header("Location: patient_page.php");
        } elseif ($userType == "3") { // 3 for admin
            // Redirect admins to admin_page.php
            header("Location: admin_page.php");
        } elseif ($userType == "4") { // 4 for delivery person
            // Redirect delivery people to delivery_page.php
            header("Location: delivery_page.php");
        } elseif ($userType == "5") {
            // Redirect to pharamcist_page.php
            header("Location: pharmacist_page.php");
        }
} 
else{
?>
<script>
alert("Wrong Password. Try again!");
window.location.replace("login.php");
</script>
<?php
}
}
?>