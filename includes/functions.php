<?php
	
	$con = mysqli_connect("localhost", "root", "", "ecommerce");
	
	if(mysqli_connect_errno())
	{
		echo "Error, Connection was not established ".mysqli_connect_error();
	}
	
	// delete product from cart
	// function del_prod_cart($pro_id)
	// {
		// global $con;
		// $ip=getIp();
		// if(isset($_POST['delete_product']))
		// {
			// echo $pro_id;
				
				 // $delete_prod = "delete from cart where p_id = '$pro_id' AND ip_add='$ip'";
				 // $run_delete = mysqli_query($con, $delete_prod);
				
				 // if($run_delete)
				 // {
					 // echo "<script>window.open('cart.php','_self')</script>";
				 // }	
			
		// }
	// }
	
	
	// getting address ip
	function getIp(){

        $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            return $ip;
        }
        // There might not be any data
        return false;
    }
	
	function cart1(){
		if(isset($_GET['add_cart'])){
			global $con;
			$ip= getIp();
			$pro_id = $_GET['add_cart'];
			echo $pro_id ;
		}
		
	}
	function cart(){
		if(isset($_GET['add_cart'])){
			global $con;
			$ip= getIp();
			$pro_id = $_GET['add_cart'];
			//echo $pro_id ;
			$check_pro = "select * from cart where ip_add= '$ip' AND p_id= '$pro_id'";
			$run_check = mysqli_query($con, $check_pro);
			
			if(mysqli_num_rows($run_check)>0){
				echo "";
			}else{
				$insert_pro= "insert into cart (p_id, ip_add, qty) values ('$pro_id', '$ip', '0')";
				
				$run_pro = mysqli_query($con, $insert_pro);
				
				
			echo "<script>window.open('index.php', '_self')</script>";
			}
		}
	}
	// getting the total added items
	
	function total_items(){
		
		if(isset($_GET['add_cart'])){
			global $con;
			$ip= getIp();
			$get_items = "select * from cart where ip_add = '$ip'";
			$run_items=mysqli_query($con, $get_items);
			$count_items = mysqli_num_rows($run_items);
		}else{
			global $con;
			$ip= getIp();
			$get_items = "select * from cart where ip_add = '$ip'";
			$run_items=mysqli_query($con, $get_items);
			$count_items = mysqli_num_rows($run_items);
		}
		echo $count_items;
	}
	
	// getting total price of items in cart
	function total_price(){
		global $con;
		$ip= getIp();
		$total= 0;
		
		$sel_price= "select * from cart where ip_add= '$ip'";
		$run_price= mysqli_query($con, $sel_price);
		
		while($p_price = mysqli_fetch_array($run_price)){
			$pro_id= $p_price['p_id'];
			$pro_price= "select * from products where product_id= '$pro_id'";
			$run_pro_price = mysqli_query($con, $pro_price);
			while($pp_price= mysqli_fetch_array($run_pro_price)){
				$product_price = $pp_price['product_price'];
				$total +=$product_price;				
			}	// end while		
		}// end while
		
		echo "$"." ". $total;
	}
	
// getting list of category
function getCats(){
	global $con;
	$sql = "select * from categories"; 
	
	$cats = mysqli_query($con, $sql);
	
	while($row_cats = mysqli_fetch_array($cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<li>
				<a href='index.php?cat=$cat_id'><span class='icon-chevron-right'></span> $cat_title</a>
			  </li>";
	}
}
// getting list of Brands
function getBrands(){
	global $con;
	$sql = "select * from brands"; 
	
	$brands = mysqli_query($con, $sql);
	
	while($row_brand = mysqli_fetch_array($brands)){
		$brand_id = $row_brand['brand_id'];
		$brand_title = $row_brand['brand_title'];
		echo "<li><a href='index.php?brand=$brand_id'> <span class='icon-chevron-right'></span> $brand_title</a></li>";
	}
}
// getting all products
function get_prods(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	global $con;
	$sql = "select * from products order by RAND() limit 0,6";
	
	$prods = mysqli_query($con, $sql);
	
	while($row_prods = mysqli_fetch_array($prods)){
		$prod_id = $row_prods['product_id'];
		$prod_cat = $row_prods['product_cat'];
		$prod_brand = $row_prods['product_brand'];
		$prod_title= $row_prods['product_title'];
		$prod_price = $row_prods['product_price'];
		$prod_image = $row_prods['product_image'];
			
		?>
		    <li class="span3">
				<div class="thumbnail">
					<img src="images/Desert.jpg" alt="Product" width="200" height="200">
					<div class="caption">
						<h4><?php echo $prod_title;?></h4>
						<p><?php echo $prod_price; ?> €</p>
						<a class="btn btn-primary" href="product_details.php?prod_id= <?php echo $prod_id; ?>">Details</a>
						<a class="btn btn-success" href="index.php?add_cart=<?php echo $prod_id; ?>">Add to Cart</a>
					</div>
				</div>
			</li>
							
	<?php
	}
	}
	}
}
// getting all products of category
function get_Cat_Pro(){
	global $con;
	if(isset($_GET['cat'])){
		$cat_id = $_GET['cat'];
	
	$sql= "select * from products where product_cat= $cat_id";
	$prods = mysqli_query($con, $sql);
	$count_prod= mysqli_num_rows($prods);
	if($count_prod == 0)
	{
		echo "<h2 class='alert alert-danger'> No products in this Category </h2>";
	}
	
	while($row_prods = mysqli_fetch_array($prods)){
		$prod_id = $row_prods['product_id'];
		$prod_cat = $row_prods['product_cat'];
		$prod_brand = $row_prods['product_brand'];
		$prod_title= $row_prods['product_title'];
		$prod_price = $row_prods['product_price'];
		$prod_image = $row_prods['product_image'];
			
		?>
		    <li class="span3">
				<div class="thumbnail">
					<img src="images/Desert.jpg" alt="Product" width="200" height="200">
					<div class="caption">
						<h4><?php echo $prod_title;?></h4>
						<p><?php echo $prod_price; ?> €</p>
						<a class="btn btn-primary" href="product_details.php?prod_id= <?php echo $prod_id; ?>">Details</a>
						<a class="btn btn-success" href="panier.php">Add to Cart</a>
					</div>
				</div>
			</li>
							
	<?php
	}
	?>
	<?php
}
}
// getting all products of one brands
function get_Brand_Pro(){
	global $con;
	if(isset($_GET['brand'])){
		$brand_id = $_GET['brand'];
	
	$sql= "select * from products where product_brand= $brand_id";
	$prods = mysqli_query($con, $sql);
	$count_prod= mysqli_num_rows($prods);
	if($count_prod == 0)
	{
		echo "<h2 class='alert alert-danger'> No products in this Brand </h2>";
	}
	while($row_prods = mysqli_fetch_array($prods)){
		$prod_id = $row_prods['product_id'];
		$prod_cat = $row_prods['product_cat'];
		$prod_brand = $row_prods['product_brand'];
		$prod_title= $row_prods['product_title'];
		$prod_price = $row_prods['product_price'];
		$prod_image = $row_prods['product_image'];
			
		?>
		    <li class="span3">
				<div class="thumbnail">
					<img src="images/Desert.jpg" alt="Product" width="200" height="200">
					<div class="caption">
						<h4><?php echo $prod_title;?></h4>
						<p><?php echo $prod_price; ?> €</p>
						<a class="btn btn-primary" href="product_details.php?prod_id= <?php echo $prod_id; ?>">Details</a>
						<a class="btn btn-success" href="panier.php">Add to Cart</a>
					</div>
				</div>
			</li>
							
	<?php
	}
	}
}
// searching product
function search_prod(){
	global $con;
	if(isset($_GET['user_search'])){
		
	$search_query = $_GET['user_search'];
	
	$sql= "select * from products where product_keyword like '%$search_query%' ";
	$prods = mysqli_query($con, $sql);
	$count_prod= mysqli_num_rows($prods);
	if($count_prod == 0)
	{
		echo "<h2 class='alert alert-danger'> No products in this Brand </h2>";
	}
	while($row_prods = mysqli_fetch_array($prods)){
		$prod_id = $row_prods['product_id'];
		$prod_cat = $row_prods['product_cat'];
		$prod_brand = $row_prods['product_brand'];
		$prod_title= $row_prods['product_title'];
		$prod_price = $row_prods['product_price'];
		$prod_image = $row_prods['product_image'];
			
		?>
		    <li class="span3">
				<div class="thumbnail">
					<img src="images/Desert.jpg" alt="Product" width="200" height="200">
					<div class="caption">
						<h4><?php echo $prod_title;?></h4>
						<p><?php echo $prod_price; ?> €</p>
						<a class="btn btn-primary" href="product_details.php?prod_id= <?php echo $prod_id; ?>">Details</a>
						<a class="btn btn-success" href="result.php">Add to Cart</a>
					</div>
				</div>
			</li>
							
	<?php
	}
	}
	}
	