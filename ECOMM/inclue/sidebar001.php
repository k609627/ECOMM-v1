<div class="padding-default panel sidebar-menu">
	<div class="panel-heading"> <!--panel-heading START-->
		<?php
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
			$session_customer=$_SESSION['customer_email'];
			$get_cust="select * from customers where customer_email='$session_customer'";
			$run_cust=mysqli_query($con,$get_cust);
			$row_customer=mysqli_fetch_array($run_cust);
			$customer_img=$row_customer['customer_image'];
			$customer_name=$row_customer['customer_name'];
			echo "<center>
			<img src='../Admin_area/admin_images/USER_pic/$customer_img' class='img-responsive'>
			</center>
			<br>
			<h3 align='center' class='panel-title'>Name:$customer_name</h3>";


		?>
	</div><!--panel-heading END-->
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php if(isset($_GET['my_order'])) {echo "active";}?>">
				<a href="Checkout.php?my_order"><i class="fa fa-list"></i> My Order</a>
			</li>



			<li class="<?php if(isset($_GET['Pay_offline'])) {echo "active";}?>">
				<a href="Checkout.php?Pay_offline"> <i class="fa fa-bolt"></i>Pay offline </a>
			</li>

			<li class="<?php if(isset($_GET['edit_details'])) {echo "active";}?>">
				<a href="Checkout.php?edit_details"> <i class="fa fa-pencil"></i>Edit Account Details </a>
			</li>

			<li class="<?php if(isset($_GET['change_passwd'])) {echo "active";}?>">
				<a href="Checkout.php?change_passwd"> <i class="fa fa-user"></i>Change Password</a>
			</li>			



			<li class="<?php if(isset($_GET['delete_account'])) {echo "active";}?>">
				<a href="Checkout.php?delete_account"> <i class="fa fa-flask"></i>Delete Account</a>
			</li>


			<li class="<?php if(isset($_GET['logout'])) {echo "active";}?>">
				<a href="Checkout.php?logout"> <i class="fa fa-sign-out"></i>Logout</a>
			</li>

		</ul>
	</div>