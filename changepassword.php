<?php 

require 'include/auth.php';
$title="Change Password";
require 'include/config.php';
include 'include/header.php';
$select = "SELECT password from users where userID='".$_SESSION['userID']."'";
$run=mysqli_query($con,$select);
$row=mysqli_fetch_assoc($run);

if(isset($_POST)){
  $opassword = md5(@$_POST['opassword']);
  $npassword = md5(@$_POST['npassword']);
  if($opassword==$row['password']){
    if($_POST['npassword'] == @$_POST['cpassword']){
     echo $update = "UPDATE users SET password ='".$npassword."' where userID ='".$_SESSION['userID']."'";
     $run=mysqli_query($con,$update);

      if($run){
        $_SESSION['message']="Password has been changed successfully!";
        header("Location:index.php");
      }
    }
  }else{
    $_SESSION['message']="Enter your correct Old Password man!";
  }
}
?>
<article class="container">
<section class="row">
<div class="col-md-12">
<?php 
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <?php echo $_SESSION['message']?>.
</div>
<?php } ?>

<form  method="post" action="" >
<div class="form-group">
    <label for="exampleInputEmail1">Old Password</label>
    <input type="password" name="opassword"  min="6" class="form-control" placeholder="Old Password">
  </div>
  <input type="hidden" name="userid" />
  <div class="form-group">
    <label for="exampleInputEmail1">New Password</label>
    <input type="password" name="npassword" min="6" class="form-control"  placeholder="New Password">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Confirm Password</label>
    <input type="password" name="cpassword" min="6" class="form-control"  placeholder="Please enter new password again">
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Change Password">
</form>


</div>
</section>
</article>

<?php
include 'include/footer.php';
?>