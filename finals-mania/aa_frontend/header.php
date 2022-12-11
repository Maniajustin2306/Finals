<?php require_once('../functions.php'); ?>
<?php require_once('form_logout.php'); ?>
<?php
	
	session_start();
	$name = $_SESSION['firstname'];
	if (empty($_SESSION['ordercount'])) {
		$_SESSION['ordercount'] = 0;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<link rel="stylesheet" type="text/css" href="../css/shopping_cart.css">
	<link rel="stylesheet" type="text/css" href="../css/custom-style.css">
	
	<title>Sports Wear Shop</title>
</head>
<body>
	<div class="container p-5 ">
		<div class="row">
			<div class="col-6 d-flex flex-row">
				<i class="fas fa-store-alt h2"></i>
				<a href="index.php" class="nounderline text-dark"><h3 class="h3 nav-style">&nbsp;Shoepee - Hello, <?php echo $name; ?></h3></a>
			</div>
			<div class="col-6">
				<a href="#logoutModal" class="btn btn-danger float-right ml-2" data-toggle="modal" data-target="#logoutModal">
					<i class="fas fa-power-off"></i>
					Logout
				</a>
				<a href="Vieworder.php?" class="btn btn-info float-right ml-2">
				  <i class="far fa-eye"></i>
				  View Order
				</a>
				<a href="cart.php" class="btn btn-info float-right">
				  <i class="fas fa-shopping-cart"></i>
				  Cart
				  <span class="badge badge-light"><?php echo $_SESSION['ordercount']; ?></span>
				</a>	
			</div>
		</div>
	    <hr>
