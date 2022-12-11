<?php session_start(); ?>
<?php require_once('functions.php'); ?>
<?php require_once('signincode.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<script language="javascript" type="text/javascript">window.history.forward()</script>
	<title>ShoePee</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/custom-style.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="css/adminDashboard.css">
	<link rel="stylesheet" type="text/css" href="css/custom-style.css">
</head>
<body class="bg-dark text-light text-center ">
	<?php require_once('loginform.php'); ?>
	<div class="container">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6 mt-5">
				<?php require_once('signupcode.php'); ?>
				<h4><b>Welcome to</b></h4>
				<hr class="pt-4">
				<h1 class="text-size pb-4">ShoePee</h1>
				<hr>
			</div>
			<div class="col-3"></div>
		</div>
		<h4 class="mt-5">Shop now</h4>
		<button class="btn btn-primary btn-lg " href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Sign In/Register</button>
	</div>
</body>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>