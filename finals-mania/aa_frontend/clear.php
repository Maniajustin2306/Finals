<?php require_once('header.php'); ?>
<?php
	
    unset($_SESSION['selectedArr']);
    unset($_SESSION['id']);
    unset($_SESSION['finalQuantity']);
    unset($_SESSION['finalTotal']);
    unset($_SESSION['selectedSize']);
    unset($_SESSION['selectedQuantity']);
    unset($_SESSION['ordercount']);

	if (empty($_SESSION['ordercount'])) {
		$_SESSION['ordercount'] = 0;
	}

    if (isset($_POST['btnfeed'])) {

        $con = openConnection();
        $inputfeed = santizeInput($con, $_POST['inputfeed']);

        $strSql = "INSERT INTO feedbacks(description) VALUES (?)";

        $stmt = mysqli_prepare($con, $strSql);
        mysqli_stmt_bind_param($stmt, "s", $inputfeed);

        $inputfeed = $inputfeed;

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo '<div class="alert alert-success w-25 mx-auto mt-5" role="alert"><h3><i class="far fa-smile-beam"></i>&nbsp;Thank You!</h3></div>';

        closeConnection($con);
    }

?>
        <div class="row mt-5 ml-2">
        	<h4>Online Shopping is Successful!</h4>
        </div>
        <div class="row mt-1 ml-2">
             <div class="btn-toolbar pb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-lg btn-block btn-danger" onclick="location.href='index.php'"><i class="fas fa-shopping-basket"></i>&nbsp;Continue Shopping</button>         
                </div>                                           
            </div>  
            <div class="btn-toolbar pb-3" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-lg btn-block btn-info" onclick="location.href='vieworder.php'"><i class="far fa-eye"></i></i>&nbsp;View Order</button>         
                </div>                                           
            </div>                     
        </div>
        <hr>
        <div class="row">
            <form method="post">
                <div class="col">
                    <h3>We would greatly appreciate it if you kindly give us some feedback&nbsp;<i class="far fa-smile-beam"></i></h3>
                    <div class="form-group w-50">
                        <textarea name="inputfeed" id="inputfeed" class="form-control form-control-lg" rows="5" placeholder="Write Here" required></textarea>
                    </div>
                    <button type="submit" name="btnfeed" id="btnfeed" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

 <?php require_once('footer.php') ?>   