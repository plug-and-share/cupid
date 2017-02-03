<?php
	// Talvez pode dar ruim, nao eh tao seguro assim
	session_start();
	if (isset($_SESSION['user'])) {
		header("Location: documentationlogin.html");
	 } else {
	 	header("Location: documentation.html");
	 }
	exit;
?>
