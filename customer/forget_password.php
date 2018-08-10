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
		<li><a href="../index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">FORGOT YOUR PASSWORD</li>
    </ul>
	<div class="well well-small">
	<h3> FORGOT YOUR PASSWORD</h3>	
	<hr class="soft"/>
	
	Please enter the e-mail address used to register. We will e-mail you your new password.<br/><br/><br/>
	
	
	<form class="form-inline">
		<label class="control-label" for="inputEmail">E-mail address</label>
		<input type="text" class="span4" placeholder="Email">			  
		<button type="submit" class="shopBtn block">Send My Password</button>
	</form>
</div>
        </div>
        </div>
    </div>
		
	</div>
	
	<?php  include 'footer.php';?>
</div>
  
 
 </body>
</html>


