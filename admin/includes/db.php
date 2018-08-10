<?php
	
	$con = mysqli_connect("localhost", "root", "", "ecommerce");
	
function getCats(){
	global $con;
	$sql = "select * from categories"; 
	
	$cats = mysqli_query($con, $sql);
	
	while($row_cats = mysqli_fetch_array($cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<option value=$cat_id> $cat_title</option>";
	}
}

function getBrands(){
	global $con;
	$sql = "select * from brands"; 
	
	$brands = mysqli_query($con, $sql);
	
	while($row_cats = mysqli_fetch_array($brands)){
		$brand_id = $row_cats['brand_id'];
		$brand_title = $row_cats['brand_title'];
		echo "<option value=$brand_id> $brand_title</option>";
	}
	
}