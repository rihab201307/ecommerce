<?php
include_once 'includes/functions.php';
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Twitter Bootstrap shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="assets/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
  </head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="#"><span class="icon-twitter"></span></a>
					<a href="#"><span class="icon-facebook"></span></a>
					<a href="#"><span class="icon-youtube"></span></a>
					<a href="#"><span class="icon-tumblr"></span></a>
				</div>
				<a href="index.php"> <span class="icon-home"></span> Home</a> 
				<a href="#"><span class="icon-user"></span> My Account</a> 
				<a href="customer/register.php"><span class="icon-edit"></span> Register </a> 
				<a href="contact.php"><span class="icon-envelope"></span> Contact us</a>
				<a href="cart.php"><span class="icon-shopping-cart">
					</span> <?php total_items();?> items(s) <span class="badge badge-warning">
						<?php total_price();?>
					</span>
				</a>
								
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>


<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="active"><a href="index.php">Accueil	</a></li>
			  <li class=""><a href="list-view.html">Computer</a></li>
			  <li class=""><a href="grid-view.html">Laptops</a></li>
			  <li class=""><a href="three-col.html">Mobiles</a></li>
			  <li class=""><a href="four-col.html">Four Column</a></li>
			</ul>
			<form action="result.php" class="navbar-search pull-left">
			  <input name="user_search" type="text" placeholder="Search" class="search-query span2">
			</form>
			<ul class="nav pull-right">
			<?php
			if(!isset($_SESSION['email']))
			{
			?>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="login.php"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm">
				  <div class="control-group">
					<input type="text" class="span2" id="inputEmail" placeholder="Email">
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" id="inputPassword" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
					<button type="submit" class="shopBtn btn-block">Sign in</button>
				  </div>
				</form>
				</div>
			</li>
			<?php
			}
			else{
			?>
			<li>
				<a data-toggle="dropdown" class="dropdown-toggle" href="login.php">
				<span class="icon-lock"></span> Logout <b class="caret"></b></a>
			</li>	
			<?php
			}
			?>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->