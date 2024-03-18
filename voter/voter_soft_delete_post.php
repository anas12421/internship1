<?php
session_start();
require "./db_connect.php";

$voter_id = $_GET['voter_id'];
// $id = $_GET['id'];

$select_status = "SELECT * FROM users WHERE id = $voter_id";
$select_status_res = mysqli_query($db_connect,$select_status);
$select_status_assoc=mysqli_fetch_assoc($select_status_res);

$update ="UPDATE users SET deleted_at = 1 WHERE id=$voter_id";
mysqli_query($db_connect,$update);
$_SESSION["soft_delete"] = 'User Soft Delete Success!' ;
header("location:voter_list.php");
?>