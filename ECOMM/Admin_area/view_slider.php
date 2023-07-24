<?php 
if(!isset($_SESSION['admin-email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else{	

	

?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Slider
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw">
                    </i>View Slider
                </h3>
            </div>
            <div class="panel-body">
            	<?php 

            	$get_slides="select * from slider";
            	$run_slider=mysqli_query($con,$get_slides);
            	while ($row_slides=mysqli_fetch_array($run_slider)) {
            		$slide_id=$row_slides['id'];
            		$slide_name=$row_slides['slider_name'];
            		$slide_image=$row_slides['slider_image'];
            		// code...
            	

        		 ?>
        		 <div class="col-lg-3 col-md-3">
        		 	<div class="panel panel-primary">
        		 		<div class="panel-heading">
        		 			<h3 class="panel-title" align="text-center">
        		 				<?php echo $slide_name; ?>
        		 			</h3>
        		 		</div>
        		 		<div class="panel-body">
        		 			<img src="slider_images/<?php echo $slide_image; ?>" class="img-responsive">
        		 		</div>
        		 		<div class="panel-footer">
        		 			<center>
        		 				<a href="admin_panel.php?delete_slider=<?php echo $slide_id; ?>" class="pull-left">
        		 					<i class="fa fa-trash-o"></i>Delete
        		 				</a>

        		 				<a href="admin_panel.php?insert_slider=<?php echo $slide_id; ?>" class="pull-right">
        		 					<i class="fa fa-pencil"></i>Edit
        		 				</a>
        		 				<div class="clearfix">
        		 					
        		 				</div>
        		 			</center>
        		 		</div>
        		 	</div>
        		 </div>
        		<?php } ?>
        		</div>
        	</div>
        </div>
    </div>
<?php } ?>
