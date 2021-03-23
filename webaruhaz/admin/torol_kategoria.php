<?php
session_start();
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<?php
include("adatbázis/adatbázis.php");
	if(isset($_GET['torol_kategoria'])){
		$delete_id = $_GET['torol_kategoria'];
		$delete_kategoria = "delete from kategoria where kategoriaid='$delete_id'";
		$run_delete = mysqli_query($con, $delete_kategoria);
		if($run_delete){
			echo "<script>alert('A kategória törölve lett!')</script>";
			echo "<script>window.open('index.php?kategoriak','_self')</script>";
		}
	}
?>
<?php } ?>