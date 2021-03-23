<?php
session_start();
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<?php
include("adatbázis/adatbázis.php");
	if(isset($_GET['torol'])){
		$delete_id = $_GET['torol'];
		$delete_konyv = "delete from konyvek where id='$delete_id'";
		$run_delete = mysqli_query($con, $delete_konyv);
		if($run_delete){
			echo "<script>alert('A könyv törölve lett!')</script>";
			echo "<script>window.open('index.php?termekek_megtekintése','_self')</script>";
		}
	}
?>
<?php } ?>