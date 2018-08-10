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
        
		<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span4">
			<div class="well">
			<h5>CREATE YOUR ACCOUNT</h5><br/>
			Enter your e-mail address to create an account.<br/><br/><br/>
			<form>
			  <div class="control-group">
				<label class="control-label" for="inputEmail">E-mail address</label>
				<div class="controls">
				  <input class="span3"  type="text" placeholder="Email">
				</div>
			  </div>
			  <div class="controls">
			  <a class="btn btn-primary" href="register.php" > Create Your Account </a>
			  
			  </div>
			</form>
		</div>
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<h5>ALREADY REGISTERED ?</h5>
			<form>
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" placeholder="Email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				  <input type="password" class="span3" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="defaultBtn">Sign in</button> <a href="#">Forget password?</a>
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	
        
    </div>
		
 </div>
	
	<?php  include '../footer.php';?>
</div>
  
 
 </body>
</html>


