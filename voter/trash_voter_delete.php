<?php
session_start();
require "./db_connect.php";

$voter_id = $_GET['voter_id'];
// $id = $_GET['id'];

$select_status = "SELECT * FROM users WHERE id = $voter_id";
$select_status_res = mysqli_query($db_connect,$select_status);
$select_status_assoc=mysqli_fetch_assoc($select_status_res);

$voter_photo ="./asset/uploads/users/".$select_status_assoc['photo'] ;
unlink($voter_photo);

$delete = "DELETE FROM users WHERE id = $voter_id";
mysqli_query($db_connect,$delete);
$_SESSION["delete"] = 'Voter Permanent Delete Success!' ;
header("location:voter_soft_delete.php");
?>