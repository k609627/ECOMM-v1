<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// session_start();
$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email'";
$run_cust=mysqli_query($con,$get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_email=$row_cust['customer_email'];
// $customer_id=$row_cust['customer_country'];
$customer_city=$row_cust['customer_city'];
$customer_contact=$row_cust['customer_contact'];
$customer_address=$row_cust['customer_address'];
$customer_img=$row_cust['customer_image'];
// $customer_id=$row_cust['customer_image'];
?>

<div class="box">
	<form action="" method="POST" enctype="multipart/form-data">
	<center>
		<h1>Edit your Account</h1>
	</center>
	
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="c_Name" required="" value="<?php echo "$customer_name"; ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Customer Email</label>
			<input type="text" name="c_Email" required="" value="<?php echo "$customer_email"; ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Address</label>
			<input type="text" name="c_addr" required="" value="<?php echo "$customer_address"; ?>" class="form-control">
		</div>					

		<div class="form-group">
			<label>City</label>
			<input type="text" name="c_city" required="" value="<?php echo "$customer_city"; ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>CONTACT Number</label>
			<input type="Number" name="c_number" required="" value="<?php echo "$customer_contact"; ?>" class="form-control">
		</div>

		<div class="form-group">
			<label>Image</label>
			<input type="file" name="c_image" required="" class="form-control">
			<img src="../Customer/images/<?php echo "$customer_img"; ?>" class="img-responsive" height="100" width="100">
		</div>

		<div class="text-center">
			<button type="submit" name="submit" class=" btn btn-primary">
				<i class="fa fa-user-md"> Update </i>
			</button>
			
		</div>
</form>

</div>

<?php
if (isset($_POST['submit'])) {
	$update_id=$customer_id;
	$c_name=$_POST['c_Name'];
	$c_email=$_POST['c_Email'];
	$c_addr=$_POST['c_addr'];
	$c_city=$_POST['c_city'];
	$c_contact_number=$_POST['c_number'];
	$c_image=$_FILES['c_image']['name'];
	$c_image_temp=$_FILES['c_image']['tmp_name'];

	move_uploaded_file($c_image_temp,"../Admin_area/admin_images/USER_pic/$c_image");
	$update_customer="update customers set customer_name='$c_name',customer_email='$c_email',customer_address='$c_addr',customer_city='$c_city',customer_contact='$c_contact_number',customer_image='$c_image' where customer_id='$update_id'";

	$run_customer=mysqli_query($con,$update_customer);
	if ($run_customer) {
		echo "<script>alert('Your Details updated.')</script>";
		echo "<script>window.open('../logout.php','_self')</script>";
	}
	// code...
}
?>
