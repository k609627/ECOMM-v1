<div id="footer"> <!--footer-start-->
	<div class="container"> <!--container-start-->
		<div class="row"> <!--row-start-->
			<div class="col-md-3 col-sm-6" > <!--col-md-3 col-sm-6 Strt-->
				<h4>Pages</h4>
				<ul class="jim">
					<li class="jio"><a href="cart.php">Shopping Cart</a></li>
					<li class="jio"> <a href="contact.php">Contact us</a> </li>
					<li class="jio"> <a href="shop.php">Shop</a> </li>
					<li class="jio"> <a href="Checkout.php"> My Account</a> </li>
				</ul>
				<hr>
				<h4>User Section</h4>
				<ul class="jim">
					<li class="jio"> <a href="Checkout.php">Login</a> </li>
					<li class="jio"> <a href="customer-regitser.php">Register</a> </li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div> <!--col-md-3 col-sm-6 End-->

			<div class="col-sm-6 col-md-3"> <!--col-sm-6 col-md-3 Strt-->
				<h4>Top Product Categories</h4>
				<ul class="jim">
					<?php
					$get_p_cats="select * from product_categories";
					$run_p_cats=mysqli_query($con,$get_p_cats);
					while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
						$p_cat_id=$row_p_cats['p_cat_id'];
						$p_cat_title=$row_p_cats['p_cat_title'];
						// code...
						echo"<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></>";
					}
					?>
				</ul>
				<hr class="hidden-md hidden-lg">

			</div><!--col-sm-6 col-md-3 End-->
			
			<div class="col-md-3 col-sm-6"><!--col-sm-6 col-md-3 start-->
				<h4>Where to Find us</h4>
				<p>
					<strong>www.alphawebster.in</strong>
					<br>Faridabad
					<br>Haryana
					<br>India
					<br>aditya191251015002@gmail.com
					<br>+91 798XXX3726
					
				</p>
				<a href="contact.php">Go To Contact us</a>
				<hr class="hidden-md hidden-lg">
			</div><!--col-sm-6 col-md-3 End-->

			<div class="col-md-3 col-sm-6">
				<h4>Get the News</h4>
				<p class="text-muted">
					Subscribe To recieve the blogs
				</p>
				<form action="#" method="post">
					<div class="input-group">
						<input type="text" name="email" class="form-control">
						<span class="input-group-btn">
							<input type="submit" name="" class="btn btn-default" value="subscribe">
						</span>
					</div>
				</form>
				<hr>
				<h4>Stay in Touch</h4>
				<p class="social">
					<a href="#">
						<i class="fa fa-facebook"> </i>
					</a>
					<a href="#">
						<i class="fa fa-twitter"> </i>
					</a><a href="#">
						<i class="fa fa-instagram"> </i>
					</a><a href="#">
						<i class="fa fa-youtube"> </i>
					</a><a href="#">
						<i class="fa fa-linkedin"> </i>
					</a>
				</p>
			</div>

		</div> <!--row-END-->
	</div> <!--container-END-->

</div><!--footer-END-->
<!--Copyright-->
<div id="copyright">
	<div class="container">
		<div class="col-md-6">
			<p class="pull-left">
				&copy; 2023 Er.Alpha
			</p>
		</div>
		<div class="col-md-6">
			<p class="pull-right">
				Template-by:-<a href="#">Alpha</a>
			</p>
		</div>
	</div>
</div>