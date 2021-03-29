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
					<li><a href="összes_termék.php">Összes termék</a></li>
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
						<span style="float:right; font-size:17px; padding:5px; line-height:40px;">
							<?php
								if(isset($_SESSION['email_cim'])){
									echo "<b>Üdvözlet:</b>" . $_SESSION['email_cim'] . "<b style='color:white;'></b>";
								}
								else{
									echo "<b>Üdvözlet Látogató:</b>";
								}
							?> 
							<b style="color:yellow">Kosár -</b> Összes könyv: <?php osszes_konyv();?> - Teljes ár: <?php teljes_ar(); ?> <a href="index.php" style="color:yellow">Vissza a vásárláshoz!</a>
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
					<div id="konyvek_doboz">
						<form action ="" method = "POST" enctype="multipart/form-data">
							<table align="center" width="700" bgcolor="skyblue">
								<tr align="center">
									<th>Eltávolítás</th>
									<th>Termék(ek)</th>
									<th>Mennyiség</th>
									<th>Teljes Ár</th>
								</tr>
								
								<?php
									$teljes = 0;
									global $con;
									$felhasznaloid=$_SESSION['user']['id'];
									$select_ar = "select * from vasarlas where felhasznaloid='$felhasznaloid'";
									$run_ar = mysqli_query($con, $select_ar);
									while ($p_ar=mysqli_fetch_array($run_ar)){
										$id = $p_ar['konnyvid'];
										$ar = "select * from konyvek where id='$id'";
										$run_konyv_ar = mysqli_query($con,$ar);
										while ($pp_ar = mysqli_fetch_array($run_konyv_ar)){
											$ar = array($pp_ar['ar']);
											$cim = $pp_ar['cim'];
											$kep = $pp_ar['kep'];
											$darab_ar = $pp_ar['ar'];
											$values = array_sum($ar);
											$teljes +=$values;

								?>
								
								<tr align="center">
									<td><input type="checkbox" name="eltavolitas[]" value="<?php echo $id;?>"/></td>
									<td><?php echo $cim; ?><br>
									<img src="admin/konyv_boritok/<?php echo $kep;?>" width="60" height="60" </td>
									<td><input type="text" size="4" name="darab" value="<?php echo $_SESSION['db'];?>"/></td>
									<?php 
										if(isset($_POST['vasarlas_frissites'])){
											$darab = $_POST['darab'];
											$update_darab = "update vasarlas set db='$darab'";
											$run_darab = mysqli_query($con, $update_darab);
											$_SESSION['db']=$darab;
											$teljes = $teljes*(int)$darab;
										}
									?>
									<td><?php echo $darab_ar; ?></td>
									
									<?php } } ?>
									
								<tr align="right">
									<td colspan="4"><b>Fizetendő összeg:</b></td>
									<td colspan="4"><?php echo $teljes . " Ft";?></td>
								</tr>
								</tr>
								
								<tr align="center">
									<td colspan="2"><input type="submit" name="vasarlas_frissites" value="Vásárlás frissítése"/></td>
									<td><input type="submit" name="folytatas" value="Vásárlás folytatása"/></td>
									<td><button><a href="fizetes.php" style="text-decoration:none; color:black;">Fizetés</a></button></td>
								</tr>
							</table>
						</form>
						
						<?php 
						function kosar_frissites(){
							global $con;
							$felhasznaloid=$_SESSION['user']['id'];
							if(isset($_POST['vasarlas_frissites'])){
								foreach($_POST['eltavolitas'] as $eltavolitas_id){
									$delete_konyv = "delete from vasarlas where konnyvid='$eltavolitas_id' AND felhasznaloid='$felhasznaloid'";
									$run_eltavolitas = mysqli_query($con, $konyv_eltavolitas);
									if($run_eltavolitas){
										echo "<script>window.open('kosar.php','_self')</script>";
									}
								}
							}
							if(isset($_POST['folytatas'])){
								echo "<script>window.open('index.php','_self')</script>";
							}
							echo $update_kosar = kosar_frissites();
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