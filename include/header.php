
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title><?php echo @$title;?> <?php echo $title;?></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Interview Project</a>
    </div>
  
    <ul class="nav navbar-nav navbar-right">
    <?php if(!isset($_SESSION['userID'])){?>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    <?php }?>
    <?php if(isset($_SESSION['userID'])){
        
        
        ?>
         <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>  
        <li><a href="updateprofilepic.php"><span class="glyphicon glyphicon-user"></span> Change Profile Pic</a></li>  
      <li><a href="changepassword.php"><span class="glyphicon glyphicon-user"></span> Change Password</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
    </ul>
    <?php }?>

  </div>
</nav>