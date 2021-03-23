<!DOCTYPE>
<?php 
session_start();
require_once("funkciok/functions.php");
?>
<html>
    <head>
    <title>Mousetrap webáruház</title>
	<link rel="stylesheet" href="stílusok/style.css" media="all" />
    </head>

<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
		
		<!--Header starts here-->
		<div class="header_wrapper">
		
			<a href="../index.php"><img id="logo" src="kepek/logo.jpg" /> </a>
		</div>
		<!--Header ends here-->
		
		<!--Navigation bar starts here-->
		<div class="menubar">
				
				<ul id="menu">
					<li><a href="../index.php">Főoldal</a></li>
					<li><a href="../összes_termék.php">Összes termék</a></li>
					<li><a href="../fiokom.php">Fiókom</a></li>
					<li><a href="#">Regisztráció</a></li>
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
					<div id="sidebar_title">Fiókom:</div>
					<ul id="kategoriak">
					<?php
						$felhasznalom = $_SESSION['email_cim'];
						$get_megjegyzes = "select * from felhasznalo where email_cim='$felhasznalom'";
						$run_megjegyzes = mysqli_query($con, $get_megjegyzes);
						$row_megjegyzes = mysqli_fetch_array($run_megjegyzes);
						$check_megjegyzes = $row_megjegyzes['megjegyzes'];
						$check_felhasznalo_nev = $row_megjegyzes['felhasznalo_nev'];
					?>
						<li><a href="fiokom.php?rendeleseim">Rendeléseim</a></li>
						<li><a href="fiokom.php?szerkesztes">Fiók szerkesztése</a></li>
						<li><a href="fiokom.php?valtoztatas">Jelszó változtatása</a></li>
						<li><a href="fiokom.php?torles">Fiók törlése</a></li>
						<li><a href="kijelentkezes.php">Kilépés</a></li>
					<ul>
				</div>
		
				<div id="content_area">
					<div id="kosar">
						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
							<?php
								if(isset($_SESSION['email_cim'])){
									echo "<b>Üdvözlet:</b>" . $_SESSION['email_cim'];
								}
							?>  
							<?php
								if(!isset($_SESSION['email_cim'])){
									echo "<a href='fizetes.php' style='color:white;'>Belépés</a>";
								}
								else{
									echo"<a href='kijelentkezes.php' style='color:white;'>Kijelentkezés</a>";
								}
							?>
						</span>
					</div>
					<?php vasarlas(); ?>
					<form action = '' method = "POST">
					<div id="konyvek_doboz">
						<?php
							if(!isset($_GET['rendeleseim'])){
								if(!isset($_GET['szerkesztes'])){
									if(!isset($_GET['valtoztatas'])){
										if(!isset($_GET['torles'])){
											echo 
											 "LOL";
											
										}
									}
								}
							}
						?>
						<?php
							if(isset($_GET['szerkesztes'])){
								include("szerkesztes.php");
							}
						?>
						<?php
							if(isset($_GET['valtoztatas'])){
								include("valtoztatas.php");
							}
							if(isset($_GET['torles'])){
								include("torles.php");
							}
						?>
					</div>
					</form>
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