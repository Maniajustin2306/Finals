<?php
	session_start();
	header('location: pageConfirmation.php');
	if ($_SESSION['pageCon'] == 'pageCon') {
		header('location: pageConfirmation.php');
	}
?>