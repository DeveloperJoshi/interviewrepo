<?php
require 'include/config.php';
$update = "UPDATE users SET firstname='".$_POST['fname']."',lastname='".$_POST['lname']."',email='".$_POST['email']."',gender='".$_POST['gender']."',picpath='".$target_file ."'";
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["filetoUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     $check = getimagesize($_FILES["filetoUpload"]["tmp_name"]);
     if($check !== false) {
       echo "File is an image - " . $check["mime"] . ".";
       $uploadOk = 1;
     } else {
       echo "File is not an image.";
       $uploadOk = 0;
     }
   }
   
   
   if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
     $uploadOk = 0;
   }
   
   
   if ($_FILES["fileToUpload"]["size"] > 500000) {
     echo "Sorry, your file is too large.";
     $uploadOk = 0;
   }
   
   
   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
   && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
   }
   
   
   if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
   
   } else {
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
     } else {
       echo "Sorry, there was an error uploading your file.";
     }
$query = mysqli_query($con,$update);
header('Location: index.php');


?>