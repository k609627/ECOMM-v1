
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
						<li >
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
						
						<li class="active">
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
					Contact us
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
						<h2>Contact us</h2>
						<p class="text-muted">If you have any questions,please feel free to contact us,our customer supoort is available to contact 24/7 </p>
					</center>
				</div>
				<form action="contact-us.php" method="post">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Subject</label>
						<input type="text" name="subject" required="" class="form-control">
					</div>

					<div class="form-group">
						<label>Message</label>
							<textarea class="form-control" name="message"></textarea>
					</div>

					<div class="text-center">
						<button type="submit" name="submit" class=" btn btn-primary">
							<i class="fa fa-user-md"> Send Message </i>
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
	$senderName=$_POST['name'];	// code...
	$senderEmail=$_POST['email'];	// code...
	$senderSubject=$_POST['subject'];	// code...
	$senderMessage=$_POST['message'];	// code...
	$recieverEmail="aditya191251015002@gmail.com";
	mail($recieverEmail,$senderName,$senderSubject,$senderMessage,$senderEmail);
	// customer 
	$email=$_POST['email'];
	$subject="Welcome to our website";
	$msg="This is just an dummy email";
	$from="aditya191251015002@gmail.com";
	mail($email, $subject, $msg,$from);
	echo "<h2 align='center'>Your mail has been successfully sent</h2>";
}

?>