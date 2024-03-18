<?php
session_start();
require "./db_connect.php";

$voter_id = $_POST['voter_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$nid = $_POST['nid'];
$date = $_POST['date'];
$gender = $_POST['gender'];
$division = $_POST['division'];
$district = $_POST['district'];
$subdistrict = $_POST['subdistrict'];
$photo = $_FILES['photo'];




$select_status = "SELECT * FROM users WHERE id = $voter_id";
$select_status_res = mysqli_query($db_connect,$select_status);
$select_status_assoc=mysqli_fetch_assoc($select_status_res);


if(!$_FILES['photo']['name']){

  $update = "UPDATE users SET name = '$name' , email = '$email' , phone = '$phone' , nid = '$nid' , date = '$date' , gender= '$gender' , division = '$division' , district = '$district', subdistrict = '$subdistrict'  WHERE id = $voter_id";
  mysqli_query($db_connect, $update);
  $_SESSION["update"]="Voter Info Updated ";
  header("location:edit_voter.php?voter_id=$voter_id");
}
else{

  $voter_photo ="./asset/uploads/users/".$select_status_assoc['photo'] ;
  unlink($voter_photo);

  $after_explode =explode('.', $photo['name']);
  $extension =end($after_explode);
  $allowed_ext =array('jpg','jpeg', 'png', 'gif', 'webp');

  if(in_array($extension, $allowed_ext)){
    $file_name = 'nid'.'-'.$nid.".".$extension;
    $new_location ="./asset/uploads/users/".$file_name ;
    move_uploaded_file($photo['tmp_name'], $new_location);
  }

  $update = "UPDATE users SET name = '$name' , email = '$email' , phone = '$phone' , nid = '$nid' , date = '$date' , gender= '$gender' , division = '$division' , district = '$district', subdistrict = '$subdistrict', photo = '$file_name'  WHERE id = $voter_id";
  mysqli_query($db_connect, $update);
  $_SESSION["update"]="Voter Info Updated ";
  header("location:edit_voter.php?voter_id=$voter_id");
}
?>