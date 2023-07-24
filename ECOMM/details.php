<?php
session_start();
include("inclue/db.php");
include("functions/function.php");
?>

<?php
if (isset($_GET['pro_id'])){
$pro_id=$_GET['pro_id'];
$get_product="select * from products where product_id='$pro_id'";
$run_product=mysqli_query($con,$get_product);
$row_product=mysqli_fetch_array($run_product);
$p_cat_id=$row_product['p_cat_id'];
$p_title=$row_product['product_title'];
$p_price=$row_product['product_price'];
$p_desc=$row_product['product_desc'];
$p_img1=$row_product['product_img1'];
$p_img2=$row_product['product_img2'];
$p_img3=$row_product['product_img3'];
$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
$run_p_cat=mysqli_query($con,$get_p_cat);
$row_p_cat=mysqli_fetch_array($run_p_cat);
$p_cat_id=$row_p_cat['p_cat_id'];
$p_cat_title=$row_p_cat['p_cat_title'];
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
				<li>
					<a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
				</li>
				<li>
					<?php echo "$p_title"; ?>
				</li>
			</ul>
		</div> <!--col-md-12 End-->
		<div class="col-md-3"> <!--col-md-3 Start-->
			<?php
				include("inclue/sidebar.php");
			?>
		</div><!--col-md-3 End-->
		<div class="col-md-9">
			<div class="row" id="product-main"> <!--row START-->
				<div class="col-sm-6"> <!--col-sm-6 START-->
					<div id="main-image">
						<div id="mycarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
								<li data-target="#mycarousel" data-slide-to="1"></li>
								<li data-target="#mycarousel" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner"> <!--carousel-inner Start-->

								<div class="item active">
									<center>
										<img src="Admin_area/product_images/<?php echo $p_img1; ?>" class="img-responsive">
									</center>
								</div>

								<div class="item">
									<center>
										<img src="Admin_area/product_images/<?php echo $p_img2; ?>" class="img-responsive">
									</center>
								</div>

								<div class="item">
									<center>
										<img src="Admin_area/product_images/<?php echo $p_img3; ?>" class="img-responsive">
									</center>
								</div>

							</div> <!--carousel-inner END-->

							<a href="#mycarousel" class="left carousel-control" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
								<span class="sr-only">Previous</span>
							</a>

							<a href="#mycarousel" class="right carousel-control" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
								<span class="sr-only">Next</span>
							</a>

						</div>
					</div>
				</div> <!--col-sm-6 End-->
				<div class="col-sm-6"><!--col-sm-6 START QTY-->
					<div class="box"> <!--BOX Start-->
						<h1 class="text-center">
							<?php echo $p_title; ?>
						</h1>
						<?php
						addCart();
						?>
						<form action="details.php?add_cart=<?php echo $pro_id; ?>" method="post" class="form-horizontal">
							<div class="form-group"> <!--form-group START-->
								<label class="col-md-5 control-label">Product Quantity</label>
								<div class="col-md-7"> <!--col-md-7 START-->
									<select name="prodct_qty" class="form-control">
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div><!--col-md-7 END-->
							</div><!--form-group END-->
							<div class="form-group">
								<label class="col-md-5 control-label">Product Size</label>
								<div class="col-md-7">
									<select name="prodct_size" class="form-control">
										<option>Select a Size</option>
										<option>Small</option>
										<option>Medium</option>
										<option>Large</option>
										<option>Extra-Large</option>
									</select>
								</div>
							</div>
							<p class="price"><?php echo "INR $p_price"; ?></p>
							<p class="text-center buttons">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-shopping-cart">Add to Cart </i>
								</button>
							</p>
						</form>
					</div> <!--BOX END-->
					<div class="col-xs-4">
						<a href="#" class="thumb ">
							<img src="Admin_area/product_images/<?php echo $p_img1; ?>" class="img-responsive">
						</a>
					</div>

					<div class="col-xs-4">
						<a href="#" class="thumb ">
							<img src="Admin_area/product_images/<?php echo $p_img2; ?>" class="img-responsive">
						</a>
					</div>

					<div class="col-xs-4">
						<a href="#" class="thumb ">
							<img src="Admin_area/product_images/<?php echo $p_img3; ?>" class="img-responsive">
						</a>
					</div>

				</div> <!--col-sm-6 END QTY-->
			</div><!--row END-->
			<div class="box" id="details"> <!--Box-details START-->
				<h4>Product Details</h4>
				<p>
					<?php echo $p_desc; ?>
				</p>
				<h4>Size</h4>
				<ul>
					<li>Small</li>
					<li>Medium</li>
					<li>Large</li>
					<li>Extra Large</li>
				</ul>
			</div><!--Box-details END-->
			<div id="row same-height-row"> <!--row same-height-row START-->
				 <div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6 START-->
				 	<div class="box same-height headline"> <!--box same-height headline START-->
				 		<h3 class="text-center">
				 			You may also like these  products
				 		</h3>
				 	</div> <!--box same-height headline END-->
				 </div><!--col-md-3 col-sm-6 END-->
				 
				 <?php
				 $get_products="select * from products order by 1 LIMIT 0,3";
				 $run_products=mysqli_query($con,$get_products);
				 while ($row=mysqli_fetch_array($run_products)) {
				 	$pro_id=$row['product_id'];
				 	$pro_title=$row['product_title'];
				 	$pro_price=$row['product_price'];
				 	$pro_img1=$row['product_img1'];
				 	// $pro_img2=$row['product_img2'];
				 	// $pro_img3=$row['product_img3'];
				 	// $pro_id=$row['product_id'];
				 	echo "
				 	<div class='center-responsive col-md-3 col-sm-6'>
				 	<div class='same-height'>
				 	<a href='details.php?pro_id=$pro_id'>
				 	<img src='Admin_area/admin_images/$pro_img1' class='img-responsive'>
				 	</a>
				 	<div class='text'><h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
				 	<p class='price'>$pro_price</p>
				 	</div>
				 	</div>
				 	</div>
				 	";
				 	// code...
				 }
				 ?>


			</div><!--row same-height-row END-->
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