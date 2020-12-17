<?php
session_start();
$title="Login Page";
require('include/config.php');
include 'include/header.php';
if (isset($_POST['email'])){
    // removes backslashes
$email = stripslashes($_REQUEST['email']);
    //escapes special characters in a string
$email = mysqli_real_escape_string($con,$email);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
//Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE email='$email'
and password='".md5($password)."'";
$result = mysqli_query($con,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
$r= mysqli_fetch_assoc($result);
    if($rows==1){
 $_SESSION['userID'] = $r['userID'];
        // Redirect user to index.php
 header("Location: index.php");
     }else{
echo "<div class='form'>
<h3>email/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
}
}
?>
<article class="container">
<div class="row">
<h1 class="text-center">Log In</h1>
<form action="" method="post">
<div class="form-group">
    <label for="">Email address</label>
<input type="email" class="form-control" name="email" placeholder="email" required />
</div>
<div class="form-group">
    <label for="">Password</label>
<input type="password" class="form-control" name="password" placeholder="Password" required />
</div>
<input name="submit" type="submit" class="btn btn-primary" value="Login" />
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div>
</article>

</body>
</html>