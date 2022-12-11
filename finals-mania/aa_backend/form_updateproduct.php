<?php require_once('../functions.php'); ?>
<?php require_once('code_updateproduct.php'); ?>
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
      <div class="col mb-3">
        <h3>Are you sure you want to update this product?</h3>
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
          <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
            <div class="form-group">
              <div>
                <input type="text" name="inputProdName" id="inputProdName" class="form-control" placeholder="Product Name" value="<?php echo (isset($value['prodname'])) ? $value['prodname'] : ''; ?>" required>
              </div>            
              </div>
              <div class="form-group">
                  <textarea name="inputDescrip" id="inputDescrip" class="form-control" id="exampleFormControlTextarea1" placeholder="Product Description" rows="4"><?php echo (isset($value['proddescrip'])) ? $value['proddescrip'] : '';?></textarea>
              </div>
              <div class="form-group">
                <div>
                    <input type="num" name="inputProdPrice" id="inputProdPrice" class="form-control" placeholder="Product Price" value="<?php echo (isset($value['prodprice'])) ? $value['prodprice'] : ''; ?>" required>
                </div>            
              </div>
              <div class="form-inline">
                <label for="inputPhoto1">Photo 1</label>
                <input name="inputPhoto1" id="inputPhoto1" type="file" class="form-control-file" required>
              </div>
              <div class="form-inline mt-2">
                <label for="inputPhoto2">Photo 2</label>
                <input name="inputPhoto2" id="inputPhoto2" type="file" class="form-control-file" required>
              </div>          
              
              <div class="form-group mt-5">
                <button type="submit" name="btnUpdateProd" id="btnUpdateProd" class="btn btn-info">Update</button>
                <a href="list_product.php" type="button" class="btn btn-secondary">Cancel</a>    
              </div>
              </div>
            </form>
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
