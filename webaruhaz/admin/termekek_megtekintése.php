<?php
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<table width="795" align="center" bgcolor="lightsteelblue">

	<tr align="center">
		<td colspan="6"><h2>Összes termék megtekintése</h2></td>
	</tr>
	
	<tr align="center" bgcolor="steelblue">
		<th>Sorszám</th>
		<th>Cím</th>
		<th>Kép</th>
		<th>Ár</th>
		<th>ISBN</th>
		<th>Szerkesztés</th>
		<th>Törlés</th>
	</tr>
	
	<?php
		include("adatbázis/adatbázis.php");
		$get_konyv = "select * from konyvek";
		$run_konyv = mysqli_query($con, $get_konyv);
		$i = 0;
		while ($row_konyv=mysqli_fetch_array($run_konyv)){
			$konyv_id = $row_konyv['id'];
			$konyv_cim = $row_konyv['cim'];
			$konyv_kep = $row_konyv['kep'];
			$konyv_ar = $row_konyv['ar'];
			$konyv_isbn = $row_konyv['isbn'];
			$i++;
		
	?>	
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $konyv_cim;?></td>
		<td><img src="konyv_boritok/<?php echo $konyv_kep;?>" width="60" height="70"/></td>
		<td><?php echo $konyv_ar;?></td>
		<td><?php echo $konyv_isbn;?></td>
		<td><a href="index.php?szerkeszt=<?php echo $konyv_id; ?>">Szerkesztés</a></td>
		<td><a href="torol.php?torol=<?php echo $konyv_id; ?>">Törlés</a></td>
	</tr>
		<?php } ?>
</table>
<?php } ?>