<?php
session_start();
require "./db_connect.php";

// print_r($_FILES);
// die();

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$nid = $_POST['nid'];
$date = $_POST['date'];
$gender = $_POST['gender'];
$division = $_POST['division'];
$district = $_POST['district'];
$subdistrict = $_POST['subdistrict'];





$photo = $_FILES['image'];
$after_explode =explode('.', $photo['name']);
$extension =end($after_explode);
$allowed_ext =array('jpg','jpeg', 'png', 'gif', 'webp');



$user_exist ="SELECT COUNT(*) AS total FROM users WHERE email = '$email' or name = '$name' or phone = '$phone' or nid = '$nid'";
$user_exist_result =mysqli_query($db_connect, $user_exist);
$user_assoc =mysqli_fetch_assoc($user_exist_result);


$form = false;


  if($user_assoc["total"] == 1) // main if
  {
    $_SESSION['exists'] = 'Email or Name or Phone or NID already exists';
    $_SESSION["old_name"]=$name;
    $_SESSION["old_email"]=$email;
    $_SESSION["old_phone"]=$phone;
    $_SESSION["old_nid"]=$nid;
    $_SESSION["old_date"]=$nid;
    $_SESSION["old_date"]=$date;
    $_SESSION["old_gender"]=$gender;
    $_SESSION["old_division"]=$division;
    $_SESSION["old_district"]=$district;
    $_SESSION["old_subdistrict"]=$subdistrict;
    header('location:page-register.php');
  }
  else{ // main else

  if(!$name){
    $form = true;
    $_SESSION["name_err"]="Please enter a name";
  }else{
    $_SESSION["old_name"]=$name;
  }
  
  if(!$email){
    $form = true;
    $_SESSION["email_err"]="Please enter a valid Email";
  }
  else{
    $_SESSION["old_email"]=$name;
  }

  if(!$phone){
    $form = true;
    $_SESSION["phone_err"]="Please enter a phone number";
  }else{
    $_SESSION["old_phone"]=$phone;
  }

  if(!$nid){
    $form = true;
    $_SESSION["nid_err"]="Please enter a nid number";
  }else{
    $_SESSION["old_nid"]=$nid;
  }

  if(!$date){
    $form = true;
    $_SESSION["date_err"]="Please enter your date of birth";
  }else{
    $_SESSION["old_date"]=$date;
  }

  if(!$gender){
    $form = true;
    $_SESSION["gender_err"]="Please enter your gender";
  }else{
    $_SESSION["old_gender"]=$gender;
  }

  if(!$division){
    $form = true;
    $_SESSION["division_err"]="Please enter your division";
  }else{
    $_SESSION["old_division"]=$division;
  }

  if(!$district){
    $form = true;
    $_SESSION["district_err"]="Please enter your district";
  }else{
    $_SESSION["old_district"]=$district;
  }

  if(!$subdistrict){
    $form = true;
    $_SESSION["subdistrict_err"]="Please enter your subdistrict";
  }else{
    $_SESSION["old_subdistrict"]=$subdistrict;
  }

  if(!$_FILES['image']['name']){
    $form = true;
    $_SESSION["photo_err"]="Please enter your Photo";
  }



  
  
 
  
  
  if($form){
    header("location:page-register.php");
  }
  else{
    $_SESSION["old_name"]='';
    $_SESSION["old_email"]='';
    $_SESSION["old_phone"]='';
    $_SESSION["old_nid"]='';
    $_SESSION["old_date"]='';
    $_SESSION["old_gender"]='';
    $_SESSION["old_division"]='';
    $_SESSION["old_district"]='';
    $_SESSION["old_subdistrict"]='';

    if(in_array($extension, $allowed_ext)){
        $file_name = 'nid'.'-'.$nid.".".$extension;
        $new_location ="./asset/uploads/users/".$file_name ;
        move_uploaded_file($photo['tmp_name'], $new_location);
    }

    $insert = "INSERT INTO users(name, email, phone, nid, date, gender, division, district, subdistrict, photo) VALUES('$name','$email', '$phone','$nid','$date','$gender','$division','$district','$subdistrict', '$file_name')";
    mysqli_query($db_connect, $insert);
    $_SESSION["register_success"]= "Registration Sucess";
    header("location:page-register.php");
  }

 }


?>



