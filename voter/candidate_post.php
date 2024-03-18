<?php
session_start();
require "./db_connect.php";

$name = $_POST['name'];
$symbol = $_POST['symbol'];
$area = $_POST['area'];

$photo = $_FILES['photo'];
$after_explode =explode('.', $photo['name']);
$extension =end($after_explode);
$allowed_ext =array('jpg','jpeg', 'png', 'gif', 'webp');

$form = false;

if(!$name){
  $form = true;
  $_SESSION["name_err"]="Please enter candidate name";
}else{
  $_SESSION["old_name"]=$name;
}

if(!$symbol){
  $form = true;
  $_SESSION["symbol_err"]="Please enter symbol name";
}else{
  $_SESSION["old_symbol"]=$symbol;
}
if(!$area){
  $form = true;
  $_SESSION["area_err"]="Please enter area name";
}else{
  $_SESSION["old_area"]=$area;
}
if(!$_FILES['photo']['name']){
  $form = true;
  $_SESSION["photo_err"]="Please enter Symbol Photo";
}


if($form){
  header("location:candidate_list.php");
}
else{
  $_SESSION["old_name"]='';
  $_SESSION["old_symbol"]='';
  $_SESSION["old_area"]='';

  if(in_array($extension, $allowed_ext)){
    $remove = array("@", "#" , "(", ")", '"' ,":","*", "'", "/" , " ") ;
    $file_name = str_replace($remove, '-',$name).".".$extension;
    $new_location ="./asset/uploads/candidates_symbol/".$file_name ;
    move_uploaded_file($photo['tmp_name'], $new_location);
}

  $insert = "INSERT INTO candidates(name,symbol,photo,area) VALUES('$name','$symbol',  '$file_name', '$area')";
  mysqli_query($db_connect, $insert);
  $_SESSION["register_success"]= "Registration Sucess";
  header("location:candidate_list.php");

}




?>