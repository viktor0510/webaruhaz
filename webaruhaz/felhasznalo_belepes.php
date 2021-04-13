<?php
include("tartalmak/adatbázis.php");
if (filter_input(INPUT_POST, 'login', FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    if(isset($_POST['belepes'])){
			$email = $_POST['email'];
			$jelszo = $_POST['jelszo'];
			$select_felhasznalo = "select * from felhasznalo where jelszo='$jelszo' AND email_cim='$email'";
			$run_felhasznalo = mysqli_query($con, $select_felhasznalo);
			$check_felhasznalo = mysqli_num_rows($run_felhasznalo);
			if($check_felhasznalo==0){
				echo "<script>alert('Jelszó vagy email cím helytelen!')</script>";
				exit();
			}
                        $_SESSION['login'] = true;
			$_SESSION['user'] = $run_felhasznalo->fetch_array(MYSQLI_ASSOC);
			$felhasznaloid=$_SESSION['user']['id'];
			$select_kosar = "select * from vasarlas where felhasznaloid='".$felhasznaloid."'";
			$run_kosar = mysqli_query($con, $select_kosar);
			$check_kosar = mysqli_num_rows($run_kosar);
			if($check_felhasznalo>0 AND $check_kosar==0){
				$_SESSION['email_cim']=$email;
				echo "<script>alert('Sikerült a bejelentkezés!')</script>";
				echo "<script>window.open('vasarlo/fiokom.php','_self)</script>";
			}
			else{
				$_SESSION['email_cim']=$email;
				echo "<script>alert('Sikerült a bejelentkezés!')</script>";
				echo "<script>window.open('fizetes.php','_self)</script>";
			}
		}
}
?>
<div>
	<form method="post" action="">
		<table width="500" align="center" bgcolor="skyblue">
			<tr align="center">
				<td colspan="3"><h2>Jelentkezz be vagy Regisztrálj a vásárláshoz!</h2></td>
			</tr>
			<tr>
				<td align="right"><b>Email cím:</b></td>
				<td><input type="text" name="email" placeholder="Email hozzáadása" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Jelszó:</b></td>
				<td><input type="password" name="jelszo" placeholder="Jelszó hozzáadása" required/></td>
			</tr>
			<tr align="center">
				<td colspan="3"><a href="fizetes.php?elfelejtett_jelszo">Elfelejtetted a jelszavad?</a></td>
			</tr>
			<tr align="center">
                            <td colspan="3"><input type="submit" name="belepes" value="Belépés"/><input type="hidden" name="login" value="true"></td>
			</tr>
		</table>
		<h2 style="float:right; padding-right:20px;"><a href="felhasznalo_regisztracio.php" style="text-decoration:none;">Regisztráció az oldalra!</a><h2>
	</form>
	<?php
		
	?>
</div>