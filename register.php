<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('config.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['fname'])){
        // removes backslashes
 $fname = stripslashes($_REQUEST['fname']);
        //escapes special characters in a string
 $fname = mysqli_real_escape_string($con,$fname); 
 $lname= stripslashes($_REQUEST['lname']);
 $lname = mysqli_real_escape_string($con,$lname); 
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 
        $query = "INSERT into `users` (firstname, lastname ,password, email)
VALUES ('$fname', '$lname', '".md5($password)."', '$email')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
        echo "Error";
    }
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="fname" placeholder="First name" required />
<input type="text" name="lname" placeholder="Last name" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required min="6"/>
<input type="submit" name="submit" value="Register" />
</form>
</div>

</body>
</html>