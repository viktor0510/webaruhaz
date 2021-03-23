<?php
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<table width="795" align="center" bgcolor="lightsteelblue">

	<tr align="center">
		<td colspan="6"><h2>Összes kategória megtekintése</h2></td>
	</tr>
	
	<tr align="center" bgcolor="steelblue">
		<th>Kategória ID</th>
		<th>Kategória név</th>
		<th>Szerkesztés</th>
		<th>Törlés</th>
	</tr>
	
	<?php
		include("adatbázis/adatbázis.php");
		$get_kategoria = "select * from kategoria";
		$run_kategoria = mysqli_query($con, $get_kategoria);
		$i = 0;
		while ($row_kategoria=mysqli_fetch_array($run_kategoria)){
			$kategoriaid = $row_kategoria['kategoriaid'];
			$kategorianev = $row_kategoria['kategorianev'];
			$i++;
		
	?>	
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $kategorianev;?></td>
		<td><a href="index.php?szerkeszt_kategoria=<?php echo $kategoriaid; ?>">Szerkesztés</a></td>
		<td><a href="torol_kategoria.php?torol_kategoria=<?php echo $kategoriaid; ?>">Törlés</a></td>
	</tr>
		<?php } ?>
</table>
<?php } ?>