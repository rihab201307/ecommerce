<?php include 'includes/db.php';?>
<?php
if(isset($_POST['insert_product'])){
	//getting the text data from a form
	$product_name        = test_input($_POST['product_name']);
	$product_category    = test_input($_POST['product_category']);
	$product_brand       = test_input($_POST['product_brand']);
	$product_price       = test_input($_POST['product_price']);
	$product_description = test_input($_POST['product_description']);
	$product_keyword     = test_input($_POST['product_keyword']);
	
	// getting the image from the field
	$product_image = $_FILES['product_image']['name'];
	$product_image_tmp = $_FILES['product_image']['tmp_name'];
	
	move_uploaded_file($product_image_tmp, "images_producs/$product_image");
	
	$sql = "insert into products ";
	$insert_prod= mysqli_query($con, $sql);
}
function test_input($data){
$data= trim(stripslashes(htmlspecialchars($data)));
return $data;	
}
?>

<html>
<head>
<title> Ecommerce </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scal=1">
<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

</head>
<body>
<?php include 'menu_admin.php'; ?>

<div class="container">
  
  <div class="row">
    <div class="col-md-6">
    <h1>Add Product</h1>
    </div>
  </div>  
  
<div class="row">
  
 <div class="col-md-10">
  <form class="form-horizontal" action="insert_product.php" method="post">
    
	<!-- product name-->   
	<div class="form-group">
		<label class="col-md-4 control-label" for="product_name" >Product name:</label>
		<div class="col-md-8">
			<input class="form-control" id="product_name" type="text" placeholder="Product name" required>
		</div>
	</div>
   <!-- product category -->  
    <div class="form-group">
		<label class="col-md-4 control-label" for="product_category" >Product category:</label>
		<div class="col-md-4">
			<select class="form-control" id="product_category" required>
				<option value="0">- select -</option>
				<?php getCats();?>
			</select>
		</div>
	</div>
	
	<!-- product brand -->  
    <div class="form-group">
		<label class="col-md-4 control-label" for="product_brand" >Product brand:</label>
		<div class="col-md-4">
			<select class="form-control" id="product_brand" required> 
				<option value="0">- select - </option>
				<?php getBrands();?>
			</select>
		</div>
	</div>
   
   <!-- product price --> 
	 <div class="form-group">
	   <label class="col-md-4 control-label" for="product_price" >Product Price</label>
	   <div class="col-md-4">
	     <input class="form-control" id="product_price" type="text" placeholder="Product price" required>
	   </div>
	 </div>
   <!-- product description -->  
	<div class="form-group">
		<label class="col-md-4 control-label" for="product_description">Product Description</label>
		<div class="col-md-8">
			<textarea class="form-control" id="product_description" rows="5" required ></textarea>
		</div>
    </div>
	
	<!-- product description -->  
	<div class="form-group">
		<label class="col-md-4 control-label" for="product_keyword">Product keyword</label>
		<div class="col-md-8">
			<input id="product_keyword" class="form-control" placeholder="Product keyword" type="text" required>
		</div>
    </div>
	<!-- product image -->
	<div class="form-group"> 
		<label class="col-md-4 control-label">Product Image</label>
		<div class="col-md-8">
		<input class="filestyle" data-icon="false" type="file" required>
		</div>
	</div>
	
	<div class="form-group"> 
		<div class="col-md-offset-4">
		<button class="btn btn-primary" name="insert_product" >Add Product </button>
		</div>
	</div>
	
   </form>

 </div>  
</div>
  <!-- /.container -->
</div>

<?php include 'footer.php';?>
</body>   
</html>     
