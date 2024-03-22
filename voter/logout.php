<?php
session_start();
require "./db_connect.php";


$id = $_GET['id'];

$number_check = "SELECT * FROM users WHERE id= $id";
$number_check_result = mysqli_query($db_connect, $number_check);
$number_assoc = mysqli_fetch_assoc($number_check_result);

$voter_name = $number_assoc['name'];


$voter_activity = "UPDATE users SET activity = 0 WHERE name ='$voter_name'";
mysqli_query($db_connect, $voter_activity);

session_destroy();
header("location:page-login.php");
?>