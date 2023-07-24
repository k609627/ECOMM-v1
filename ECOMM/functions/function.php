<?php
$db=mysqli_connect("localhost","root","","ECOMM");


// FOR GETTING USER IP --START--
function getUserIP(){
	switch (true) {
		case (isset($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
		case (isset($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
		case (isset($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
		default : return $_SERVER['REMOTE_ADDR'];
}
}
// FOR GETTING USER IP --END--


function addCart(){
    global $db;
    if (isset($_GET['add_cart'])) {
        $ip_add = getUserIP();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['prodct_qty'];
        $product_size = $_POST['prodct_size'];
        $check_check = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
        $run_check = mysqli_query($db, $check_check);
        if (mysqli_num_rows($run_check) > 0) {
            echo "<script>alert('This product is already added in the cart')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        } else {
            $query="insert into cart(p_id,ip_add,qty,size) values('$p_id','$ip_add','$product_qty','$product_size')";
            $run_query = mysqli_query($db, $query);
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        }
    }
}


// Items Count 

function item(){
	global $db;
	$ip_add=getUserIP();
	$get_items="select * from cart where ip_add='$ip_add'";
	$run_item=mysqli_query($db,$get_items);
	$count=mysqli_num_rows($run_item);
	echo $count;
}


// Price Dynamic

function totalPrice(){
		global $db;
		$ip_add=getUserIP();
		$total=0;
		$select_cat="select * from cart where ip_add='$ip_add'";
		$run_cart=mysqli_query($db,$select_cat);
		while ($record=mysqli_fetch_array($run_cart)) {
			$pro_id=$record['p_id'];
			$pro_qty=$record['qty'];
			$get_price="select * from products where product_id='$pro_id'";
			$run_price=mysqli_query($db,$get_price);
			while ($row=mysqli_fetch_array($run_price)) {
				$sub_total=$row['product_price']*$pro_qty;
				$total += $sub_total;
				// code...
			}
	}
	echo $total;
}


function getPro(){
	global $db;
	$get_products="select * from products order by 1 DESC LIMIT 0,6";
	$run_products=mysqli_query($db,$get_products);
	while ($row_products=mysqli_fetch_array($run_products)) {
		$pro_id=$row_products['product_id'];
		$pro_title=$row_products['product_title'];
		$pro_price=$row_products['product_price'];
		$pro_img=$row_products['product_img1'];
		echo "<div class='col-md-4 col-sm-6'>
		<div class='product'>
		<a href='details.php?pro_id=$pro_id'>
		<img src='Admin_area/admin_images/$pro_img' class='img-responsive'></a>
		<div class='text'>
		<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
		<p class='price'>INR $pro_price</p>
		<p class='buttons'>
		<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
		<a href='details.php?pro_id=$pro_id' class='btn btn-primary'> <i class='fa fa-shopping-cart'> </i>Add to cart </a>
		</p>
		</div>
		</div>

		</div>";
	}
}

/*Product Categories*/ 
function getPCats(){
	global $db;
	$get_p_cats="select * from product_categories";
	$run_p_cats=mysqli_query($db,$get_p_cats);
	while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
		$p_cat_id=$row_p_cats['p_cat_id'];
		$p_cat_title=$row_p_cats['p_cat_title'];
		echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
		// code...
	}
}

/* Categories*/ 
function getCats(){
	global $db;
	$get_cats="select * from categories";
	$run_cats=mysqli_query($db,$get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats)) {
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];
		echo "<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>";
		// code...
	}
}

/* get product categories product */ 
function getPcatPro(){
	global $db;
	if (isset($_GET['p_cat'])) {
		$p_cat_id=$_GET['p_cat'];
		$get_p_cats="select * from product_categories where p_cat_id='$p_cat_id' ";
		$run_p_cats=mysqli_query($db,$get_p_cats);
		$row_p_cats=mysqli_fetch_array($run_p_cats);
		$p_cat_title=$row_p_cats['p_cat_title'];
		$p_cat_desc=$row_p_cats['p_cat_desc'];

		$get_products="select * from products where p_cat_id='$p_cat_id'";
		$run_products=mysqli_query($db,$get_products);
		$count=mysqli_num_rows($run_products);

		if ($count==0) {
			echo "
			<div class='box'>
			<h1>No Products found in this Product Category</h1>
			</div>
			";
			// code...
		}
		else {
			echo "
			<div class='box'>
			<h1>$p_cat_title</h1>
			<p>$p_cat_desc</p>
			</div>
			";
			// code...
		}

		while ($row_products=mysqli_fetch_array($run_products)) {
			$pro_id=$row_products['product_id'];
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_img1=$row_products['product_img1'];
			
			echo "
			<div class='col-md-3 col-sm-6 center-responsive'>
			<div class='product'>
			<a href='details.php?pro_id=$pro_id'> 
			<img src='Admin_area/admin_images/$pro_img1' class='img-responsive'>
			</a>
			<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
			<p class='price'>$pro_price</p>
			<p class='buttons'> 

			<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
			<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
			</p>
			</div>
			</div>

			</div>


			";
			// code...
		}
		// code...
	}
}
// Get Categories 

function getCatPro(){
	global $db;
	if (isset($_GET['cat_id'])) {
		$cat_id=$_GET['cat_id'];
		$get_cat="select * from categories where cat_id='$cat_id'";
		$run_cats=mysqli_query($db,$get_cat);
		$row_cat=mysqli_fetch_array($run_cats);
		$cat_title=$row_cat['cat_title'];
		$cat_desc=$row_cat['cat_desc'];
		$get_products="select * from products where cat_id='$cat_id'";
		$run_products=mysqli_query($db,$get_products);
		$count=mysqli_num_rows($run_products);

		if ($count==0) {
			echo "
			<div class='box'>
			<h1>No Products found in this Product Category</h1>
			</div>
			";
			// code...
		}
		else {
			echo "
			<div class='box'>
			<h1>$cat_title</h1>
			<p>$cat_desc</p>
			</div>
			";
			// code...
		}
			while ($row_products=mysqli_fetch_array($run_products)) {
			$pro_id=$row_products['product_id'];
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_img1=$row_products['product_img1'];
			
			echo "
			<div class='col-md-3 col-sm-6 center-responsive'>
			<div class='product'>
			<a href='details.php?pro_id=$pro_id'> 
			<img src='Admin_area/admin_images/$pro_img1' class='img-responsive'>
			</a>
			<div class='text'>
			<h3><a href='details.php?pro_id=$pro_id'>$cat_title</a></h3>
			<p class='price'>$pro_price</p>
			<p class='buttons'> 

			<a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
			<a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
			</p>
			</div>
			</div>

			</div>


			";
			// code...
		}
		// code...
	}
}


?>