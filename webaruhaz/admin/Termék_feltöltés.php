<!DOCTYPE>
<?php
include("adatbázis/adatbázis.php");
?>
<html>
	<head>
		<title>Termék feltöltés</title>
	</head>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script> tinymce.init({selector:'textarea'}); </script>
	<body bgcolor="steelblue">
		<form action="Termék_feltöltés.php" method="post" enctype="multipart/form-data">
			
			<table align="center" width="700" border="2" bgcolor="lightsteelblue">
			
			<tr align="center">
				<td colspan="7"><h2>Insert New Post Here</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Könyv címe:</b></td>
				<td><input type="text" name="cim" size="60" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Kategória:</b></td>
				<td>
					<select name="kategoria" required>
						<option>Válassz egy kategóriát</option>
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
				<td><input type="text" name="iro" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Könyv ára:</b></td>
				<td><input type="text" name="ar" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Megjelenés</b></td>
				<td><input type="text" name="megjelenes" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Tartalom</b></td>
				<td><textarea name="tartalom" cols="40" rows="30" ></textarea></td>
			</tr>
			<tr>
				<td align="right"><b>Kép</b></td>
				<td><input type="file" name="kep" required/></td>
			</tr>
			<tr>
				<td align="right"><b>ISBN azonosító</b></td>
				<td><input type="text" name="isbn" required/></td>
			</tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="Hozzáadás" value="Hozzáadás"/></td>
			</tr>
			
		</form>
	</body>
</html>
<?php
	
	//getting the text data from the fields
	if(isset($_POST['Hozzáadás'])){
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
		
		move_uploaded_file($kep_tmp,"könyv_borítók/$kep");
		
		echo $insert_product = "insert into konyvek (cim,iro,ar,megjelenes,tartalom,kep,isbn,kategoria) values ('$cim','$iro','$ar','$megjelenes','$tartalom','$isbn','$kep','$kategoria')";
		
		$insert_pro = mysqli_query($con, $insert_product);
		if($insert_pro){
			echo "<script>alert('Könyv hozzáadva!')</script>";
			echo "<script>window.open('Termék_feltöltés.php','_self')</script>";
		}
	}
?>