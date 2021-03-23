<br>
<h2 style="text-align:center;">Törölni szeretnéd fiókodat?</h2>

<form action="" method="post">
	
	<br>
	<input type="submit" name="igen" value="Igen, szeretném törölni" />
	<input type="submit" name="nem" value="Nem szeretném törölni" />
	
</form>
<?php
include("tartalmak/adatbázis.php");
	
	$felhasznalo = $_SESSION['email_cim'];
	
	if(isset($_POST['igen'])){
		$delete_vasarlo = "delete from felhasznalo where email_cim='$felhasznalo'";
		$run_vasarlo = mysqli_query($con, $delete_vasarlo);
		echo "<script>alert('A fiókod törölve lett!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
	if(isset($_POST['nem'])){
		echo "<script>alert('További kellemes böngészést!')</script>";
		echo "<script>window.open('fiokom.php','_self')</script>";
	}
?>