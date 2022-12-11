<?php
	session_start();
	if (empty($_SESSION['firstname']) and empty($_SESSION['memberid'])) {
		header('location: ../index.php');
	}
	else
		header('location: dashboard.php');
?>