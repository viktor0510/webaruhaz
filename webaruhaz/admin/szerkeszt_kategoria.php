<?php
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<?php
include("adatbázis/adatbázis.php");
if(isset($_GET['szerkeszt_kategoria'])){
	$kategoriaid = $_GET['szerkeszt_kategoria'];
	$get_kategoria = "select * from kategoria where kategoriaid='$kategoriaid'";
	$run_kategoria = mysqli_query($con, $get_kategoria);
	$row_kategoria = mysqli_fetch_array($run_kategoria);
	$kategoriaid = $row_kategoria['kategoriaid'];
	$kategorianev = $row_kategoria['kategorianev'];
}
?>
<form action="" method="post" style="padding:80px;">
	<b>Kategória módosítása:</b>
	<input type="text" name="uj_kategoria" value="<?php echo $kategorianev;?>"/>
	<input type="submit" name="modositas" value="Kategória módosítása" />
</form>

<?php
	if(isset($_POST['modositas'])){
		$update_id = $kategoriaid;
		$uj_kategoria = $_POST['uj_kategoria'];
		$update_kategoria = "update kategoria set kategorianev='$uj_kategoria' where kategoriaid='$update_id'";
		$run_kategoria = mysqli_query($con, $update_kategoria);
		if($run_kategoria){
			echo "<script>alert('Kategória módosításra került!')</script>";
			echo "<script>window.open('index.php?kategoriak','_self')</script>";
		}
	} 
?>
<?php } ?>