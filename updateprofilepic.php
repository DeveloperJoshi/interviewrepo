<?php
include "include/auth.php";
require 'include/config.php';
$title="Update Pic Page";
include 'include/header.php';

$sql="SELECT picpath from users where userID='".$_SESSION['userID']."'";
$run = mysqli_query($con,$sql) or die(mysqli_error());
$row = mysqli_fetch_assoc($run);
if(isset($_POST)){
    if(isset($_FILES['filetoUpload'])){
        $errors= array();
        $file_name = $_FILES['filetoUpload']['name'];
        $file_size =$_FILES['filetoUpload']['size'];
        $file_tmp =$_FILES['filetoUpload']['tmp_name'];
        $file_type=$_FILES['filetoUpload']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['filetoUpload']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="Please upload a file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"images/".$file_name);
           $update = "UPDATE users SET picpath='".$file_name."' where email='".$_SESSION['userID']."'";
           $run= mysqli_query($con,$update); 
           $_SESSION['message'] = 'Pic has been successfully updated!';
           header("Location:index.php");
           
        }else{
           print_r($errors);
        }
     }
}
?>
<article class="container">
<section class="row">
<div class="col-md-6">


<h1 class="text-center">Update your Pic here.</h1>


<form  method="post" action="" enctype="multipart/form-data">
<div class="form-group col-md-6">
    
    
  
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="filetoUpload" required id="exampleInputFile">
    <p class="help-block"></p>
  </div>

  <input type="submit" class="btn btn-primary">
 
</form>
   


</div>
<div class="col-md-6">
    <image class="img-responsive img-thumbnail" src="images/<?php echo @$row['picpath']?>" />
    </div>
</section>
</article>
<?php
include 'include/footer.php';
?>