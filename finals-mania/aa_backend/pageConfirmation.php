<?php
  session_start();
  $_SESSION['pageCon'] = 'pageCon';

  if ($_SESSION['addID'] == 'addadmin') {
      $backPage = 'list_member.php';
  }
  elseif ($_SESSION['addID'] == 'updatedelivered') {
      $backPage = 'list_order.php';
  }
  else
      $backPage = 'list_product.php';

?>
<!DOCTYPE html>
<html>
<head>
  <script language="javascript" type="text/javascript">window.history.forward()</script>
  <title>ShoePee</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/all.css">
  <link rel="stylesheet" type="text/css" href="../css/custom-style.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" href="../css/adminDashboard.css">
  <link rel="stylesheet" type="text/css" href="../css/custom-style.css">
</head>
<body class="bg-dark text-light">
  <div class="container p-5"> 
    <div class="row text-center">
      <div class="col mx-auto">
        <hr class="pt-5">
        <h1 class="pb-5">ShoePee</h1>
        <hr>
      </div>
    </div>
      <div class="row">
        <?php if($_SESSION['addID'] == 'addadmin'): ?>
        <div class="alert alert-success mx-auto text-center" role="alert">
            <h1><i class="fas fa-check"></i>&nbsp;Admin Added!</h1>
        </div>
        <?php elseif($_SESSION['addID'] == 'addproduct'): ?>
        <div class="alert alert-success mx-auto text-center" role="alert">
            <h1><i class="fas fa-check"></i>&nbsp;Product Added!</h1>
        </div>
        <?php elseif($_SESSION['addID'] == 'delproduct'): ?>
        <div class="alert alert-danger mx-auto text-center" role="alert">
            <h1><i class="fas fa-minus-circle"></i>&nbsp;Product Deleted!</h1>
        </div>
        <?php elseif($_SESSION['addID'] == 'updateproduct'): ?>
        <div class="alert alert-info mx-auto text-center" role="alert">
            <h1><i class="fas fa-check"></i>&nbsp;Product Updated!</h1>
        </div>
        <?php elseif($_SESSION['addID'] == 'updatedelivered'): ?>
        <div class="alert alert-info mx-auto text-center" role="alert">
            <h1><i class="fas fa-check"></i>&nbsp;Product Delivered!</h1>
        </div>
        <?php endif; ?>
      </div>
      <div class="row">
        <a href="<?php echo $backPage ?>" class="btn btn-lg btn-primary mx-auto"><i class="fas fa-chevron-circle-left"></i>&nbsp; Go Back</a> 
      </div> 
    </div>
  </div>
</body>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>