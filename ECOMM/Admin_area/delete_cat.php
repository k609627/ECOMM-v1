<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("../inclue/db.php");
if(!isset($_SESSION['admin-email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{
	

?>
<?php 
if (isset($_GET['delete_cat'])) {
	
$delete_id=$_GET['delete_cat'];
$delete_cat="delete from categories where cat_id='$delete_id'";
$run_delete=mysqli_query($con,$delete_cat);
if($run_delete){

	echo "<script>alert('One Category has been deleted')</script>";
	echo "<script>window.open('admin_panel.php?view_categories','_self')</script>";
}
}

?>
<?php } ?>