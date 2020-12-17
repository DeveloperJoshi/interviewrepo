<?php
include "include/auth.php";
require 'include/config.php';
$email= $_SESSION['email'];

 $sql="SELECT userID,firstname,lastname,email,picpath,gender from users where email='".$_SESSION['email']."'";
$run = mysqli_query($con,$sql) or die(mysqli_error());
$row = mysqli_fetch_assoc($run);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<article class="container">
<section class="row">
<div class="col-md-12">

<p>Welcome <?php echo $_SESSION['email']; ?>!</p>
<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<form  method="post" action="updatedetails.php" >
<div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="fname" class="form-control" value="<?php echo @$row['firstname'];?>" id="exampleInputEmail1" placeholder="First Name">
  </div>
  <input type="hidden" name="userid" />
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="lname" class="form-control" value="<?php echo @$row['lastname'];?>" id="exampleInputEmail1" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo @$row['email'];?>" placeholder="Email">
  </div>
  <image class="img-responsive" src="<?php @$row['picpath']?>" />
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="filetoUpload" id="exampleInputFile">
    <p class="help-block"></p>
  </div>
  <label class="radio-inline">
  <input type="radio" name="gender"  value="0"> Male
</label>
<label class="radio-inline">
  <input type="radio" name="gender"  value="1"> Female
</label>
  <input type="submit" class="btn btn-default">
</form>
<a href="changepassword.php">Change Password</a>
<a href="logout.php">Logout</a>

</div>
</section>
</article>
</body>
</html>