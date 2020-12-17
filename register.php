
<?php
$title="Register Page";
include 'include/header.php';
require('include/config.php');
// If form submitted, insert values into the database.
if (isset($_POST['fname'])){
    if($_POST['password']!=$_POST['cpassword']){
?>
    <script>alert("Password should match bro!")</script>
<?php
    }else{
        // removes backslashes
 $fname = stripslashes($_POST['fname']);
        //escapes special characters in a string
 $fname = mysqli_real_escape_string($con,$fname); 
 $lname= stripslashes($_POST['lname']);
 $lname = mysqli_real_escape_string($con,$lname); 
 $email = stripslashes($_POST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_POST['password']);
 $password = mysqli_real_escape_string($con,$password);
 
        $query = "INSERT into `users` (firstname, lastname ,password, email)
VALUES ('$fname', '$lname', '".md5($password)."', '$email')";
        $result = mysqli_query($con,$query);
        if($result){ ?>
        <script>
          alert("You have successfully been registered!Login Now");
          </script>
        <?php 
        header("Location:login.php");
        }else{ ?>
        <script>
            alert("Registration failed!");
            </script>
     <?php   } 
    }
}
    ?>
    

<article class="container">
<div class="row">
<h1>Registration</h1>
<form action="" method="post">
<div class="form-group">
    <label for="Firstname">First Name</label>
<input type="text" name="fname" class="form-control" placeholder="First name" required />
</div>
<div class="form-group">
    <label for="Lastname">Last Name</label>
<input type="text" name="lname" class="form-control" placeholder="Last name" required />
</div>
<div class="form-group">
    <label for="Email">Email</label>
<input type="email" name="email" class="form-control" placeholder="Email" required />
</div>
<div class="form-group">
    <label for="Lastname">Password</label>
<input type="password" name="password" class="form-control" placeholder="Password" required min="6"/>
</div>
<div class="form-group">
    <label for="confirmpassword">Confirm Password</label>
<input type="password" name="cpassword" class="form-control" placeholder="Password" required min="6"/>
</div>
<div class="form-group">
    <div class=" col-sm-12">
      <div class="checkbox">
        <label>
          <a href="login.php"> Have a account? Login here
        </label>
      </div>
    </div>
  </div>
<input type="submit" name="submit" class="btn btn-primary" value="Register" />
</form>
</div>

</article>
<?php
include_once 'include/footer.php';
?>