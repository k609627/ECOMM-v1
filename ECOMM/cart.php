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
						<li>
							<a href="shop.php"> SHOP </a>
						</li>
						<li>
							<a href="Customer/Checkout.php">MY ACCOUNT</a>
						</li>
						<li  class="active">
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
					CART
				</li>
			</ul>
		</div> <!--col-md-12 End-->
		<div class="col-md-9" id="cart">
			<div class="box">
				<form action="cart.php" method="post" enctype="multipart-form-data">

					<h1>Shopping-cart</h1>

					<?php
					$ip_add=getUserIP();
					$select_cart="select * from cart where ip_add='$ip_add'";
					$run_cart=mysqli_query($con,$select_cart);
					$count=mysqli_num_rows($run_cart);


					?>


					<p class="text-muted">Currently You have 3 item in your cart</p>
					<div class="table-responsive"> <!--table-responsive START-->
						<table class="table"> 
							<thead>
								<tr>
									<th colspan="2">Product</th>
									<th>Quantity</th>
									<th>Unit-Price</th>
									<th>Size</th>
									<th colspan="1">Delete</th>
									<th colspan="1">Subtotal</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$total=0;
								while ($row=mysqli_fetch_array($run_cart)) {
									$pro_id=$row['p_id'];
									$pro_size=$row['size'];
									$pro_qty=$row['qty'];
									$get_product="select * from products where product_id='$pro_id'";
									$run_pro=mysqli_query($con,$get_product);

									while ($row=mysqli_fetch_array($run_pro)) {
										$p_title=$row['product_title'];
										$p_img1=$row['product_img1'];
										$p_price=$row['product_price'];
										$sub_total=$row['product_price']*$pro_qty;
										$total+=$sub_total;
									
								?>
								<tr>
									<td>
										<img src="Admin_area/product_images/<?php echo $p_img1; ?>" class="img-responsive">
										<td><?php echo $p_title; ?></td>
										<td><?php echo $pro_qty; ?></td>
										<td><?php echo $p_price; ?></td>
										<td><?php echo $pro_size; ?></td>
										<td><input type="checkbox" name="remove[]"value="<?php echo $pro_id; ?>" ></td>
										<td>INR <?php echo $sub_total; ?></td>
									</td>
								</tr>
							<?php }} ?>
								
						</table>
					</div> <!--table-responsive START-->


					<div class="box-footer">
						<div class="pull-left"> <!--Pull Left START-->
							<h4>Total Price</h4>

						</div> <!--Pull Left END-->
						<div class="pull-right"> <!--Pull Left START-->
							<h4>INR <?php echo $total; ?></h4>							
						</div> <!--Pull Left END-->
					</div>

<!-- NOTHEINGKBH -->
					<div class="box-footer">
						<div class="pull-left"> <!--Pull Left START-->
							<a href="index.php" class="btn btn-default">
								<i class="fa fa-chevron-left">Continue Shopping</i>
							</a>
						</div> <!--Pull Left END-->
						<div class="pull-right"> <!--Pull Left START-->
							<button class="btn btn-default" type="submit" name="update" value="Update Cart">
								<i class="fa fa-refresh">Update Cart</i>
							</button>
							<a href="checkout.php" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i> </a>
						</div> <!--Pull Left END-->
					</div>
				</form>
			</div>

			<?php
			function update_cart(){
				global $con;
				if(isset($_POST['update'])){
					foreach ($_POST['remove'] as $remove_id) {
						$delete_product="delete from cart where p_id='$remove_id'";
						$run_del=mysqli_query($con,$delete_product);
						if($run_del){
							echo "
							<script>window.open('cart.php','_self')</script>
							";
						}
						// code...
					}
				}
			}
			echo @$up_cart=update_cart();

			?>

						<div id="row same-height-row"> <!--row same-height-row START-->
				 <div class="col-md-3 col-sm-6"> <!--col-md-3 col-sm-6 START-->
				 	<div class="box same-height headline"> <!--box same-height headline START-->
				 		<h3 class="text-center">
				 			You may also like these products
				 		</h3>
				 	</div> <!--box same-height headline END-->
				 </div><!--col-md-3 col-sm-6 END-->
				 <div class="center-responsive col-md-3"> <!--center-responsive col-md-3 START-->
				 	<div class="product same-height">
				 		<a href="">
				 			<img src="Admin_area/product_images/watch001.jpg" class="img-responsive">
				 		</a>
				 		<div class="text">
				 			<h3>
				 				<a href="details.php">Casio Digital Black Dial Men's Watch-GBD-200-1DR</a>
				 			</h3>
				 			<p class="price">
				 				INR 269
				 			</p>
				 		</div>
				 	</div>
				 </div> <!--center-responsive col-md-3 END-->


				 				 <div class="center-responsive col-md-3"> <!--center-responsive col-md-3 START-->
				 	<div class="product same-height">
				 		<a href="">
				 			<img src="Admin_area/product_images/watch001.jpg" class="img-responsive">
				 		</a>
				 		<div class="text">
				 			<h3>
				 				<a href="details.php">Casio Digital Black Dial Men's Watch-GBD-200-1DR</a>
				 			</h3>
				 			<p class="price">
				 				INR 269
				 			</p>
				 		</div>
				 	</div>
				 </div> <!--center-responsive col-md-3 END-->


				 				 <div class="center-responsive col-md-3"> <!--center-responsive col-md-3 START-->
				 	<div class="product same-height">
				 		<a href="">
				 			<img src="Admin_area/product_images/watch001.jpg" class="img-responsive">
				 		</a>
				 		<div class="text">
				 			<h3>
				 				<a href="details.php">Casio Digital Black Dial Men's Watch-GBD-200-1DR</a>
				 			</h3>
				 			<p class="price">
				 				INR 269
				 			</p>
				 		</div>
				 	</div>
				 </div> <!--center-responsive col-md-3 END-->




			</div><!--row same-height-row END-->
		</div>
		<div class="col-md-3"> <!--COl-md-9 START-->
			<div class="box" id="order-summary">
				<div box-header>
					<h3 ORDER Summary></h3>
				</div>
				<p class="text-muted">Shooping and addtional cost are calculated based on the value you'provided</p>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>Order Subtotal</td>
								<th>INR <?php echo $total; ?></th>
							</tr>
							<tr>
								<td>
									Shipping and Handling
								</td>
								<td>INR 0</td>
							</tr>
							<tr>
								<td> TAX </td>
								<tr class="total">
									<td>Total</td>
									<td>INR <?php echo $total; ?></td>
								</tr>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div>
				<!-- <table class="table-responsive">
					<t	
				</table> -->
			</div>
		</div>
		</div> <!--COl-md-9 END-->

		
		</div> <!--COl-md-9 END-->
	
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
