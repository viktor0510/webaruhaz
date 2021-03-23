<?php
session_start();
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<?php
include("adatbázis/adatbázis.php");
	if(isset($_GET['torol_felhasznalo'])){
		$delete_id = $_GET['torol_felhasznalo'];
		$delete_felhasznalo = "delete from felhasznalo where id='$delete_id'";
		$run_delete = mysqli_query($con, $delete_felhasznalo);
		if($run_delete){
			echo "<script>alert('A felhasználó törölve lett!')</script>";
			echo "<script>window.open('index.php?felhasznalok','_self')</script>";
		}
	}
?>
<?php } ?>