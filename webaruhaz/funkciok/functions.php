<?php
	
	$con = mysqli_connect("localhost","root","","webaruhaz");
	
//getting the categories

function getkategoria(){
	
	global $con;
	$get_kategoria = "select * from kategoria";
	$run_kategoria = mysqli_query($con, $get_kategoria);
	
	while ($row_kategoria=mysqli_fetch_array($run_kategoria)){
		$kategoriaid = $row_kategoria['kategoriaid'];
		$kategorianev = $row_kategoria['kategorianev'];
		
	echo "<li><a href='#'>$kategorianev</a></li>";
	}
}

?>