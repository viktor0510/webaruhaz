<?php 
session_start();
require_once("funkciok/functions.php");
require_once './head.php';
require_once './fejlec.php';
$menupont = filter_input(INPUT_GET, 'menupont');
$login = isset($_SESSION['login']) && $_SESSION['login'];
if (isset($_SESSION['login']) && $_SESSION['login']) {
    switch ($menupont){
        case 'osszes':
            require_once './osszes_termek.php';
            break;
        case 'fiok':
            require_once './vasarlo/fiokom.php';
            break;
        case 'regisztracio':
            require_once './felhasznalo_regisztracio.php';
            break;
        case 'kosar':
            require_once './kosar.php';
            break;
        default:
            require_once './home.php';
    }
   
}
else {
    require_once './felhasznalo_belepes.php';
}
?>




<?php
require_once './lablec.php';

		