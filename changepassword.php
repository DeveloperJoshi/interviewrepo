<?php
include "include/auth.php";
require 'include/config.php';
$email= $_SESSION['email'];
$select = "SELECT password from users where email='".$email."'";
$query= mysqli_query($conn,$select);
$row= mysqli_fetch_assoc($query);
if(isset($_POST['submit'])){
    if ($_POST["oldpassword"] == $row["password"]) {
        if($_POST['newpassword'] == $_POST['confirmpassword']){
            mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE userId='" . $_SESSION["userId"] . "'");
                $message = "Password Changed! You need to login again!";
                session_destroy();
        }
        
    } else
        $message = "Current Password is not correct";
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home: Change password</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<article class="container">
<section class="row">
<div class="col-md-12">

<p>Welcome <?php echo $_SESSION['email']; ?>!</p>
<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<form  method="post" action="" >
<div class="form-group">
    <label for="exampleInputEmail1">OLd Password</label>
    <input type="oldpassword" class="form-control" value="<?php echo @$row['firstname'];?>" id="exampleInputEmail1" placeholder="Old Password">
  </div>
  <input type="hidden" name="userid" />
  <div class="form-group">
    <label for="exampleInputEmail1">New Password</label>
    <input type="password" class="form-control" value="<?php echo @$row['lastname'];?>" id="exampleInputEmail1"  placeholder="New Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1"  placeholder="Confirm Password">
  </div>
</form>
<a href="index.php">Change User details</a>
<a href="logout.php">Logout</a>

</div>
</section>
</article>
</body>
</html>