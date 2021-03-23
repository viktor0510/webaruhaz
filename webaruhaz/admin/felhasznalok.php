<?php
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<table width="795" align="center" bgcolor="lightsteelblue">

	<tr align="center">
		<td colspan="6"><h2>Összes felhasználó megtekintése</h2></td>
	</tr>
	
	<tr align="center" bgcolor="steelblue">
		<th>Sorszám</th>
		<th>Felhasználónév</th>
		<th>Email cím</th>
		<th>Törlés</th>
	</tr>
	
	<?php
		include("adatbázis/adatbázis.php");
		$get_felhasznalo = "select * from felhasznalo";
		$run_felhasznalo = mysqli_query($con, $get_felhasznalo);
		$i = 0;
		while ($row_felhasznalo=mysqli_fetch_array($run_felhasznalo)){
			$felhasznalo_id = $row_felhasznalo['id'];
			$felhasznalo_nev = $row_felhasznalo['felhasznalo_nev'];
			$felhasznalo_email = $row_felhasznalo['email_cim'];
			$i++;
		
	?>	
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $felhasznalo_nev;?></td>
		<td><?php echo $felhasznalo_email;?></td>
		<td><a href="torol_felhasznalo.php?torol_felhasznalo=<?php echo $felhasznalo_id; ?>">Törlés</a></td>
	</tr>
		<?php } ?>
</table>
<?php } ?>