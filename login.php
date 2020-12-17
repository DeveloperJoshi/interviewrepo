<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('include/config.php');
session_start();

if (isset($_POST['email'])){
    // removes backslashes
$email = stripslashes($_REQUEST['email']);
    //escapes special characters in a string
$email = mysqli_real_escape_string($con,$email);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
//Checking is user existing in the database or not
  echo  $query = "SELECT * FROM `users` WHERE email='$email'
and password='".md5($password)."'";
$result = mysqli_query($con,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
    if($rows==1){
 $_SESSION['email'] = $email;
        // Redirect user to index.php
 header("Location: index.php");
     }else{
echo "<div class='form'>
<h3>email/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
}
}
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post">
<input type="email" name="email" placeholder="email" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div>

</body>
</html>