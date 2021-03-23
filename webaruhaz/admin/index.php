<?php
session_start();
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>

<!DOCTYPE>
<html>
	<head>
		<title>Ez az Admin oldal</title>
		<link rel="stylesheet" href="stilus/admin_style.css" media="all" />
	</head>
	<body>
		<div class="main_wrapper">
			<div id="header"></div>
			
				<div id="jobb">
					<h2 style="text-align:center;">Tartalom Karbantartás:</h2>
					
						<a href="index.php?termek_adas">Új termék hozzáadása</a>
						<a href="index.php?termekek">Összes termék megtekintése</a>
						<a href="index.php?kategoria_adas">Új kategória hozzáadása</a>
						<a href="index.php?kategoriak">Összes kategória megtekintése</a>
						<a href="index.php?felhasznalok">Felhasználók megtekintése</a>
						<a href="index.php?vasarlasok">Vásárlások megtekintése</a>
						<a href="index.php?fizetesek">Fizetések megtekintése</a>
						<a href="kijelentkezes.php">Kijelentkezés</a>
				
				</div>
				<div id="bal">
					<?php
						if(isset($_GET['termek_adas'])){
							include("Termék_feltöltés.php");
						}
						
						if(isset($_GET['termekek'])){
							include("termekek_megtekintése.php");
						}
						
						if(isset($_GET['szerkeszt'])){
							include("szerkeszt.php");
						}
						
						if(isset($_GET['kategoria_adas'])){
							include("kategoria_adas.php");
						}
						
						if(isset($_GET['kategoriak'])){
							include("kategoriak.php");
						}
						
						if(isset($_GET['szerkeszt_kategoria'])){
							include("szerkeszt_kategoria.php");
						}
						
						if(isset($_GET['felhasznalok'])){
							include("felhasznalok.php");
						}
					?>
				</div>
				
		</div>
	</body>
</html>
<?php } ?>