<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("inclue/db.php");
include("functions/function.php");
?>

<?php
if (isset($_GET['c_id'])) {
	$customer_id=$_GET['c_id'];
}
$ip_add=getUserIP();
$status="pending";
$invoice_no=mt_rand();
$select_cart="select * from cart where ip_add='$ip_add'";
$run_cart=mysqli_query($con,$select_cart);
while ($row_cart=mysqli_fetch_array($run_cart)) {
	$pro_id=$row_cart['p_id'];
	$size=$row_cart['size'];
	$qty=$row_cart['qty'];

	$get_product="select * from products where product_id='$pro_id'";
	$run_pro=mysqli_query($con,$get_product);
	while ($row_pro=mysqli_fetch_array($run_pro)) {
		$sub_total=$row_pro['product_price'] * $qty;
		$insert_cus="insert into customer_order (customer_id,product_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$customer_id','$pro_id','$sub_total','$invoice_no','$qty','$size',NOW(),'$status')";
		$run_cus_order=mysqli_query($con,$insert_cus);

		$insert_into_pend="insert into pending_order (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$qty','$size','$status')";
		$run_pending_order=mysqli_query($con,$insert_into_pend);
		$delete_cart="delete from cart where ip_add='$ip_add'";
		$run_del=mysqli_query($con,$delete_cart);
		echo "<script>alert('Your order has been Placed,Thank you')</script>";
		echo "<script>window.open('Customer/Checkout.php?my_order','_self')</script>";
		// code...
	}
	// code...
}
?>