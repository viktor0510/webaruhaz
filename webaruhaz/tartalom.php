<?php
switch ($menupont) {
    case "fooldal":
        require_once 'index.php';
        break;
    case "összes_termék":
        require_once 'osszes_termek.php.php';
        break;
    case "fiokom":
        require_once 'vasarlo/fiokom.php';
        break;
    case "regisztracio":
        require_once 'felhasznalo_regisztracio.php';
        break;
    case "kosar":
        require_once 'kosar.php';
        break;
    case "elerhetoseg":
        require_once '#';
        break;
    default:
        break;
}
