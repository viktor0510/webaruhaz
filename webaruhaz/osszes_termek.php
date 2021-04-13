<!DOCTYPE>
<?php 

?>
<html>
    <head>
    <title>Mousetrap webáruház</title>
	<link rel="stylesheet" href="stilusok/style.css" media="all" />
    </head>

<body>
				<div id="content_area">
				
					<div id="kosar">
						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
							Üdvözlet látogató! <b style="color:yellow">Kosár -</b> Összes könyv - Teljes ár: <a href="kosar.php" style="color:yellow">Kosaramhoz</a>
						</span>
					</div>
				
					<div id="konyvek_doboz">
					<?php
						$get_konyvek = "select * from konyvek";
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
						<p><b> $ar Ft </b></p>
						<a href='details.php?id=$id' style='float:left;'>Részletek</a>
				
						<a href='index.php?id=$id'><button stle='float:right;'>Kosárhoz adás</button></a>
				
						</div>
		";
	}
?>
					</div>
				</div>
		</div>
		<!--Content wrapper ends here-->
		

	</div>
	<!--Main Container ends here-->
	
</body>
</html>