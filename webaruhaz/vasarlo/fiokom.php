
<?php 
?>
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
						<li><a href="fiokom.php?szerkesztes">Fiók szerkesztése</a></li>
						<li><a href="fiokom.php?valtoztatas">Jelszó változtatása</a></li>
						<li><a href="fiokom.php?torles">Fiók törlése</a></li>
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