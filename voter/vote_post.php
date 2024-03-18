<?php
session_start();
require "./db_connect.php";

$candidate_id = $_GET['candidate_id'];
$voter_id = $_GET['id'];
$name = $_GET['name'];
$symbol = $_GET['symbol'];
$photo = $_GET['photo'];
$area = $_GET['area'];



$candidate = "SELECT * FROM candidates WHERE id = $candidate_id";
$candidate_result = mysqli_query($db_connect,$candidate);
$candidate_assoc =mysqli_fetch_assoc($candidate_result);


$insert = "INSERT into votes(candidate_id,voter_id,name,symbol,photo,area)VALUES('$candidate_id','$voter_id','$name','$symbol','$photo','$area')";
mysqli_query($db_connect,$insert);

$votes = $candidate_assoc['votes']+1;

$update_vote = "UPDATE candidates SET votes = $votes WHERE id = $candidate_id";
mysqli_query($db_connect,$update_vote);

$update_voter = "UPDATE users SET vote = 1 WHERE id = $voter_id";
mysqli_query($db_connect,$update_voter);


header("location:dashboard.php?id=$voter_id")
?>