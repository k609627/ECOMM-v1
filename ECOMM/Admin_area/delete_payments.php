<?php 
if(!isset($_SESSION['admin-email'])){
echo "<script>window.open('login.php','_self')</script>";
}
else{	

	

?>

<?php 
if (isset($_GET['delete_payments'])) {
	
$delete_id=$_GET['delete_payments'];
$delete_cat="delete from payments where payment_id='$delete_id'";
$run_delete=mysqli_query($con,$delete_cat);
if($run_delete){

	echo "<script>alert('Payment has been deleted')</script>";
	echo "<script>window.open('admin_panel.php?view_payments','_self')</script>";
}
}

?>
<?php } ?>