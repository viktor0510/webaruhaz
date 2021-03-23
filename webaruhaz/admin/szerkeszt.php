<?php
session_start();
if(!isset($_SESSION['email'])){
	echo "<script>window.open('bejelentkezes.php?nem_admin=Nem vagy Admin!','_self')</script>";
}
else{
	
?>
<!DOCTYPE>
<?php
include("adatbázis/adatbázis.php");
if(isset($_GET['szerkeszt'])){
	$get_id = $_GET['szerkeszt'];
	$get_konyv = "select * from konyvek where id='$get_id'";
		$run_konyv = mysqli_query($con, $get_konyv);
		$i = 0;
		$row_konyv=mysqli_fetch_array($run_konyv);
			$konyv_id = $row_konyv['id'];
			$konyv_cim = $row_konyv['cim'];
			$konyv_kep = $row_konyv['kep'];
			$konyv_ar = $row_konyv['ar'];
			$konyv_isbn = $row_konyv['isbn'];
			$konyv_tartalom = $row_konyv['tartalom'];
			$konyv_iro = $row_konyv['iro'];
			$konyv_megjelenes = $row_konyv['megjelenes'];
			$konyv_kategoriaid = $row_konyv['kategoriaid'];
			
			$get_kategoria = "select * from kategoria where kategoriaid='$konyv_kategoriaid'";
			$run_kategoria = mysqli_query($con, $get_kategoria);
			$row_kategoria = mysqli_fetch_array($run_kategoria);
			$kategoria_nev = $row_kategoria['kategorianev'];
}
?>
<html>
	<head>
		<title>Termék módosítása</title>
	</head>
	<body bgcolor="steelblue">
		<form action="" method="post" enctype="multipart/form-data">
			
			<table align="center" width="795" height="800" border="2" bgcolor="lightsteelblue">
			
			<tr align="center">
				<td colspan="7"><h2>Könyv módosítása</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Könyv címe:</b></td>
				<td><input type="text" name="cim" size="60" value="<?php echo $konyv_cim;?>"/></td>
			</tr>
			<tr>
				<td align="right"><b>Kategória:</b></td>
				<td>
					<select name="kategoria" required>
						<option><?php echo $kategoria_nev; ?></option>
						<?php
							$get_kategoria = "select * from kategoria";
							$run_kategoria = mysqli_query($con, $get_kategoria);
	
							while ($row_kategoria=mysqli_fetch_array($run_kategoria)){
								$kategoriaid = $row_kategoria['kategoriaid'];
								$kategorianev = $row_kategoria['kategorianev'];
		
							echo "<option value='$kategoriaid'>$kategorianev</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right"><b>Író neve:</b></td>
				<td><input type="text" name="iro" value="<?php echo $konyv_iro;?>"/></td>
			</tr>
			<tr>
				<td align="right"><b>Könyv ára:</b></td>
				<td><input type="text" name="ar" value="<?php echo $konyv_ar;?>"/></td>
			</tr>
			<tr>
				<td align="right"><b>Megjelenés</b></td>
				<td><input type="text" name="megjelenes" value="<?php echo $konyv_megjelenes;?>"/></td>
			</tr>
			<tr>
				<td align="right"><b>Tartalom</b></td>
				<td><textarea name="tartalom" cols="40" rows="30" ><?php echo $konyv_tartalom;?></textarea></td>
			</tr>
			<tr>
				<td align="right"><b>Kép</b></td>
				<td><input type="file" name="kep"/><img src="konyv_boritok/<?php echo $konyv_kep; ?>" width="60" height="70"/></td>
			</tr>
			<tr>
				<td align="right"><b>ISBN azonosító</b></td>
				<td><input type="text" name="isbn" value="<?php echo $konyv_isbn;?>"/></td>
			</tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="modositas" value="Módosítás"/></td>
			</tr>
			
		</form>
	</body>
</html>
<?php
	//getting the text data from the fields
	$update_id = $konyv_id;
	if(isset($_POST['modositas'])){
		$cim = $_POST['cim'];
		$kategoria = $_POST['kategoria'];
		$iro = $_POST['iro'];
		$ar = $_POST['ar'];
		$megjelenes = $_POST['megjelenes'];
		$tartalom = $_POST['tartalom'];
		$isbn = $_POST['isbn'];
		
	//getting the image from the field
		$kep = $_FILES['kep']['name']; 
		$kep_tmp = $_FILES['kep']['tmp_name'];
		
		move_uploaded_file($kep_tmp,"konyv_boritok/$kep");
		
		echo $update_konyv = "update konyvek set kategoria='$kategoria',cim='$cim',iro='$iro',ar='$ar',megjelenes='$megjelenes',tartalom='$tartalom',kep='$kep',isbn='$isbn' where kategoria='$update_id'";
		
		$run_konyv = mysqli_query($con, $update_konyv);
		if($run_konyv){
			echo "<script>alert('Könyv módosítva!')</script>";
			echo "<script>window.open('index.php?termekek_megtekintése','_self')</script>";
		}
	}
?>
<?php } ?>