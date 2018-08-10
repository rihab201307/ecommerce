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
        <div class="span9">

            <ul class="thumbnails">
                <?php search_prod(); ?>
								
            </ul>

            <div class="pagination">
                <ul>
                    <li class="disabled"><span>Précédent</span></li>
                    <li class="disabled"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Suivant</a></li>
                </ul>
            </div>

        </div>
    </div>
		
	</div>
	
	<?php  include 'footer.php';?>
</div>
  
 
 </body>
</html>


