<?php
session_start();
session_destroy();
echo "<script>window.open('bejelentkezes.php?kijelentkezett=Kijelentkeztél az Admin fiókból!','_self')</script>";
?>