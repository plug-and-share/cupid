<?php
	// Talvez pode dar ruim, nao eh tao seguro assim
	session_start();
	if (isset($_SESSION['user'])) {
		header("Location: homelogin.html");
	 } else {
	 	header("Location: home.html");
	 }
	exit;
?>
