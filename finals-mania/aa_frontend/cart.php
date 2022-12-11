<?php require_once('header.php'); ?>
<?php

    if (isset($_POST['btnCheckout'])) {
        if (!empty($_SESSION['selectedArr'])) {
             $con = openConnection();
            $arrErrors = [];

            $memberid = $_SESSION['memberid'];
            $orderdate = date('Y-m-d');
            $totalitems = $_SESSION['finalQuantity'];
            $totalamount = $_SESSION['finalTotal'];
            $status = 'Pending';
          
            $strSql = "
                    INSERT INTO orders(memberid, orderdate, totalitems, totalamount, status)
                    VALUES (?, ?, ?, ?, ?)

                ";

                $stmt = mysqli_prepare($con, $strSql);
                mysqli_stmt_bind_param($stmt, "isiis", $memberid, $orderdate, $totalitems, $totalamount, $status);

                $memberid = $memberid;
                $orderdate = $orderdate;
                $totalitems = $totalitems;
                $totalamount = $totalamount;    
                $status = $status;

                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                $voorderid = executeInsertLastIDQuery($con, $strSql);


                foreach ($_SESSION['selectedArr'] as $key => $value) {

                    $strSql2 = "
                    INSERT INTO vieworders(vophoto, voname, vosize, voquantity, voprice, vototal, vofquantity, voftotal, voorderid)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)

                    ";

                    $stmt2 = mysqli_prepare($con, $strSql2);
                    mysqli_stmt_bind_param($stmt2, "sssiiiiii", $vophoto, $voname, $vosize, $voquantity, $voprice, $vototal, $vofquantity, $voftotal, $voorderid);

                    $vophoto = $value['selectedPhoto'];
                    $voname = $value['selectedName'];
                    $vosize = $value['selectedSize'];
                    $voquantity = $value['selectedQuantity'];
                    $voprice = $value['selectedPrice'];    
                    $vototal = $value['total'];
                    $vofquantity = $_SESSION['finalQuantity'];
                    $voftotal = $_SESSION['finalTotal'];
                    $voorderid = $voorderid;

                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_close($stmt2);

                    if (empty($_SESSION['ordercount'])) {
                        $_SESSION['ordercount'] = 0;
                    }

                    header('location: clear.php');
                }
                
      
       
        
        }
        else
         echo '<div class="alert alert-danger w-25 mx-auto text-center" role="alert">
                <h4><i class="fas fa-times"></i>&nbsp;Cart is Empty!</h4>
            </div>';
            
        }
       
   
          
?>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Size</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-right">Price</th>
                                <th scope="col" class="text-right">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($_SESSION['selectedArr'])): ?>
                                <tr>
                                    <td></td>
                                    <td>Cart is Still Empty</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> 
                            <form method="post">                             
                            <?php else: ?>
                                 <?php foreach ($_SESSION['selectedArr'] as $key => $value) : ?>
                                    <tr>
                                        <td><img class="pic-1" style="width: 5vh;" src="../uploads/<?php echo $value['selectedPhoto']; ?>"></td>
                                        <td><?php echo $value['selectedName']; ?></td>
                                        <td><?php echo $value['selectedSize']; ?></td>
                                        <td class=" align-middle"><input class="form-control text-center" type="number" name ="inputUpdate" id="inputUpdate" value="<?php echo $value['selectedQuantity']; ?>" /></td>
                                        <td class="text-right">₱ <?php echo number_format($value['selectedPrice'], 2); ?></td>
                                        <td class="text-right">₱ <?php echo number_format($value['total'], 2); ?></td>
                                        <td class="text-right"><a href="remove-confirm.php?k=<?php echo $key?>" class="add-to-cart" name="btn" id="btn"><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>                                                    
                                    </tr>
                                 <?php endforeach ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total</strong></td>
                                        <td class="text-center"><?php echo $_SESSION['finalQuantity']; ?></td>
                                        <td></td>                              
                                        <td class="text-right"><strong>₱ <?php echo number_format($_SESSION['finalTotal'], 2); ?></strong></td>
                                        <td></td>
                                    </tr>                               
                            <?php endif; ?>
                            </form> 
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <form method="post"> 
                <div class="row"> 
                                
                    <div class="col-4">
                        <button type="button" class="btn btn btn-block btn-danger" onclick="location.href='index.php'"><i class="fas fa-shopping-bag"></i>&nbsp;Continue Shopping</button>
                    </div>
                     <div class="col-4">
                        <button type="submit" class="btn btn btn-block btn-success" name="btnUpdate" id="btnUpdate"><i class="fas fa-edit"></i>&nbsp;Update</button>
                    </div>
                     <div class="col-4">
                        <button type="submit" name="btnCheckout" id="btnCheckout"class="btn btn btn-block btn-primary"><i class="fas fa-sign-out-alt"></i>&nbsp;Checkout</button>
                    </div>
                    
                </div>
                 </form>
            </div>
        </div>
    </div>

<?php require_once('footer.php') ?>  