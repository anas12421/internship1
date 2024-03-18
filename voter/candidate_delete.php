<?php
session_start();
require "./db_connect.php";

$candidate_id = $_GET['candidate_id'];
// $id = $_GET['id'];

$select_status = "SELECT * FROM candidates WHERE id = $candidate_id";
$select_status_res = mysqli_query($db_connect,$select_status);
$select_status_assoc=mysqli_fetch_assoc($select_status_res);

$candidate_photo ="./asset/uploads/candidates_symbol/".$select_status_assoc['photo'] ;
unlink($candidate_photo);

$delete = "DELETE FROM candidates WHERE id = $candidate_id";
mysqli_query($db_connect,$delete);
$_SESSION["delete"] = 'Candidate Delete Success!' ;
header("location:candidate_list.php");
?>