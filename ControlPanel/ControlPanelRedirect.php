<?php
	session_start();
	if (isset($_SESSION['user'])) {
		header("Location: ControlPanelLogin.html");
	 } else {
	 	header("Location: ../Home/home.php");
	 }
	exit;
?>
