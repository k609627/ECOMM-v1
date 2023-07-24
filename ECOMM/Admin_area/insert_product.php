<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../inclue/db.php");
if(!isset($_SESSION['admin-email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{
	

?>


<!DOCTYPE html>
<html>
<head>
	<script src="../tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
	
	<title>Insert Product</title>
	
	
	

</head>
<body>
	<div class="row">
	 <!--ROW START-->
		<div style="margin-top: 65px" class="col-lg-12">
			<div class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard">Dashboard / Insert Product</i>
				</li>
			</div>
		</div>
	</div> <!--ROW END-->

	<div class="row">
		<div class="col-lg-3">
			
		</div>
		<div class="col-lg-6">
			<div class="panel panel-default">
				<div class="panel-heading"> <!--panel-heading START-->
					<h3 class="panel-title">
						<i class="fa fa-money fa-w">Insert Product</i>
					</h3>
				</div> <!--panel-heading END-->
				<div class="panel-body">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Product Title
							</label>
							<input type="text" name="product_title" class="form-control" required="">
						</div>

						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Product Category
							</label>
							<select name="prodct_cat" class="form-control">
								<option>
									Select a product Category
								</option>

								<?php

								$get_p_cats="select * from product_categories";
								$run_p_cats=mysqli_query($con,$get_p_cats);
								while ($row=mysqli_fetch_array($run_p_cats)) {
									// code...
									$id=$row['p_cat_id'];
									$p_title=$row['p_cat_title'];
									echo "<option value='$id'>$p_title</option>";
								}
								?>


							</select>
						</div>

						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Categories
							</label>
							<select class="form-control" name="cat">
								<option>Select Categories</option>

								<?php

								$get_cats="select * from categories";
								$run_cats=mysqli_query($con,$get_cats);
								while ($row=mysqli_fetch_array($run_cats)) {
									// code...
									$id=$row['cat_id'];
									$catss_title=$row['cat_title'];
									echo "<option value='$id'>$catss_title</option>";
								}
								?>


							</select>
						</div>

						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Product Image 1
							</label>
							<input type="file" name="product_img1" class="form-control" required="">
						</div>

						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Product Image 2
							</label>
							<input type="file" name="product_img2" class="form-control" required="">
						</div>

						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Product Image 3
							</label>
							<input type="file" name="product_img3" class="form-control" required="">
						</div>

						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Product Price
							</label>
							<input type="text" name="product_price" class="form-control" required="">
						</div>

						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Product Keyword
							</label>
							<input type="text" name="product_keyword" class="form-control" required="">
						</div>

						<div class="form-group"> 
							<label class="col-md-3 control-label">
								Product Description
							</label>
							<textarea id="mytextarea" name="product_desc" class="form-control" rows="6" cols="19"></textarea>
						</div>


						<div class="form-group">
							<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			
		</div>
	</div>


</body>
</html>


<?php
// $uploads_dir = 'Admin_area/product_images';
if(isset($_POST['submit'])){
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['prodct_cat'];
	$cat_p=$_POST['cat'];
	$product_price=$_POST['product_price'];
	$product_kywrd=$_POST['product_keyword'];
	$product_descr=$_POST['product_desc'];


	$product_img1=$_FILES['product_img1']['name'];
	$product_img2=$_FILES['product_img2']['name'];
	$product_img3=$_FILES['product_img3']['name'];


	$temp_name1=$_FILES['product_img1']['tmp_name'];
	$temp_name2=$_FILES['product_img2']['tmp_name'];
	$temp_name3=$_FILES['product_img3']['tmp_name'];

	move_uploaded_file($temp_name1, "admin_images/$product_img1");
	move_uploaded_file($temp_name2, "admin_images/$product_img2");
	move_uploaded_file($temp_name3, "admin_images/$product_img3");
	// move_uploaded_file($temp_name2, "$uploads_dir/$product_imagess2");
	// move_uploaded_file($temp_name3, "$uploads_dir/$product_imagess3");

	$insert_product="insert into products(p_cat_id,cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,product_keyword) values('$product_cat','$cat_p',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_descr','$product_kywrd')";

	$run_product=mysqli_query($con,$insert_product);
	if ($run_product){
		echo "<script>alert('Product Inserted Successfully')</script>";
		echo "<script>window.open('admin_panel.php?view_product')</script>";
	}
}

?>
<?php } ?>