<?php
session_start();
include("inclue/db.php");
include("functions/function.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-KART</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<div id ="top"> <!-- top -->

		<div class="container"><!-- Bootstrap div -->
			
			<div class="col-md-6 offer"><!-- col-md-6 offer-->
				<a href="#" class="btn btn-success btn-sm">
					<?php
					if(!isset($_SESSION['customer_email'])){
						echo "Welcome Guest";
					}
					else{
						echo "Welcome: " .$_SESSION['customer_email'] . "";
					}

					?>
				</a>
				<a href="#"> Cart Total Price: INR <?php totalPrice(); ?>,Total Items: <?php item(); ?></a>
			</div><!-- col-md-6 offer (END)-->
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="customer_registration.php">  Register</a>
					</li>
					<li>
						<a href="Customer/Checkout.php">  My Account</a>
					</li>
					<li> 
						<a href="Cart.php">  Goto Cart</a>
					</li>
					<li>
						<?php
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>Login</a>";
						}
						else{
							echo "<a href='logout.php'>Logout</a>";
						}
						?>
					</li>
				</ul>

			</div>

		</div><!-- Bootstrap div (END)-->

	</div><!-- top (END)-->
	<div class="navbar navbar-default" id="navbar">

		<div class="container">

			<div class="navbar-header">

				<a class="navbar-brand home" href="index.php">
				<img src="images/sign.png" alt="Alpha" class="hidden-xs" width="135" height="60">
				<img src="images/alp.png" alt="Alpha" class="visible-xs"  width="55" height="55">
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only"> Toggle-Navigation</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
					<span class="sr-only"></span>
					<i class="fa fa-search"></i>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navigation">
				<div class="padding-nav">
					<ul class="nav navbar-nav navbar-left">
						<li class="active">
							<a href="index.php"> HOME </a>
						</li>
						<li >
							<a href="shop.php"> SHOP </a>
						</li>
						<li>
							<a href="Customer/Checkout.php">MY ACCOUNT</a>
						</li>
						<li>
							<a href="cart.php">SHOPPING CART</a>
						</li>
						
						<li >
							<a href="contact-us.php">CONTACT US</a>
						</li>
					</ul>
				</div>
				<a href="cart.php" class="btn btn-primary navbar-btn right" >
				<i class="fa fa-shopping-cart"></i>
				<span> <?php item(); ?> items in Cart</span>
				</a>
				<div class="navbar-collapse collapse right">
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle-search</span>
						<i class="fa fa-search"> </i>
					</button>
				</div>

				<div class="collapse clearfix" id="search">
					<form class="navbar-form" method="get" action="result.php">
						<div class="input-group">
							<input type="text" name="user_query" placeholder="Search" class="form-control" required="">
							<span class="input-group-btn">
								<button type="submit" value="Search" name="search" class="btn btn-primary">
									<i class="fa fa-search"> </i>
								</button>
							</span>
						</div>
					</form>
					
				</div>
			</div>
		</div>

<div id="content">
	<div class="container">
		<div class="col-md-12"> <!--col-md-12 Start-->
			<ul class="breadcrumb">
				<li>
					<a href="home.php">Home</a>
				</li>
				<li>
					Customer Registration
				</li>
			</ul>
		</div> <!--col-md-12 End-->
		<div class="col-md-3"> <!--col-md-3 Start-->
			<?php
				include("inclue/sidebar.php");
			?>
		</div><!--col-md-3 End-->
		<div class="col-md-9">	<!--col-md-9 Start-->
			<div class="box">
				<div class="box-header">
					<center>
						<h2>Registartion</h2>
					</center>
				</div>
				<form action="customer_registration.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="c_Name" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Customer Email</label>
						<input type="text" name="c_Email" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Customer Password</label>
						<input type="password" name="c_password" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Country</label>
						<input type="text" name="c_country" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Address</label>
						<input type="text" name="c_addr" required="" class="form-control">
					</div>					

					<div class="form-group">
						<label>City</label>
						<input type="text" name="c_city" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>CONTACT Number</label>
						<input type="Number" name="c_number" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Image</label>
						<input type="file" name="c_image" required="" class="form-control">
					</div>

					<div class="text-center">
						<button type="submit" name="submit" class=" btn btn-primary">
							<i class="fa fa-user-md"> Register </i>
						</button>
					</div>

				</form>
			</div>
		</div>	<!--col-md-3 END-->
</div>
	
</div>

			<!--Footer Start-->

			<?php  
			include("inclue/footer.php");?>

			<!--Footer End-->

		</div>
	</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
<?php
if (isset($_POST['submit'])) {
	$c_name=$_POST['c_Name'];
	$c_email=$_POST['c_Email'];
	$c_pass=$_POST['c_password'];
	$c_cntry=$_POST['c_country'];
	$c_addr=$_POST['c_addr'];
	$c_city=$_POST['c_city'];
	$c_number=$_POST['c_number'];
	$c_img=$_FILES['c_image']['name'];
	$c_tmp_image=$_FILES['c_image']['tmp_name'];
	$c_ip=getUserIP();
	move_uploaded_file($c_tmp_image,"Admin_area/admin_images/USER_pic/$c_img");

	$insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_pass','$c_cntry','$c_city','$c_number','$c_addr','$c_img','$c_ip')";
	// code...
	$run_customer=mysqli_query($con,$insert_customer);





	$sel_cart="select * from cart where ip_add='$c_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	if ($check_cart>0) {
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('You Have been Registered Sucessfully')</script>";
		echo "<script>window.open('Customer/payment.php','_self')</script>";

		// code...
	}
	else{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('You Have been Registered Sucessfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";		
	}
}
?>