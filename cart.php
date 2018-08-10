<?php
session_start();
include_once 'includes/functions.php';

?>
<html>
<head>
	<title> Ecommerce </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scal=1">
	
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="styles/bootstrap/style.css">
	<link rel="stylesheet" href="style.css">
	<!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    
</head>

<body>

<div class="main_wrapper">
	
	<div class="menubar">	
	 <?php include_once 'menu.php'; ?>
	</div>
 
	<div class="container">
    <div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Check Out</li>
    </ul>
	<div class="well well-small">
		<h1>Check Out <small class="pull-right"> <?php total_items();?> Items are in the cart </small></h1>
	<hr class="soften"/>	
	<form action="" method="post" >
	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
				  <th>	Ref. </th>
                  <th>Avail.</th>
                  <th>Unit price</th>
                  <th>Quantity </th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
			  
  <?php 
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
			$product_title = $pp_price['product_title'];
			$product_image = $pp_price['product_image'];
			
			$total +=$product_price;				
		
		echo "$"." ". $total;
			  ?>
                <tr>
                  <td><img width="100" src="admin/images_products/<?php echo $product_image;?>" alt=""></td>
                  <td><?php echo $product_title; ?></td>
                  <td> - </td>
                  <td><span class="shopBtn"><span class="icon-ok"></span></span> </td>
                  <td><?php echo $product_price;?> &#8364</td>
                  <td>
					<input class="span1" style="max-width:34px" placeholder="1" name="qty" size="15" type="text"value="1">
				  <div class="input-append">
					<input class="btn btn-mini" type="submit" name="min_qty" value="-"/>
					<button class="btn btn-mini" type="submit" name="plus_qty"> + </button>
					<button class="btn btn-mini btn-danger" type="submit" name="delete_product">
						<span class="glyphicon glyphicon-trash"></span> x 						
					</button>
				  </div>
				  </td>
				 <?php
				    
					if(isset($_POST['min_qty']) )
					{
						$qty = $_POST['qty'];
						
						$dec_qty= "update cart set qty='$qty'";
						$run_qty = mysqli_query($con, $dec_qty);
						
						$_SESSION['qty']=$qty;
						$total = $total * $qty;
						echo $_SESSION['qty'];
					}
					if(isset($_POST['plus_qty']))
					{	
						$qty = $_POST['qty'];				
						 
						$inc_qty= "update cart set qty='$qty'";
						$run_qty = mysqli_query($con, $inc_qty);
						
						$_SESSION['qty']=$qty;
						$total = $total * $qty;
						echo $_SESSION['qty'];
					}
					if(isset($_POST['delete_prod']))
					{	
						$ip = getIp();
						$delete_prod = "delete from cart where ip_add='$ip'";
						$run_delete = mysqli_query($con, $delete_prod);
							
							if($run_delete)
							{
								echo "<script>window.open('cart.php','_self')</script>";
							}							
					
					//echo @$up_cart = del_prod_cart();
						
						$_SESSION['qty']=$qty;
						$total = $total * $qty;
						echo $_SESSION['qty'];
					}
				 ?>
                  <td><?php echo $product_price; ?> &#8364 </td>
                </tr>
				<?php
				}	// end while		
		}// end while
		?>
		
                <tr>
					
                  <td colspan="6" class="alignR">Total products:	</td>
                  <td> <?php echo $total; ?> &#8364 </td>
                </tr>
                 <tr>
                  <td colspan="6" class="text-right">TVA:	</td>
                  <td> <?php $tva = $total * 0.05; ?> &#8364 </td>
                </tr>
				
			</tbody>
		</table>
		 <?php
			function del_prod_cart()
				{
					global $con;
					$ip=getIp();
					if(isset($_POST['delete_product']))
					{
						echo $pro_id;
							
							  $delete_prod = "delete from cart where p_id = '$pro_id' AND ip_add='$ip'";
							  $run_delete = mysqli_query($con, $delete_prod);
							
							 if($run_delete)
							 {
								 echo "<script>window.open('cart.php','_self')</script>";
							 }							
					}
					echo @$up_cart = del_prod_cart();
				}
			?>
			</form>
			<table class="table table-bordered">
			<tbody>
                <tr><td>ESTIMATE YOUR SHIPPING & TAXES</td></tr>
                 <tr> 
				 <td>
					<form class="form-horizontal">
					  <div class="control-group">
						<label class="span2 control-label" for="inputEmail">Country</label>
						<div class="controls">
						  <input type="text" placeholder="Country">
						</div>
					  </div>
					  <div class="control-group">
						<label class="span2 control-label" for="inputPassword">Post Code/ Zipcode</label>
						<div class="controls">
						  <input type="password" placeholder="Password">
						</div>
					  </div>
					  <div class="control-group">
						<div class="controls">
						  <button type="submit" class="shopBtn">Click to check the price</button>
						</div>
					  </div>
					</form> 
				  </td>
				  </tr>
              </tbody>
            </table>		
	<a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<a href="payment.php" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

</div>
</div>
</div>
<!-- 
Clients 
-->
<section class="our_client">
	<hr class="soften"/>
	<h4 class="title cntr"><span class="text">Manufactures</span></h4>
	<hr class="soften"/>
	<div class="row">
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/1.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/2.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/3.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/4.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/5.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="assets/img/6.png"></a>
		</div>
	</div>
</section>
	
	</div>
	
	<?php  include 'footer.php';?>
</div>
  
 
 </body>
</html>


