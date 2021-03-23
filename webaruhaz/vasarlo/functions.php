<?php
	
	$con = mysqli_connect("localhost","root","","webaruhaz");
	
function vasarlas(){
	echo "vasarlas"; 
	var_dump($_POST);
	if(isset($_POST['id'])){
		global $con;
		$id = $_POST['id'];
		$felhasznaloid=1;
		//$check_konyv = "select * from vasarlas where felhasznaloid='$felhasznaloid' AND konnyvid='$id'";
		//$run_check = mysqli_query($con, $check_konyv);
		var_dump($felhasznaloid);

				$insert_konyv = "insert into vasarlas (konnyvid,felhasznaloid) values ('$id','$felhasznaloid')";
				echo $insert_konyv;
				$run_konyvek = mysqli_query($con, $insert_konyv);
				echo "<script>window.open('index.php','_self')</script>";

		
	}
}

function osszes_konyv(){
	if(isset($_GET['id'])){
		global $con;
		$felhasznaloid=1;
		$get_konyvek = "select * from vasarlas where felhasznaloid='$felhasznaloid'";
		$run_konyvek = mysqli_query($con, $get_konyvek);
		$count_konyvek = mysqli_num_rows($run_konyvek);
	}
		else {
		global $con;
		$felhasznaloid=1;
		$get_konyvek = "select * from vasarlas where felhasznaloid='$felhasznaloid'";
		$run_konyvek = mysqli_query($con, $get_konyvek);
		$count_konyvek = mysqli_num_rows($run_konyvek);
		}
		echo $count_konyvek;
	}


function teljes_ar(){
	$teljes = 0;
	global $con;
	$felhasznaloid=1;
	$select_ar = "select * from vasarlas where felhasznaloid='$felhasznaloid'";
	$run_ar = mysqli_query($con, $select_ar);
	while ($p_ar=mysqli_fetch_array($run_ar)){
		$id = $p_ar['konnyvid'];
		$ar = "select * from konyvek where id='$id'";
		$run_konyv_ar = mysqli_query($con,$ar);
		while($pp_ar = mysqli_fetch_array($run_konyv_ar)){
			$ar = array($pp_ar['ar']);
			$values = array_sum($ar);
			$teljes +=$values;
		}
	}
	echo $teljes . "Ft";
}


//getting the categories

function getkategoria(){
	
	global $con;
	$get_kategoria = "select * from kategoria";
	$run_kategoria = mysqli_query($con, $get_kategoria);
	
	while ($row_kategoria=mysqli_fetch_array($run_kategoria)){
		$kategoriaid = $row_kategoria['kategoriaid'];
		$kategorianev = $row_kategoria['kategorianev'];
		
	echo "<li><a href='index.php?kategoria=$kategoriaid'>$kategorianev</a></li>";
	}
}

function getkonyvek(){
	
	if(!isset($_GET['kategoria'])){
	global $con;
	$get_konyvek = "select * from konyvek order by RAND() LIMIT 0,6";
	$run_konyvek = mysqli_query($con, $get_konyvek);
	
	while($row_konyvek=mysqli_fetch_array($run_konyvek)){
		$id = $row_konyvek['id'];
		$cim = $row_konyvek['cim'];
		$iro = $row_konyvek['iro'];
		$ar = $row_konyvek['ar'];
		$megjelenes = $row_konyvek['megjelenes'];
		$kep = $row_konyvek['kep'];
		
		echo "
			<div id='single_konyv'>
				<h3>$cim</h3>
				<img src='admin/konyv_boritok/". $row_konyvek['kep'] ."' width='180' height='180' />
				<p><b> Ár: $ar Ft </b></p>
				<a href='details.php?id=$id' style='float:left;'>Részletek</a>
				
				<a href='index.php?id=$id'><button style='float:right;' name='id' value ='$id'>Kosárhoz adás</button></a>
				
			</div>
		";
	}
}
}

function getkonyvek_kategoria(){
	
	if(isset($_GET['kategoria'])){
		
		$kategoriaid = $_GET['kategoria'];
		
	global $con;
	$get_kategoriaid = "select * from konyvek where kategoriaid='$kategoriaid'";
	$run_kategoriaid = mysqli_query($con, $get_kategoriaid);
	$count_kategoria = mysqli_num_rows($run_kategoriaid);
	
		if($count_kategoria==0){
	echo "<h2 style='padding:20px;'>Nincs termék ebben a ketegóriában!</h2>";
	}

	while($row_kategoriaid=mysqli_fetch_array($run_kategoriaid)){
		$id = $row_kategoriaid['id'];
		$cim = $row_kategoriaid['cim'];
		$iro = $row_kategoriaid['iro'];
		$ar = $row_kategoriaid['ar'];
		$megjelenes = $row_kategoriaid['megjelenes'];
		$kep = $row_kategoriaid['kep'];
		
		echo "
			<div id='single_konyv'>
				<h3>$cim</h3>
				<img src='admin/konyv_boritok/". $row_kategoriaid['kep'] ."' width='180' height='180' />
				<p><b> $ar Ft </b></p>
				<a href='details.php?id=$id' style='float:left;'>Részletek</a>
				
				<a href='index.php?add_vasarlas=$id'><button stle='float:right;'>Kosárhoz adás</button></a>
				
			</div>
		";
	}
}
}

?>