<?php require_once('header.php'); ?>
<?php

    $_SESSION['ordercount'] += $_SESSION['selectedQuantity'];
    $_SESSION['finalQuantity'] = 0;
    $_SESSION['finalTotal'] = 0;

    $con = openConnection();
    $strSql = "SELECT * FROM products WHERE prodid = " . $_SESSION['id'];
    $recProducts = getRecord($con, $strSql);    
    closeConnection($con);
   
    $arr_Selected = array(
                    'selectedPhoto' => $recProducts[0]['prodphoto1'],
                    'selectedName' => $recProducts[0]['prodname'],
                    'selectedPrice' => $recProducts[0]['prodprice'],
                    'selectedSize' => $_SESSION['selectedSize'],
                    'selectedQuantity' => $_SESSION['selectedQuantity'],
                    'total' => $_SESSION['selectedQuantity'] * $recProducts[0]['prodprice']

                 );

    if (empty($_SESSION['selectedArr'])) {
        $_SESSION['selectedArr'] = array($arr_Selected);
    }
    elseif(($_SESSION['selectedArr'][sizeof($_SESSION['selectedArr']) - 1]['selectedName'] == $arr_Selected['selectedName']) && ($_SESSION['selectedArr'][sizeof($_SESSION['selectedArr']) - 1]['selectedSize'] == $arr_Selected['selectedSize'])){
        for ($i=0; $i < sizeof($_SESSION['selectedArr']); $i++) { 
            $tempPrice = $arr_Selected['selectedPrice'];
            $tempQuantity = $arr_Selected['selectedQuantity'];
            $tempTotal = $arr_Selected['total'];         
            if (($_SESSION['selectedArr'][$i]['selectedName'] == $arr_Selected['selectedName']) && ($_SESSION['selectedArr'][$i]['selectedSize'] == $arr_Selected['selectedSize'])){
                $_SESSION['selectedArr'][$i]['selectedPrice'] += $tempPrice;
                $_SESSION['selectedArr'][$i]['selectedQuantity'] += $tempQuantity;
                $_SESSION['selectedArr'][$i]['total'] += $tempTotal;
                break;
            } 
    }
    } 
    else
        array_push($_SESSION['selectedArr'], $arr_Selected);       
    
    for ($i=0; $i < sizeof($_SESSION['selectedArr']); $i++) {             ;
        $_SESSION['finalTotal'] = $_SESSION['selectedArr'][$i]['total'] + $_SESSION['finalTotal'];
        $_SESSION['finalQuantity'] = $_SESSION['selectedArr'][$i]['selectedQuantity'] + $_SESSION['finalQuantity'];
    }

?>

        <div class="row">
        	<h4>Product Successfully Added to the Cart, what do you want to do next?</h4>
        </div>
        <div class="row">
             <div class="btn-toolbar pb-5" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
                    <button type="submit" class="btn btn-block btn-dark" name="btnViewCart" id="btnViewCart" onclick="location.href='cart.php'"><i class="fas fa-shopping-cart"></i>&nbsp;View Cart</button>
                </div>
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-block btn-danger" onclick="location.href='index.php'"><i class="fas fa-shopping-basket"></i>&nbsp;Continue Shopping</button>         
                </div>                                           
            </div>                     
        </div>
    </div>

<?php require_once('footer.php') ?>    