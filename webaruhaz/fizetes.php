<!DOCTYPE>
<?php 
session_start();
require_once("funkciok/functions.php");
?>
<html>
    <head>
    <title>Mousetrap webáruház</title>
	<link rel="stylesheet" href="stilusok/style.css" media="all" />
    </head>

<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
		
		<!--Header starts here-->
		<div class="header_wrapper">
		
			<a href="index.php"><img id="logo" src="kepek/logo.jpg" /> </a>
		</div>
		<!--Header ends here-->
		
		<!--Navigation bar starts here-->
		<div class="menubar">
				
				<ul id="menu">
	<li><a href="index.php">Főoldal</a></li>
					<li><a href="osszes_termek.php">Összes termék</a></li>
					<li><a href="vasarlo/fiokom.php">Fiókom</a></li>
					<li><a href="felhasznalo_regisztracio.php">Regisztráció</a></li>
					<li><a href="kosar.php">Kosár</a></li>
					<li><a href="#">Elérhetőség</a></li>
				</ul>
				
			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Keress könyvünkre" />
					<input type="submit" name="search" value="Keresés" />
				</form>
			</div>
			
		</div>
		<!--Navigation bar ends here-->
		
		<!--Content wrapper starts here-->
		<div class="content_wrapper">
				<div id="sidebar">
					<div id="sidebar_title">Kategóriák</div>
					<ul id="kategoriak">
						<?php getkategoria(); ?>
					<ul>
				</div>
		
				<div id="content_area">
					<div id="kosar">
						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
							<?php
								if(isset($_SESSION['email_cim'])){
									echo "<b>Üdvözlet:</b>" . $_SESSION['email_cim'] . "<b style='color:white;'></b>";
								}
								else{
									echo "<b>Üdvözlet Látogató:</b>";
								}
							?> 
							<b style="color:yellow">Kosár -</b> Összes könyv: <?php osszes_konyv();?> - Teljes ár: <?php teljes_ar(); ?> <a href="kosar.php" style="color:yellow">Kosaramhoz</a>
						</span>
					</div>
					<div id="konyvek_doboz">
					<?php
						if(!isset($_SESSION['email_cim'])){
							include("felhasznalo_belepes.php");
						}
						else{
							include("kifizetes.php");
						}
					?>
					</div>
					</form>
				</div>
		</div>
		<!--Content wrapper ends here-->
		
		<!--Footer starts here-->
		<div id="footer">
		
		<h2 style="text-align:center; padding-top:30;">&copy; 2021 by www.MousetrapBookshop.hu</h2>
		
		</div>
		<!--Footer ends here-->
		
	</div>
	<!--Main Container ends here-->
	
</body>
</html>