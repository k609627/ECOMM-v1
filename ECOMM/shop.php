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
						<li class="active">
							<a href="shop.php"> SHOP </a>
						</li>
						<li>
							<a href="Customer/Checkout.php">MY ACCOUNT</a>
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

<div id="content">
	<div class="container">
		<div class="col-md-12"> <!--col-md-12 Start-->
			<ul class="breadcrumb">
				<li>
					<a href="home.php">Home</a>
				</li>
				<li>
					Shop
				</li>
			</ul>
		</div> <!--col-md-12 End-->
		<div class="col-md-3"> <!--col-md-3 Start-->
			<?php
				include("inclue/sidebar.php");
			?>
		</div><!--col-md-3 End-->
		<div class="col-md-9"><!--col-md-9 Start-->
			<?php
			if(!isset($_GET['p_cat'])){
				if(!isset($_GET['cat_id'])){
					echo "<div class='box'>
					<h1>Shop</h1>
					<p>Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the i ndustry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised 	in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
					</p>
					</div>";
				}
				
			}
			?>
			<div class="row"> <!--row-start-->
				<?php
				if(!isset($_GET['p_cat'])){
					if(!isset($_GET['cat_id'])){
						$per_page=6;
						if(isset($_GET['page'])){
							$page=$_GET['page'];
						}else{
							$page=1;
						}
						$start_from=($page-1) * $per_page;
						$get_products="select * from products order by 1 DESC LIMIT $start_from, $per_page";
						$run_pro=mysqli_query($con,$get_products);
						while ($row=mysqli_fetch_array($run_pro)) {
							$pro_id=$row['product_id'];
							$pro_title=$row['product_title'];
							$pro_price=$row['product_price'];
							$pro_img1=$row['product_img1'];
							echo "

							<div class='col-md-4 col-sm-6 center-responsive'>
							<div class='products'>
							<a href='details.php?pro_id=$pro_id'>
							<img src='Admin_area/admin_images/$pro_img1' class='img-responsive'>
							</a>
							<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'>INR $pro_price</p>
							<p class='buttons'>
							<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
							<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'> </i> Add to cart</a>
							</p>
							</div>

							</div>
							</div>

							";
							// code...
						}

				?>
			</div> <!--row-End-->

			<center>
				<ul class="pagination">
					<?php

					$query="select * from products";
					$result=mysqli_query($con,$query);
					$total_record=mysqli_num_rows($result);
					$total_pages=ceil($total_record / $per_page);
					echo "
					<li><a href='shop.php?page=1'>".'First Page'."</a></li>
					";
					for ($i=1; $i<=$total_pages;$i++){
						echo "
						<li><a href='shop.php?page=".$i."'>".$i."</a></li>
						";	
						// code...
					};
					echo "
					<li><a href='shop.php?page=$total_pages'>".'Last Page'."</a></li>
					";

					}
				}
					?>
				</ul>
			</center>

			<!-- <div class="box"> -->
				<?php
				getPcatPro();
				getCatPro();
				?>
			<!-- </div> -->



		</div><!--col-md-9 End-->
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
