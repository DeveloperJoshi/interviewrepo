<?php
require 'include/auth.php';
require 'include/config.php';
$update = "UPDATE users SET firstname='".$_POST['fname']."',lastname='".$_POST['lname']."',email='".$_POST['email']."',gender='".$_POST['gender']."' where userID='".$_SESSION["userID"]."'";

$query = mysqli_query($con,$update);
$_SESSION['message']="Update was successful";
header('Location: index.php');


?>