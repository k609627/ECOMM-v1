<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("../inclue/db.php");
if(!isset($_SESSION['admin-email'])){
	echo "<script>window.open('login.php','_self')</script>";
}else{
	

?>

<?php 
if (isset($_GET['delete_slider'])) {
	
$delete_id=$_GET['delete_slider'];
$delete_cat="delete from slider where id='$delete_id'";
$run_delete=mysqli_query($con,$delete_cat);
if($run_delete){

	echo "<script>alert('One Image has been deleted')</script>";
	echo "<script>window.open('admin_panel.php?view_slider','_self')</script>";
}
}

?>
<?php } ?>