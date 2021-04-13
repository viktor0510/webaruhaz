					<div id="kosar">
						<p style="font-size:18px; padding:5px; line-height:40px;">
							<?php
								if(isset($_SESSION['email_cim'])){
									echo "<b>Üdvözlet:</b>" . $_SESSION['email_cim'] . "<b style='color:white;'></b>";
								}
								else{
									echo "<b>Üdvözlet Látogató:</b>";
								}
							?>  
							<b style="color:yellow">Kosár -</b> Összes könyv: <?php osszes_konyv();?> - Teljes ár: <?php teljes_ar(); ?> <a href="kosar.php" style="color:yellow">Kosaramhoz</a>
							<?php
								if(!isset($_SESSION['email_cim'])){
									echo "<a href='fizetes.php' style='color:white;'>Belépés</a>";
								}
								else{
									echo"<a href='kijelentkezes.php' style='color:white;'>Kijelentkezés</a>";
								}
							?>
						</p>
					</div>
					<?php vasarlas(); ?>
					<form action = '' method = "POST">
					<div id="konyvek_doboz">
						<?php getkonyvek(); ?>
						<?php getkonyvek_kategoria(); ?>
					</div>
					</form>