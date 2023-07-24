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
						<?php 
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>My Account</a>";
						}
						else{
							echo "<a href='Customer/Checkout.php?my_order'>My Account</a>";
						}
						?>
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
						<li>
							<a href="shop.php"> SHOP </a>
						</li>
						<li>
						<?php 
						if(!isset($_SESSION['customer_email'])){
							echo "<a href='checkout.php'>My Account</a>";
						}
						else{
							echo "<a href='Customer/Checkout.php?my_order'>My Account</a>";
						}
						?>
						</li>
						<li>
							<a href="cart.php">SHOPPING CART</a>
						</li>
						
						<li>
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

	</div>
	<div class="container" id="slider"><!--id slider-->
		<div class="col-md-12"> <!--col-md-->
			<div class="carousel slide" id="mycarousel" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="mycarousel" data-slide-to="0" class="active"></li>
					<li data-target="mycarousel" data-slide-to="1" ></li>
					<li data-target="mycarousel" daFta-slide-to="2" ></li>
					<li data-target="mycarousel" data-slide-to="3" ></li>
				</ol>
				<div class="carousel-inner"> <!--corousel inner-->
					<?php
					$get_slider="select * from slider LIMIT 0,1";
					$run_slider=mysqli_query($con,$get_slider);
					while ($row=mysqli_fetch_array($run_slider)) {
						$slider_name=$row['slider_name'];
						$slider_image=$row['slider_image'];
						echo "<div class='item active'>
						<img src='Admin_area/slider_images/$slider_image'>
						</div>
						";
					};
					?>

					<?php
					$get_slider="select * from slider LIMIT 1,3";
					$run_slider=mysqli_query($con,$get_slider);
					while ($row=mysqli_fetch_array($run_slider)) {
						$slider_name=$row['slider_name'];
						$slider_image=$row['slider_image'];
						echo "<div class='item'>
						<img src='Admin_area/slider_images/$slider_image'>
						</div>
						";
					};
					?>

				</div><!--corousel inner END-->

				<a href="#mycarousel" class="left carousel-control" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a href="#mycarousel" class="right carousel-control" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div> <!--col-md-->
	</div> <!--id slider-->

	<div id="advantage"> <!--id advntge-->
		<div class="container"> <!--class="container"-->
			<div class="same-height-row"> <!--class="same-height-row"-->

				<div class="col-sm-4"> <!--class="col-sm-4"-->
					<div class="box same-height"> <!--class="box same-height"-->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3><a href="#">BEST Price</a></h3>
						<p>You can Check on all sites about the prices and then compare with us.</p>
					</div><!--class="box same-height"-->
				</div> <!--class="col-sm-4"-->

				<div class="col-sm-4"> <!--class="col-sm-4"-->
					<div class="box same-height"> <!--class="box same-height"-->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3><a href="#">100% Satisfaction Garunteed From us</a></h3>
						<p>Free Delievery and hassle-free returns.</p>
					</div><!--class="box same-height"-->
				</div> <!--class="col-sm-4"-->

				<div class="col-sm-4"> <!--class="col-sm-4"-->
					<div class="box same-height"> <!--class="box same-height"-->
						<div class="icon">
							<i class="fa fa-heart"></i>
						</div>
						<h3><a href="#">We Love Our Customers</a></h3>
						<p>We are Known to provide best possible service.</p>
					</div><!--class="box same-height"-->
				</div> <!--class="col-sm-4"-->

			</div> <!--class="same-height-row"-->
		</div> <!--class="container"-->
	</div> <!--id advntge-->

	<div id="hotboxx"> <!--hotboxx-->
		<div class="box">
			<div class="container">
				<div class="col-md-12">
					<h2>Latest This Week</h2>
				</div>
			</div>
		</div>
	</div><!--hotboxx-->

	<div class="container" id="content">
		<div class="row">
			<?php
			getPro();
			?>
			</div>
			</div><!-- sm-6 END-->

			<!--Footer Start-->

			<?php  
			include("inclue/footer.php");?>

			<!--Footer End-->

		</div>
	</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>