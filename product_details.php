<?php
include_once 'includes/functions.php';
?>
<html>
<head>
	<title> Ecommerce </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scal=1">
	
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.css">
	<link rel="stylesheet" href="styles/bootstrap/style.css">
	
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
		<div class="span3">
			<div id="sidebar" class="span3"> Categories </div>
			<div class="well well-small">
			<ul class="nav nav-list">
				<?php getCats(); ?>
			</ul>
			</div>
			<div class="well well-small">
			<div id="sidebar" class="span3"> Brands </div>
			<ul class="nav nav-list">
				<?php getBrands();?>
			</ul>
			</div>
		</div>
        
	<?php
		if(isset($_GET['prod_id'])){
			$prod_id = $_GET['prod_id'];
			$sql = "select * from products where product_id = '$prod_id'";
			
			$query = mysqli_query($con, $sql);
			$row_prod= mysqli_fetch_array($query);
			
			$pro_id= $row_prod['product_id'];
			$pro_title= $row_prod['product_title'];
			$pro_price= $row_prod['product_price'];
			$pro_desc= $row_prod['product_desc'];
			$pro_cat= $row_prod['product_cat'];
			$pro_brand= $row_prod['product_brand'];
			echo $pro_price;
		}
    ?>	
		<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html"><?php echo $pro_cat; ?></a> <span class="divider">/</span></li>
    <li class="active">Preview</li>
    </ul>	
	<div class="well well-small">
	<div class="row-fluid">
			<div class="span5">
			<div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="#"> <img src="assets/img/a.jpg" alt="" style="width:100%"></a>
                  </div>
                  <div class="item">
                     <a href="#"> <img src="assets/img/b.jpg" alt="" style="width:100%"></a>
                  </div>
                  <div class="item">
                    <a href="#"> <img src="assets/img/e.jpg" alt="" style="width:100%"></a>
                  </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
			</div>
			<div class="span7">
				<h3><?php echo $pro_title; ?></h3>
				<hr class="soft"/>
				
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span><?php echo $pro_price; ?></span></label>
					<div class="controls">
					<input type="number" class="span6" placeholder="Qty.">
					</div>
				  </div>
				
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span11">
						  <option>Red</option>
						  <option>Purple</option>
						  <option>Pink</option>
						  <option>Red</option>
						</select>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label"><span>Materials</span></label>
					<div class="controls">
					  <select class="span11">
						  <option>Material 1</option>
						  <option>Material 2</option>
						  <option>Material 3</option>
						  <option>Material 4</option>
						</select>
					</div>
				  </div>
				  <h4>Description</h4>
				  <p><?php echo $pro_desc; ?> <p>
				  <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
				</form>
			</div>
			</div>
    </div>
		
	</div>
	
	<?php  include 'footer.php';?>
</div>
  
 
 </body>
</html>


