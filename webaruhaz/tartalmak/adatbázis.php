<?php

$mysqli = new mysqli("localhost", "root", "", "webaruhaz");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$mysqli->set_charset("utf8mb4");