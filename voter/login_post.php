<?php
session_start();
require "./db_connect.php";

$name = $_POST["name"];
$phone = $_POST["phone"];


$name_exist = "SELECT COUNT(*) AS total FROM users WHERE name = '$name'";
$name_exist_result = mysqli_query($db_connect, $name_exist);
$name_assoc = mysqli_fetch_assoc($name_exist_result);

$number_check = "SELECT * FROM users WHERE name= '$name'";
$number_check_result = mysqli_query($db_connect, $number_check);
$number_assoc = mysqli_fetch_assoc($number_check_result);

$voter_name = $number_assoc['name'];

  if($name_assoc["total"] == 1){
    if($phone == $number_assoc['phone']){
      $voter_activity = "UPDATE users SET activity = 1 WHERE name ='$voter_name'";
      mysqli_query($db_connect, $voter_activity);
      $_SESSION["login_check"]= '';
      $_SESSION["loged_in"]= '';
      $_SESSION["id"]= $number_assoc["id"];
      header("location:dashboard.php?id=$number_assoc[id]");
    }else{
      $_SESSION["old_name"]= $name;
      $_SESSION["old_number"] = $number;
      $_SESSION["wrong_number"] = "Wrong number";
      header('location:page-login.php');
    }

  }else{
    $_SESSION["old_name"]= $name;
    $_SESSION["old_number"] = $number;
    $_SESSION["name_exist_err"]="Name does not exist or not Registered yet";
    header("location:page-login.php");
  }

?>