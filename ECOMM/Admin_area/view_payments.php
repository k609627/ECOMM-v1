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
                <i class="fa fa-dashboard"></i> Dashboard / View Payments
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
                    </i>View Payments
                </h3>
            </div>
            <div class="panel-body">
            	<div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Payment No:</th>
                                <th>Invoice No:</th>
                                <th>Amount Paid:</th>
                                <th>Payment Method:</th>
                                <th>Refrence No:</th>
                                <th>Payment Date:</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $i = 0;
                            $get_payments = "select * from payments";
                            $run_payments = mysqli_query($con, $get_payments);
                            while ($row_orders = mysqli_fetch_array($run_payments)) {
                                $payment_id = $row_orders['payment_id'];
                                $invoice_no = $row_orders['invoice_id'];
                                $invoice_amount = $row_orders['invoice_amount'];
                                $payment_mode = $row_orders['payment_mode'];
                                $ref_no = $row_orders['ref_no'];
                                $payment_date = $row_orders['payment_date'];
                                $i++;
                            ?>
                            <tr>
                                    <td><?php echo $i; ?></td>
                                    <td bgcolor="yellow"><?php echo "$invoice_no"; ?></td>
                                    <td>INR <?php echo "$invoice_amount"; ?></td>

                                    <!-- <td><?php echo "$product_title"; ?></td> -->
                                    <td><?php echo "$payment_mode"; ?></td>
                                    <td><?php echo "$ref_no"; ?></td>
                                    <td><?php echo "$payment_date"; ?></td>
                                    <td>
                                    	<a href="admin_panel.php?delete_payments=<?php echo $payment_id; ?>">
                                            <i class="fa fa-trash-o"></i>Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>