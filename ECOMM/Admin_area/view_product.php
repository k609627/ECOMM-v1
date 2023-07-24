<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../inclue/db.php");
if(!isset($_SESSION['admin-email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{

?>

<div class="row">
	<div style="margin-top: 69px" class="col-lg-12">
	<!-- <div class="col-lg-12"> -->
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashoboard"></i>
				Dashboard / View Product
			</li>
		</ol>
	</div>
</div>

<div class="row">

	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> View Products
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Product Id</th>
								<th>Product Title</th>
								<th>Product Image</th>
								<th>Product Price</th>
								<th>Product Keyword</th>
								<th>Product Date</th>
								<th>Product Delete</th>
								<th>Product Edit</th>

							</tr>
						</thead>
						<tbody>
							<?php 
							$i=0;
							$get_product="select * from products";
							$run_p=mysqli_query($con,$get_product);
							while ($row_order=mysqli_fetch_array($run_p)) {
							$pro_id=$row_order['product_id'];
							$product_title=$row_order['product_title'];
							$product_img1=$row_order['product_img1'];
							$product_price=$row_order['product_price'];
							$product_keywords=$row_order['product_keyword'];
							$date=$row_order['date'];
							$i++;
							
							 ?>
							
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $product_title; ?></td>
								<td><img class="img-responsive" src="product_images/<?php echo $product_img1; ?>" style="height: 200px; width: 170px;"></td>
								<td><?php echo $product_price; ?></td>
								<td><?php echo $product_keywords; ?></td>
								<td><?php echo $date; ?></td>

								<td> <a href="admin_panel.php?delete_product=<?php echo $pro_id; ?>">
									<i class="fa fa-trash-o"></i>Delete
								</a></td>


								<td> <a href="admin_panel.php?edit_product=<?php echo $pro_id; ?>">
									<i class="fa fa-pencil"></i>Edit Product
								</a></td>

								<?php } ?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


		</div>
	</div>
</div>


<?php } ?>