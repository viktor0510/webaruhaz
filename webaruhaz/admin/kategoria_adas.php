<?php
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<form action="" method="post" style="padding:80px;">
	<b>Új kategória beillesztése:</b>
	<input type="text" name="uj_kategoria" required/>
	<input type="submit" name="hozzaadas" value="Kategória hozzáadása" />
</form>

<?php
	include("adatbázis/adatbázis.php");
	if(isset($_POST['hozzaadas'])){
		$uj_kategoria = $_POST['uj_kategoria'];
		$insert_kategoria = "insert into kategoria (kategorianev) values ('$uj_kategoria')";
		$run_kategoria = mysqli_query($con, $insert_kategoria);
		if($run_kategoria){
			echo "<script>alert('Új kategória beillesztve!')</script>";
			echo "<script>window.open('index.php?kategoriak','_self')</script>";
		}
	} 
?>
<?php } ?>