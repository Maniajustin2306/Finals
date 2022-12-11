<?php require_once('header.php'); ?>
<?php
	$con = openConnection();
	$strSql = "SELECT * FROM products";
	$recProducts = getRecord($con, $strSql);
	closeConnection($con);

?>	
	<div class="row">
	    <?php foreach ($recProducts as $key => $value) : ?>
		        <div class="col-md-3 col-sm-6 d-flex align-items-stretch">
		            <div class="product-grid2 card shadow mb-5 bg-white rounded w-100 mx-auto">	     
		                <div class="product-image2 card-style">
		                    <a href="details.php?k=<?php echo $value['prodid']; ?>" name="btn" id="btn">
		                        <img class="pic-1" src="../uploads/<?php echo $value['prodphoto1']; ?>">
		                        <img class="pic-2" src="../uploads/<?php echo $value['prodphoto2']; ?>">
		                    </a>	            
		                    <a href="details.php?k=<?php echo $value['prodid']; ?>" class="add-to-cart" name="btn" id="btn">Add to cart</a>
		                </div>
		                <div class="product-content">
		                    <h3 class="title"><?php echo $value['prodname']; ?></h3>
		                    <span class="price badge badge-pill badge-dark text-white">₱ <?php echo $value['prodprice']; ?></span>
		                </div>
		            </div>
		        </div>
	    <?php endforeach ?>
	    </div>
	</div>
	
<?php require_once('footer.php') ?>	