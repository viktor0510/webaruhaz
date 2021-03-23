<!DOCTYPE>
<?php 
session_start();
require_once("funkciok/functions.php");
include("tartalmak/adatbázis.php");
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
					<li><a href="vasarlo/fiokom.php">Fiókom</a></li>
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
					<div id="sidebar_title">Kategóriák</div>
					<ul id="kategoriak">
						<?php getkategoria(); ?>
					<ul>
				</div>
		
				<div id="content_area">
					<div id="kosar">
						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
							Üdvözlet látogató! <b style="color:yellow">Kosár -</b> Összes könyv: <?php osszes_konyv();?> - Teljes ár: <?php teljes_ar(); ?> <a href="kosar.php" style="color:yellow">Kosaramhoz</a>
						</span>
					</div>
						<form action="felhasznalo_regisztracio.php" method="post">
							<table align="center" width="750">
								<tr>
									<td><h2>Fiók létrehozása</h2></td>
								</tr>
								<tr>
									<td align="right">Felhasználónév:</td>
									<td><input type="text" name="felhasznalonev" required/></td>
								</tr>
								<tr>
									<td align="right">Email cím:</td>
									<td><input type="text" name="email" required/></td>
								</tr>
								<tr>
									<td align="right">Jelszó</td>
									<td><input type="password" name="jelszo" required/></td>
								</tr>
								<tr>
									<td align="right">Információ</td>
									<td><textarea cols="30" rows="20" name="megjegyzes"></textarea></td>
								</tr>
								<tr>
									<td><input type="submit" name="regisztracio" value="Fiók létrehozása"/></td>
								</tr>
							</table>
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
<?php
	if(isset($_POST['regisztracio'])){
		
		$felhasznalonev = $_POST['felhasznalonev'];
		$email = $_POST['email'];
		$jelszo = $_POST['jelszo'];
		$megjegyzes = $_POST['megjegyzes'];
		
		$insert_felhasznalo = "insert into felhasznalo (email_cim,felhasznalo_nev,jelszo,megjegyzes) values('$email','$felhasznalonev','$jelszo','$megjegyzes')";
		$run_felhasznalo = mysqli_query($con, $insert_felhasznalo);
		$select_kosar = "select * from vasarlas where felhasznaloid='$id'";
		$run_kosar = mysqli_query($con, $select_kosar);
		$check_kosar = mysqli_num_rows($run_kosar);
		if($check_kosar==0){
			$_SESSION['email_cim']=$email;
			echo "<script>alert('A fiók létrejött sikeresen!')</script>";
			echo "<script>window.open('vasarlo/fiokom.php','_self)</script>";
		}
		else{
			$_SESSION['email_cim']=$email;
			echo "<script>alert('A fiók létrejött sikeresen!')</script>";
			echo "<script>window.open('fizetes.php','_self)</script>";
		}
	}
?>