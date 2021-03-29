<!DOCTYPE>
<?php 
include("funkciok/functions.php");
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
					<li><a href="összes_termék.php">Összes termék</a></li>
					<li><a href="vásárló/fiókom.php">Fiókom</a></li>
					<li><a href="felhasznalo_regisztracio.php">Regisztráció</a></li>
					<li><a href="kosár.php">Kosár</a></li>
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
							Üdvözlet látogató! <b style="color:yellow">Kosár -</b> Összes könyv - Teljes ár: <a href="cart.php" style="color:yellow">Kosaramhoz</a>
						</span>
					</div>
				
					<div id="konyvek_doboz">
					<?php
					
					if(isset($_GET['search'])){
						
						$search_query = $_GET['user_query'];
						$get_konyvek = "select * from konyvek where cim like '%$search_query%'";
						$run_konyvek = mysqli_query($con, $get_konyvek);
	
						while($row_konyvek=mysqli_fetch_array($run_konyvek)){
						$id = $row_konyvek['id'];
						$cim = $row_konyvek['cim'];
						$iro = $row_konyvek['iro'];
						$ar = $row_konyvek['ar'];
						$megjelenes = $row_konyvek['megjelenes'];
						$kep = $row_konyvek['kep'];
		
						echo "
						<div id='single_konyv'>
						<h3>$cim</h3>
						<img src='admin/konyv_boritok/". $row_konyvek['kep'] ."' width='180' height='180' />
						<p><b> $ar Ft </b></p>
						<a href='details.php?id=$id' style='float:left;'>Részletek</a>
				
						<a href='index.php?id=$id'><button stle='float:right;'>Kosárhoz adás</button></a>
				
						</div>
		";
	}
					}
?>
					</div>
				</div>
		</div>
		<!--Content wrapper ends here-->
		
		<!--Footer starts here-->
		<div id="footer">Alsó 
		
		<h2 style="text-align:center; padding-top:30;">&copy; 2021 by www.OnlineTuting.com</h2>
		
		</div>
		<!--Footer ends here-->
		
	</div>
	<!--Main Container ends here-->
	
</body>
</html>