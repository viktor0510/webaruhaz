<h2 style="text-align:center;">Változtasd meg jelszavad</h2>

<form action="" method="post">
	<table align="center" width="600">
	
	<tr>
	<td align="right"><b>Írd be jelenlegi jelszavad:</b></td>
	<td><input type="password" name="jelenlegi_jelszo" required></td>
	</tr>
	
	<tr>
	<td align="right"><b>Írd be új jelszavad:</b></td>
	<td><input type="password" name="uj_jelszo" required></td>
	</tr>
	
	<tr>
	<td align="right"><b>Írd be új jelszavad mégegyszer:</b></td>
	<td><input type="password" name="uj_jelszo_megerosites" required></td>
	</tr>
	
	<tr align="center">
	<td colspan="3"><input type="submit" name="jelszo_valt" value="Jelszó megváltoztatása"/></td>
	</tr>
	
	</table>
</form>
<?php
include("tartalmak/adatbázis.php");

$felhasznalo = $_SESSION['email_cim'];

if(isset($_POST['jelszo_valt'])){
	$jelenlegi_jelszo = $_POST['jelenlegi_jelszo'];
	$uj_jelszo = $_POST['uj_jelszo'];
	$uj_jelszo_megerosites = $_POST['uj_jelszo_megerosites'];
	
	$select_jelszo = "select * from felhasznalo where jelszo='$jelenlegi_jelszo' AND email_cim='$felhasznalo'";
	$run_jelszo = mysqli_query($con, $select_jelszo);
	$check_jelszo = mysqli_num_rows($run_jelszo);
	if($check_jelszo==0){
		echo "<script>alert('A jelszavad helytelen!')</script>";
		exit();
	}
	if($uj_jelszo!=$uj_jelszo_megerosites){
		echo "<script>alert('Az új jelszavad nem egyezik!')</script>";
		exit();
	}
	else{
		$update_jelszo = "update felhasznalo set jelszo='$uj_jelszo' where email_cim='$felhasznalo'";
		$run_update = mysqli_query($con, $update_jelszo);
		echo "<script>alert('A jelszavad sikeresen megváltozott!')</script>";
		"<script>window.open('fiokom.php','_self')</script>";
	}
}
?>