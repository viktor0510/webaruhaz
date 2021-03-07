<!DOCTYPE>
<?php 
include("funkciok/functions.php");
?>
<html>
    <head>
    <title>My Shop</title>
	<link rel="stylesheet" href="stilusok/style.css" media="all" />
    </head>

<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
		
		<!--Header starts here-->
		<div class="header_wrapper">
		
			<img id="logo" src="kepek/logo.jpg" />
		</div>
		<!--Header ends here-->
		
		<!--Navigation bar starts here-->
		<div class="menubar">
				
				<ul id="menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">All Products</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">Sign Up</a></li>
					<li><a href="#">Shopping Cart</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product" />
					<input type="submit" name="search" value="Search" />
				</form>
			</div>
			
		</div>
		<!--Navigation bar ends here-->
		
		<!--Content wrapper starts here-->
		<div class="content_wrapper">
				<div id="sidebar">
					<div id="sidebar_title">Kategoriak</div>
					<ul id="kategoriak">
						<?php getkategoria(); ?>
					<ul>
				</div>
		
				<div id="content_area">This is content area</div>
		</div>
		<!--Content wrapper ends here-->
		
		<!--Footer starts here-->
		<div id="footer">This is the footer
		
		<h2 style="text-align:center; padding-top:30;">&copy; 2014 by www.OnlineTuting.com</h2>
		
		</div>
		<!--Footer ends here-->
		
	</div>
	<!--Main Container ends here-->
	
</body>
</html>