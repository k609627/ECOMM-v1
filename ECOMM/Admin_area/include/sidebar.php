<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("db.php");
if(!isset($_SESSION['admin-email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{


?>


<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black;">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="../../index.php?dashboard" class="navbar-brand">Admin Panel</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user"></i> <?php echo $admin_name; ?>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="admin_panel.php?user_profile?id=<?php echo $admin_id ; ?>">
						<i class="fa fa-fw-users"></i>Profile
					</a>
				</li>
				<li>
					<a href="admin_panel.php?view_product">
						<i class="fa fa-fw-envelope"></i>Product
						<span class="badge"> <?php echo $count_pro ?> </span>
					</a>
				</li>
				<li>
					<a href="admin_panel.php?view_customer">
						<i class="fa fa-fw-users"></i>Customer
						<span class="badge"> <?php echo $count_cust ?> </span>
					</a>
				</li>
				<li>
					<a href="admin_panel.php?pro_cat">
						<i class="fa fa-fw-gear"></i>Product Categories
						<span class="badge"> <?php echo $count_p_cat ?> </span>
					</a>
				</li>
				<li class="divider"></li>
				<li >
					<a href="logout.php">Logout
						<i class="fa fa-fw fa-power-off"> </i>
					</a>
				</li>
			</ul>
		</li>
	</ul>
	<div class="navbar-ex1-collapse collapse navbar-collapse">
		<ul class="nav navbar-nav side-nav">
			<li>
				<a href="?dashboard">
					<i class="fa fa-fw fa-dashboard"></i>Dashboard
				</a>
			</li>


			<li>
			<a href="#" data-toggle="collapse" data-target=#products>
				<i class="fa fa-fw fa-table"></i>Product
			</a><i class="fa fa-fw fa-caret-down"></i>
			

			<ul id="products" class="collapse">
				<li>
					<a href="admin_panel.php?insert_product">Insert Product</a>
				</li>

				<li>
					<a href="admin_panel.php?view_product">View Product</a>
				</li>
			</ul>
			</li>


			<!-- <li>
			<a href="#" data-toggle="collapse" data-target=#products_cat>
				<i class="fa fa-fw fa-table"></i>Product Categories
			</a><i class="fa fa-fw fa-caret-down"></i>
			

			<ul id="#products_cat" class="collapse">
				<li>
					<a href="admin_panel.php?insert_product_cat">Insert Product Category</a>
				</li>

				<li>
					<a href="admin_panel.php?view_product_cat">View Product Category</a>
				</li>
			</ul>
			</li> -->


			<li>
			<a href="#" data-toggle="collapse" data-target=#categories>
				<i class="fa fa-fw fa-table"></i>Categories
			</a><i class="fa fa-fw fa-caret-down"></i>
			

			<ul id="categories" class="collapse">
				<li>
					<a href="admin_panel.php?insert_categories">Insert Category</a>
				</li>

				<li>
					<a href="admin_panel.php?view_categories">View Category</a>
				</li>
			</ul>
			</li>


			<li>
			<a href="#" data-toggle="collapse" data-target=#slider>
				<i class="fa fa-fw fa-table"></i>Slider
			</a><i class="fa fa-fw fa-caret-down"></i>
			

			<ul id="slider" class="collapse">
				<li>
					<a href="admin_panel.php?insert_slider">Insert Slider</a>
				</li>

				<li>
					<a href="admin_panel.php?view_slider">View Slider</a>
				</li>
			</ul>
			</li>


			<li class="">
				<a href="admin_panel.php?view_order">
					<i class="fa fa-fw fa-list"></i>View Order
				</a>
			</li>


			<li class="">
				<a href="admin_panel.php?view_payments">
					<i class="fa fa-fw fa-pencil"></i>View Payments
				</a>
			</li>
<!-- SLIDER -->
			<li>
			<a href="#" data-toggle="collapse" data-target=#users>
				<i class="fa fa-fw fa-table"></i>USERS
			</a><i class="fa fa-fw fa-caret-down"></i>
			

			<ul id="users" class="collapse">
				<li>
					<a href="admin_panel.php?insert_users">Insert User</a>
				</li>

				<li>
					<a href="admin_panel.php?view_users">View User</a>
				</li>

				<li>
					<a href="admin_panel.php?edit_profile?id=<?php echo $admin_id; ?>">Edit Profile</a>
				</li>

			</ul>
			</li>
<!-- SLIDER -->

		</ul>
		
	</div>


</nav>
<?php } ?>