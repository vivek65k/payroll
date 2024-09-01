
<?php
session_start();
include('db/config.php');
$error="";
if(isset($_POST['login'])){
	echo $username=$_POST['username'];
	 echo $password= md5($_POST['password']);

	$query=  mysqli_query($conn,"select * from admin where username='".$username."'  and password='".$password."'");
	$run= mysqli_num_rows($query);
	if($run>0){
		$_SESSION['username']=$username;
        header('location:dashboard.php');
	}else{
		$error="Username or Password went wrong";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login page</title>
	<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container">
  	
  <div style="border:1px solid gray; width: 50%;box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px; margin-left: 18%; margin-top: 5%; padding: 10px; align-content: center;">
  	<center><h2>Login Now</h2></center>
  	   <form action="index.php" method="post">
  	   	  <div class="form-group">
  	   	  	<label>Username</label>
  	   	  	<input type="text" name="username"  class="form-control" />
  	   	  </div>
  	   	  <div class="form-group">
  	   	  	<label>Password</label>
  	   	  	<input type="password" name="password"  class="form-control" />
  	   	  </div>
  	   	  <br>
  	   	   <div class="form-group">
  	   	  	
  	   	  	<center><input type="submit" name="login"  class="btn btn-primary" value="Login" /></center>
  	   	  </div>
  	   	  <h3> <?php echo  $error; ?></h3>
  	   </form>

  </div>
  </div>
</body>
</html>
