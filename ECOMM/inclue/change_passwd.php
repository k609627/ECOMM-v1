<?php
if (isset($_POST['update'])) {
	$c_email=$_SESSION['customer_email'];
	$old_passwd=$_POST['old_password'];
	$new_passwd=$_POST['new_password'];
	$cm_passwd=$_POST['cm_password'];
	$select_cust="select * from customers where customer_email='$c_email' AND customer_pass='$old_passwd'";
	$run_cust=mysqli_query($con,$select_cust);
	$check_old_pass=mysqli_num_rows($run_cust);
	if ($check_old_pass==0) {
		// code...
		echo "<script>alert('Your current password does not match..Try Again')</script>";
		exit();
	}
	if ($new_passwd!=$cm_passwd) {
		echo "<script>alert('Your new password does not match with confirm')</script>";
		exit();
		// code...
	}
	$update_q="update customers set customer_pass='$new_passwd' where customer_email='$c_email'";
	$run_query=mysqli_query($con,$update_q);
	echo "<script>alert('Your password has been saved ')</script>";
	echo "<script>window.open('../Customer/Checkout.php?my_order','_self')</script>";
	exit();
		// code...
	// code...
}
?>

<div class="box">
	<center>
		<h3>Change Your Password</h3>
	</center>
	<form action="" method="post">
	<div class="form-group">
		<label>Enter your current password</label>
		<input type="password" name="old_password" class="form-control">
	</div>
	<div class="form-group">
		<label>Enter New password</label>
		<input type="password" name="new_password" class="form-control">
	</div>
	<div class="form-group">
		<label>Confirm new password</label>
		<input type="password" name="cm_password" class="form-control">
	</div>
	<div class="text-center">
		<button class="btn btn-primary btn-lg" name="update">
			Update Now
		</button>
	</div>
	</form>
</div>