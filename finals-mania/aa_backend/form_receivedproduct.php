<?php require_once('../functions.php'); ?>
<?php require_once('code_receivedproduct.php'); ?>
<!DOCTYPE html>
<html>
<head>
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
  <div class="container p-5 mt-5"> 
    <div class="row text-center">
      <div class="col">
        <h1>Are you sure this order is delivered?</h1>
      </div>
    </div>
    <?php
      $con = openConnection();
      $strSql = "SELECT * FROM orders WHERE orderid = " . $_SESSION['k'];
      $recOrders = getRecord($con, $strSql);
      closeConnection($con);
    ?>
    <div class="row text-center">
      <div class="col">
      <?php foreach ($recOrders as $key => $value): ?>
      <h1>Order No:&nbsp;<?php echo $value['orderid']; ?></h1>
      <?php endforeach; ?>
      </div>
    </div>
    <div class="row">
      <div class="col offset-5">
        <form method="post">
          <div class="form-group mt-5">
            <button type="submit" name="btnReceived" id="btnReceived" class="btn btn-info btn">Confirm</button>
            <a href="list_order.php" type="button" class="btn btn-secondary btn">Cancel</a>    
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>
