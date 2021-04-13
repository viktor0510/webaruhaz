<body>
	
	<!--Main Container starts here-->
	<div class="main_wrapper">
		
		<!--Header starts here-->
		<div class="header_wrapper">
		
			<a href="index.php"><img id="logo" src="kepek/logo.jpg" /> </a>
                <div></div>
		</div>
		<!--Header ends here-->
		
		<!--Navigation bar starts here-->
		<div class="menubar container">
                    <nav class="navbar navbar-light bg-dark">		
                                <ul class="navbar-nav mr-auto" id="menu">
                                        <li class="nav-item"><a class="nav-item" href="index.php">Főoldal</a></li>
					<li class="nav-item"><a class="nav-item" href="index.php?menupont=osszes">Összes termék</a></li>
                                        <li class="nav-item dropdown"><a class="nav-item dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="index.php?menupont=fiok">Fiókom</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Fiók szerkesztése</a>
                                                <a class="dropdown-item" href="#">Jelszó változtatása</a>
                                                <a class="dropdown-item" href="#">Fiók törlése</a>
                                            </div>
                                        </li>
					<li class="nav-item"><a class="nav-item" href="index.php?menupont=regisztracio">Regisztráció</a></li>
					<li class="nav-item"><a class="nav-item" href="index.php?menupont=kosar">Kosár</a></li>
				</ul>
				
<!--			<div id="form">-->
<form class="form-inline my-2" method="get" action="results.php" enctype="multipart/form-data">
    <input class="form-control mr-2" type="search" name="user_query" placeholder="Keress könyvünkre" />
    <button class="btn btn-outline-success" type="submit" name="search" value="Keresés" >Keresés </button>
				</form>
<!--			</div>-->
                    </nav>
		</div>
		<!--Navigation bar ends here-->
		
		<!--Content wrapper starts here-->
		<div class="content_wrapper">
				<div id="sidebar">
					<div id="sidebar_title">Kategóriák</div>
					<ul id="kategoriak">
						<?php getkategoria(); ?>
					<ul>
				</div>
		
				<div id="content_area">