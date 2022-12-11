<?php
	session_start();

	if (isset($_POST['btnRemove'])) {
		unset($_SESSION['products'][$_SESSION['id']]['price']);
		unset($_SESSION['products'][$_SESSION['id']]['name']);
		unset($_SESSION['selectedSize']);
		unset($_SESSION['selectedQuantity']);
		unset($_SESSION['products'][$_SESSION['id']]['photo1']);
		header('location: confirm.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="css/shopping_cart.css">
    <link rel="stylesheet" type="text/css" href="css/custom-styles.css">
    <title>Sports Wear Shop</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 d-flex flex-row">
                <i class="fas fa-store-alt h2"></i>
                <h3 class="h3 nav-style">Sports Wear Shop</h3>
            </div>
            <div class="col-6">
                <a href="cart.php" class="btn btn-primary float-right">
                  <i class="fas fa-shopping-cart"></i>
                  Cart
                  <span class="badge badge-light"><?php echo $_SESSION['ordercount']; ?></span>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4">
                <div class="row">
                    <div class="col-10 d-flex align-items-stretch">
                        <div class="product-grid2 card shadow mb-5 bg-white rounded">        
                            <div class="product-image2">
                                <img class="pic-1" src="img/<?php echo $_SESSION['products'][$_SESSION['id']]['photo1']; ?>.jpg">                                          
                            </div>                          
                        </div>
                    </div>
                </div>         
            </div>       
            <div class="col-6">
                <form method="post" action="#">
                    <div class="row">
                        <h4><?php echo $_SESSION['products'][$_SESSION['id']]['name']; ?></h4>
                    </div>
                    <div class="row">
                        <span class="price badge-lg badge-pill badge-dark text-white">₱ <?php echo $_SESSION['products'][$_SESSION['id']]['price']; ?></span>
                    </div>
                    <div class="row">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <hr>
                    <div class="row">
                        <h4>Size: <?php echo $_SESSION['selectedSize']; ?></h4>                       
                    </div>
                    <hr>
                    <div class="row">
                        <h4>Quantity: <?php echo $_SESSION['selectedQuantity']; ?> </h4>                        
                    </div>
                    <hr>
                    <div class="row">
                         <div class="btn-toolbar pb-5" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button type="submit" class="btn btn-block btn-dark" name="btnRemove" id="btnRemove"><i class="fas fa-check-circle"></i>&nbsp;Confirm Product Removal</button></a>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button type="button" class="btn btn-block btn-danger" onclick="location.href='cart.php'"><i class="fas fa-ban"></i>&nbsp;Cancel/Go Back</button>        
                           </div>                                           
                        </div>                     
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once('footer.php') ?> 