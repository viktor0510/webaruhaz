<?php
include("tartalmak/adatbázis.php");

$felhasznalom = $_SESSION['email_cim'];
$get_vasarlo = "select * from felhasznalo where email_cim='$felhasznalom'";
$run_vasarlo = mysqli_query($con, $get_vasarlo);
$row_vasarlo = mysqli_fetch_array($run_vasarlo);

$azonosito = $row_vasarlo['id'];
$nev = $row_vasarlo['felhasznalo_nev'];
$email = $row_vasarlo['email_cim'];
$jelszo = $row_vasarlo['jelszo'];
$informacio = $row_vasarlo['megjegyzes'];
?>
						<form action="" method="post">
							<table align="center" width="750">
								<tr>
									<td><h2>Fiók szerkesztése</h2></td>
								</tr>
								<tr>
									<td align="right">Felhasználónév:</td>
									<td><input type="text" name="felhasznalonev" value="<?php echo $nev;?>" required/></td>
								</tr>
								<tr>
									<td align="right">Email cím:</td>
									<td><input type="text" name="email" value="<?php echo $email;?>"  required/></td>
								</tr>
								<tr>
									<td align="right">Jelszó</td>
									<td><input type="password" name="jelszo" value="<?php echo $jelszo;?>" required/></td>
								</tr>
								<tr>
									<td align="right">Információ</td>
									<td><textarea cols="30" rows="20" name="megjegyzes" value="<?php echo $informacio;?>"></textarea></td>
								</tr>
								<tr>
									<td><input type="submit" name="modositas" value="Fiók módosítása"/></td>
								</tr>
							</table>
						</form>
<?php
	if(isset($_POST['update'])){
		
		$felhasznaloid=1;
		$id = $_POST['azonosito'];
		$felhasznalonev = $_POST['felhasznalonev'];
		$email = $_POST['email'];
		$jelszo = $_POST['jelszo'];
		$megjegyzes = $_POST['megjegyzes'];
		
		$update_felhasznalo = "update felhasznalo set felhasznalo_nev='$felhasznalonev', email_cim='$email', jelszo='$jelszo', megjegyzes='$megjegyzes' where felhasznaloid='$felhasznaloid'";
		$run_update = mysqli_query($con, $update_felhasznalo);
		if($run_update){
			echo "<script>alert('A fiókod frissítve lett!')</script>";
			echo "<script>window.open('fiokom.php', '_self')</script>";
		}
	}
?>