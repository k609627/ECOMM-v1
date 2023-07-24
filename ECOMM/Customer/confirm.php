<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
	echo "<script>window.open('../checkout.php','_self')</script>";
}
else{
include("inclue/db.php");
include("functions/function.php");

if (isset($_GET['order_id'])) {
	$order_id=$_GET['order_id'];
	// code...
}
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
					Welcome Guest
				</a>
				<a href="#"> Shopping Cart Total Price: INR 100,Total Items: 2</a>
			</div><!-- col-md-6 offer (END)-->
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="../customer_registration.php">  Register</a>
					</li>
					<li>
						<a href="Checkout.php">  My Account</a>
					</li>
					<li> 
						<a href="../Cart.php">  Goto Cart</a>
					</li>
					<li>
						<a href="../Login.php">  Login</a>
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
						<li >
							<a href="../index.php"> HOME </a>
						</li>
						<li >
							<a href="../shop.php"> SHOP </a>
						</li>
						<li class="active">
							<a href="Checkout.php">MY ACCOUNT</a>
						</li>
						<li>
							<a href="../cart.php">SHOPPING CART</a>
						</li>
						
						<li>
							<a href="../contact-us.php">CONTACT US</a>
						</li>
					</ul>
				</div>
				<a href="cart.php" class="btn btn-primary navbar-btn right" >
				<i class="fa fa-shopping-cart"></i>
				<span> 4 items in Cart</span>
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
					<a href="Checkout.php">My Account</a>
				</li>
				<li>
					My account
				</li>
			</ul>
		</div> <!--col-md-12 End-->
		<div class="col-md-3"> <!--col-md-3 Start-->
			<?php
				include("../inclue/sidebar001.php");
			?>
		</div><!--col-md-3 End-->
		</div>
		<div class="col-md-9">
			<div class="box">
				<h1 align="center">Please Confirm your Payment</h1>
				<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Invoice Number</label>
						<input type="text" class="form-control" name="invoice_number" required="">
					</div>

					<div class="form-group">
						<label>Amount</label>
						<input type="text" class="form-control" name="amount" required="">
					</div>

					<div class="form-group">
						<label>Select Payment mode</label>
						<select class="form-control" name="payment_mode">
							<option>Bank Transfer</option>
							<option>Paypal</option>
							<option>UPI</option>
							<option>PayUmoney</option>
						</select>
					</div>


					<div class="form-group">
						<label>Transaction Number</label>
						<input type="text" class="form-control" name="transaction_number" required="">
					</div>


					<div class="form-group">
						<label>Payment Date</label>
						<input type="date" class="form-control" name="payment_date" required="">
					</div>

					<div class="text-center">
						<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Confirm Payment</button>
						
					</div>

				</form>

				<?php 
				if (isset($_POST['confirm_payment'])) {
					$update_id=$_GET['update_id'];
					$invoice_number=$_POST['invoice_number'];
					$amount=$_POST['amount'];
					$payment_mode=$_POST['payment_mode'];
					$transaction_number=$_POST['transaction_number'];
					$payment_date=$_POST['payment_date'];
					$complete="complete";
					$insert="insert into payments (invoice_id,invoice_amount,payment_mode,ref_no,payment_date) values ('$invoice_number','$amount','$payment_mode','$transaction_number','$payment_date')";
					$run_insert=mysqli_query($con,$insert);
					$update_q="update customer_order set order_status='$complete' where order_id='$update_id'";
					$run_update=mysqli_query($con,$update_q);
					$pending_order="update pending_order set order_status='$complete' where order_id='$update_id'";
					$run_pending_order=mysqli_query($con,$pending_order);
					echo "<script> alert('your order has been recieved') </script>";
					echo "<script>window.open('Checkout.php?my_order','_self')</script>";
				}
				?>


			</div>
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
<?php } ?>