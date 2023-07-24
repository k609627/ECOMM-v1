<?php 
if(!isset($_SESSION['admin-email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else{	

	

?>
<?php
if (isset($_GET['edit_cat'])) {
	$edit_id=$_GET['edit_cat'];
	$edit_cat="select * from categories where cat_id='$edit_id'";
	$run_edit=mysqli_query($con,$edit_cat);
	$row_edit=mysqli_fetch_array($run_edit);
	$p_id=$row_edit['cat_id'];
	$cat_title=$row_edit['cat_title'];
	$cat_desc=$row_edit['cat_desc'];
	
}

?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / Edit Category
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money fa-fw"></i> Edit Category
				</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="">
					<div class="form-group">
						<label class="col-md-3 control-label">
							Category Title
						</label>
						<div class="col-md-6">
							<input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
						</div>
					</div>


					<div class="form-group">
						<label class="col-md-3 control-label">Category Description</label>
						<div class="col-md-6">
							<textarea name="cat_desc" class="form-control"><?php echo $cat_desc; ?></textarea> 
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php 

		if (isset($_POST['update'])) {
			$cat_title=$_POST['cat_title'];
			$cat_desc=$_POST['cat_desc'];
			// $c_id = $_POST['cat_id'];

			$update_cat="update categories set cat_title='$cat_title',cat_desc='$cat_desc' where cat_id='$p_id'";

			$run_cat=mysqli_query($con,$update_cat);

			if($run_cat){
			echo "<script>alert('One category has been updated successfully')</script>";
			echo "<script>window.open('admin_panel.php?view_categories','_self')</script>";
		}
		}
		 ?>

		<?php } ?>

