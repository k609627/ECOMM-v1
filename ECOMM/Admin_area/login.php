<?php 
session_start();
include("../inclue/db.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container"> <!-- container Strt -->
	<form class="form-login" action="" method="post"> <!-- Form-login Strt -->
		<h2 class="form-login-heading">Admin Login</h2>
		<input type="text" class="form-control" name="admin-email" placeholder="Email Address" required>

		<input type="password" class="form-control" name="admin-pass" placeholder="Password" required>

		<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin-login"> Login </button>

		<h4 class="forgot-password">
			<a href="forgot-password.php">Forgot Password</a>
		</h4>
	</form><!-- Form-login End -->
</div>

</body>
</html>

<?php 
if(isset($_POST['admin-login'])){
	$admin_email= mysqli_real_escape_string($con,$_POST['admin-email']);
	$admin_pass= mysqli_real_escape_string($con,$_POST['admin-pass']);

	$get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
	$run_admin=mysqli_query($con,$get_admin);
	$count=mysqli_num_rows($run_admin);
	if($count==1){
		$_SESSION['admin-email']=$admin_email;
		echo "<script>alert('You are logged in')</script>";
		echo "<script>window.open('admin_panel.php?dashboard','_self')</script>";
	}
	else{
		echo "<script>('Email or password is wrong')</script>";
	}
	}

?>