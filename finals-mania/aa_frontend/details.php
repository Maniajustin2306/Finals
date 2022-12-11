<?php require_once('header.php'); ?>
<?php
    $_SESSION['id'] = $_GET['k'];
    $arr_Sizes = array('XS', 'SM', 'MD', 'LG', 'XL');

    if(isset($_POST['btnCheckout'])){
        $_SESSION['selectedSize'] = $_POST['radioSize'];
        $_SESSION['selectedQuantity'] = $_POST['inputQuantity'];
        header('location: confirm.php');
    }

    $con = openConnection();
    $strSql = "SELECT * FROM products WHERE prodid = " . $_SESSION['id'];
    $recProducts = getRecord($con, $strSql);    
    closeConnection($con);
    
?>
        <?php foreach ($recProducts as $key => $value) : ?>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4">
                <div class="col-10 d-flex align-items-stretch">
                    <div class="product-grid2 card shadow mb-5 bg-white rounded">        
                        <div class="product-image2 details-pic details-pic" style="height: 50vh; width: 15rem;">
                            <img class="pic-1" src="../uploads/<?php echo $value['prodphoto1']; ?>">
                            <img class="pic-2" src="../uploads/<?php echo $value['prodphoto2']; ?>">               
                        </div>                          
                    </div>
                </div>           
            </div>       
            <div class="col-6">
                <form method="post" action="#">
                    <div class="row">
                        <h4><?php echo $value['prodname']; ?></h4>
                    </div>
                    <div class="row">
                        <span class="price badge-lg badge-pill badge-dark text-white">₱ <?php echo $value['prodprice']; ?></span>
                    </div>
                    <div class="row">
                        <p><?php echo $value['proddescrip']; ?></p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="container">
                            <h4>Select Size:</h4>
                            <?php foreach ($arr_Sizes as $key => $value) : ?>                         
                            <label class="radio-inline mr-3">
                              <input type="radio" name="radioSize" id="<?php echo $value?>" <?php if ($key == 0) echo 'checked'?> value ="<?php echo $value ?>">&nbsp;<?php echo $value ?>
                            </label>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h4>Enter Quantity:</h4>
                        <input type="number" name="inputQuantity" class="form-control" min="1" max="100" value="0">
                    </div>
                    <hr>
                    <div class="row">
                         <div class="btn-toolbar pb-5" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button type="submit" class="btn btn-block btn-dark" name="btnCheckout" id="btnCheckout" ><i class="fas fa-check-circle"></i>&nbsp;Confirm Product Purchase</button></a>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <button type="button" class="btn btn-block btn-danger" onclick="location.href='index.php'"><i class="fas fa-ban"></i>&nbsp;Cancel/Go Back</button>         
                            </div>                                           
                        </div>                     
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach ?>
<?php require_once('footer.php') ?> 