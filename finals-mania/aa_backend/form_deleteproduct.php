<?php require_once('../functions.php'); ?>
<?php require_once('code_deleteproduct.php'); ?>
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
  <div class="container p-5"> 
    <div class="row text-center">
      <div class="col">
        <h4>Are you sure you want to delete this product?</h4>
      </div>
    </div>
    <?php
      $con = openConnection();
      $strSql = "SELECT * FROM products WHERE prodid = " . $_SESSION['k'];
      $recProducts = getRecord($con, $strSql);
    ?>
      <div class="row">
        <div class="col-3"></div>
        <div class="col">
          <?php foreach ($recProducts as $key => $value): ?>
          <form method="post" enctype="multipart/form-data" class="text-center p-5 mx-auto">
            <div class="form-group border p-2">
                <div class="form-inline">
                    <h4>Product Name:</h4>&nbsp;
                    <h4><?php echo $value['prodname'];  ?></h4>
                </div>            
            </div>
            <div class="form-group">
                <div class="form-inline border p-2">
                    <h4>Product Description:</h4>&nbsp;
                    <h4><?php echo $value['proddescrip'];  ?></h4>
                </div>
            </div>
            <div class="form-group">
                  <div class="form-inline border p-2">
                    <h4>Product Price:</h4>&nbsp;
                    <h4><?php echo $value['prodprice'];  ?></h4>
                </div>            
            </div>
             <div class="form-group">
                  <div class="form-inline border p-2">
                    <h4>Product Photo1:</h4>&nbsp;
                    <h4><?php echo $value['prodphoto1'];  ?></h4>
                </div>           
            </div>
             <div class="form-group">
                 <div class="form-inline border p-2">
                    <h4>Product Photo2:</h4>&nbsp;
                    <h4><?php echo $value['prodphoto2'];  ?></h4>
                </div>            
            </div>
            <button type="submit" name="btnDelProd" id="btnDelProd" class="btn btn-danger">Delete</button>
            <a href="list_product.php" type="button" class="btn btn-secondary">Cancel</a>  
          </form>
        </div>
        <?php endforeach; ?>
        <?php closeConnection($con); ?>
        <div class="col-3"></div>
      </div>
  </div>

</body>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>
