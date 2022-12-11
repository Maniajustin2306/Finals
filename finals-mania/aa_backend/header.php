<?php require_once('../functions.php'); ?>
<?php require_once('form_logout.php'); ?> 
<!DOCTYPE html>
<html>
<head>
    <script language="javascript" type="text/javascript">window.history.forward()</script>
	<title>ShoePee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
	<link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/vieworder.css">
	<link rel="stylesheet" type="text/css" href="../css/adminDashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/custom-style.css">
</head>

<body>
	
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="hamburger">
            <div class="cta">
                <div class="toggle-btn type14"></div>
            </div>
            <div class="pt-3">
                <a href="index.php" class="nounderline" ><h4 class="text-light ">ShoePee</h4></a>
            </div>
        </div>
        <ul class="navbar-nav ml-auto text-light pt-3">
        	<h5><i class="far fa-user"></i>&nbsp;</h5>
            <li class="nav-item">
               <h4>Hello, <?php echo $_SESSION['firstname']; ?></h4>
            </li>
        </ul>
    </nav>
    <section class="side-bar-warp">
        <div class="sidebar-menu small-side-bar flowHide">
            <nav class="">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                        <span class="sidebar-icon"><i class="fas fa-house-user <?php echo ($_SESSION['currentpage'] == 'dashboard' ? 'text-danger' : ''); ?>"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show <?php echo ($_SESSION['currentpage'] == 'dashboard' ? 'text-danger' : ''); ?>">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_order.php">
                        <span class="sidebar-icon"><i class="fas fa-shopping-cart <?php echo ($_SESSION['currentpage'] == 'orderlist' ? 'text-danger' : ''); ?>"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show <?php echo ($_SESSION['currentpage'] == 'orderlist' ? 'text-danger' : ''); ?>">Order List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_product.php">
                        <span class="sidebar-icon"><i class="fas fa-clipboard-list <?php echo ($_SESSION['currentpage'] == 'productlist' ? 'text-danger' : ''); ?>"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show <?php echo ($_SESSION['currentpage'] == 'productlist' ? 'text-danger' : ''); ?>">Product List</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link " href="list_member.php">
                        <span class="sidebar-icon"><i class="fas fa-users <?php echo ($_SESSION['currentpage'] == 'memberlist' ? 'text-danger' : ''); ?>"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show <?php echo ($_SESSION['currentpage'] == 'memberlist' ? 'text-danger' : ''); ?>">Member List</span>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="list_feedback.php">
                        <span class="sidebar-icon"><i class="fas fa-comments <?php echo ($_SESSION['currentpage'] == 'feedbacks' ? 'text-danger' : ''); ?>"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show <?php echo ($_SESSION['currentpage'] == 'feedbacks' ? 'text-danger' : ''); ?>">Feedbacks</span>
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#logoutModal" data-toggle="modal" data-target="#logoutModal">
                        <span class="sidebar-icon"><i class="fas fa-power-off"></i></span>
                        <span class="fadeInRight animated nav-link-name name-hide tax-show ">Logout</span>
                        </a>
                    </li>              
                </ul>
            </nav>
        </div>

    </section>