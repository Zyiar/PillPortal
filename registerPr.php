<?php
require("sqlFunctions.php");
session_start();
$name = $_POST["name"];
$userEmail = $_POST["userEmail"];
$userPassword = md5($_POST["userPassword"]);
$userType = $_POST["userType"];
$userTel = $_POST["userTel"];
echo($userType);
//Assigning session variables
$_SESSION["userEmail"] = $userEmail;
$_SESSION["userType"] = $userType;
$sql = "INSERT INTO users (userEmail, userPassword, userName, userType, userTel)
VALUES('$userEmail', '$userPassword', '$name', '$userType', '$userTel')";
setData($sql);
//Redirect to login.php
header("Location:login.php");
?>