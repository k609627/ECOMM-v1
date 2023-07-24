<?php 
if(!isset($_SESSION['admin-email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else{	

	

?>

<?php 
if (isset($_GET['order_delete'])) {
	
$delete_id=$_GET['order_delete'];
$delete_cat="delete from customer_order where order_id='$delete_id'";
$run_delete=mysqli_query($con,$delete_cat);
if($run_delete){

	echo "<script>alert('One Order has been deleted')</script>";
	echo "<script>window.open('admin_panel.php?view_order','_self')</script>";
}
}

?>
<?php } ?>