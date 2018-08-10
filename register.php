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
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<hr class="soft"/>
	<div class="well">
	<form class="form-horizontal" method="post" action="customer/register.php">
		<h3>Your Personal Details</h3>
		<div class="control-group">
		<label class="control-label">Title <sup>*</sup></label>
		<div class="controls">
		<select class="span1" name="days">
			<option value="">-</option>
			<option value="1">Mr.</option>
			<option value="2">Mrs</option>
			<option value="3">Miss</option>
		</select>
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="firstname" placeholder="First Name" required>
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="lastname" placeholder="Last Name" required>
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="email" placeholder="Email" required>
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="pass" placeholder="Password">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">Confirm Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="confirm_pass" placeholder="Confirm Password">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="">Contact <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="contact" placeholder="Telephone">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="">Address <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="address" placeholder="Address">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">City <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="city" placeholder="City">
		</div>
	  </div>
		<div class="control-group">
		<label class="control-label">Country <sup>*</sup></label>
		<div class="controls">
		    <select class="span2" name="pays">
				<option value="">-</option>
					<option value="1">France</option>
					<option value="2">Spain</option>
					<option value="3">Portugal</option>
					<option value="4">Italie</option>					
			</select>			
		</div>
	  </div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>

    </div>
		
	</div>
	
	<?php  include '../footer.php';?>
</div>
  
 
 </body>
</html>
<?php

if(isset($_POST['submitAccount']))
{
	$ip=getIp();
	$fname   = $_POST['firstname'];
	$lname   = $_POST['lastname'];
	$email   = $_POST['email'];
	$pass    = $_POST['pass'];
	//$c_pass  = $_POST['c_pass'];
	$contact = $_POST['contact'];
	$address = $_POST['address'];
	$city    = $_POST['city'];
	$country = $_POST['pays'];

	 $insert = "INSERT INTO `customers`
	 (`customer_ip`,`customer_firstname`,`customer_lastname`,`customer_email`,`customer_pass`,`customer_contact`,`customer_address`,`customer_city`,`customer_country`) 
	 VALUES ('$ip','$fname','$lname','$email','$pass','$contact','$address','$city','$country')";
	
	 $run_sql = mysqli_query($con, $insert);
	echo "<script>alert('Account has been created successfully, Thanks')</script>";
	echo "<script>window.open('login.php','_self') </script>"; 
	
}

