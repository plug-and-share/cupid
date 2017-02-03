<?php
	// Talvez pode dar ruim, nao eh tao seguro assim
	session_start();
	session_unset();
	session_destroy();
	header("Location: home.php");
	exit;
?>
