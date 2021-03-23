<?php
session_start();
?>
<!DOCTYPE>
<html>
	<head>
		<title>Bejelentkezés</title>
		<link rel="stylesheet" href="stilus/bejelentkezes_style.css" media="all" />
	</head>
	<body>
		<div class="wrapper">
		<h2 style="color:white; text-align:center;"><?php echo @$_GET['nem_admin'];?></h2>
		<h2 style="color:white; text-align:center;"><?php echo @$_GET['kijelentkezett'];?></h2>
			<form class="form-signin" method="post" action="bejelentkezes.php">       
				<h2 class="form-signin-heading">Admin bejelentkezés</h2>
					<input type="text" class="form-control" name="email" placeholder="Email cím" required="required" autofocus="" />
					<input type="password" class="form-control" name="jelszo" placeholder="Jelszó" required="required"/>
				<button class="btn btn-lg btn-primary btn-block" name="bejelentkezes" type="submit">Bejelentkezés</button>   
			</form>
		</div>
	</body>
</html>
<?php
include("adatbázis/adatbázis.php");
if(isset($_POST['bejelentkezes'])){
	$email =($_POST['email']);
	$jelszo =($_POST['jelszo']);
	
	$select_admin = "select * from admin where email='$email' AND jelszo='$jelszo'";
	$run_admin = mysqli_query($con, $select_admin);
	$check_admin = mysqli_num_rows($run_admin);
	if($check_admin==0){
		echo "<script>alert('Az email cím vagy jelszó hibás!')</script>";
	}
	else{
		$_SESSION['email']=$email;
		echo "<script>window.open('index.php?bejelentkezett=Bejelentkezés sikeres volt!','_self')</script>";
	}
}
?>