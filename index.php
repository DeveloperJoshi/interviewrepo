<?php
$title="Welcome Page";
include "include/auth.php";
require 'include/config.php';
include 'include/header.php';


 $sql="SELECT userID,firstname,lastname,email,picpath,gender from users where userID='".$_SESSION['userID']."'";
$run = mysqli_query($con,$sql) or die(mysqli_error());
$row = mysqli_fetch_assoc($run);

?>

<article class="container">
<section class="row">
<div class="col-md-12">

<p>Welcome <?php echo $row['firstname']; ?>!</p>

<?php 
if(isset($_SESSION['message'])){
?>
<div class="alert alert-success alert-dismissible">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <?php echo $_SESSION['message']?>.
</div>
<?php } 
unset($_SESSION["message"]);
?>
<form  method="post" action="updatedetails.php" >
<div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" name="fname" class="form-control" value="<?php echo @$row['firstname'];?>" id="exampleInputEmail1" placeholder="First Name">
  </div>
  <input type="hidden" name="userid" />
  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" name="lname" class="form-control" value="<?php echo @$row['lastname'];?>" id="exampleInputEmail1" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo @$row['email'];?>" placeholder="Email">
  </div>
  <image class="img-responsive img-thumbnail" src="images/<?php echo @$row['picpath']?>" />
  <label class="radio-inline">
  <input type="radio" name="gender"  value="0" <?php if(@$row['gender']==0){?> checked <?php }?>> Male
</label>
<label class="radio-inline">
  <input type="radio" name="gender"  value="1"  <?php if(@$row['gender']==1){?> checked <?php }?>> Female
</label>
  <input type="submit" class="btn btn-primary">
</form>


</div>
</section>
</article>
<?php
include 'include/footer.php';
?>