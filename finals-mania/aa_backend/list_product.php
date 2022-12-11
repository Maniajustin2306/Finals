<?php session_start();  ?>
<?php $_SESSION['currentpage'] = 'productlist';?>
<?php require_once('header.php'); ?>
<?php require_once('code_addproduct.php'); ?>
<?php require_once('form_addproduct.php'); ?>
<div class="container p-5">
	<div class="row">
		<div class="col">
			<h2><i class="fas fa-clipboard-list"></i>&nbsp;Product List</h2>
			<hr class="bg-info">
		</div>		
	</div>
	<div class="row">
		<div class="col">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addproductModal">
				<i class="fas fa-plus"></i>&nbsp;Add Product
			</button>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<form method="post">
    			<div class="form-inline float-right">
					<div class="form-group mb-3">
					    <input type="text" name="inputSearch" id="inputSearch" class="form-control form-control-sm ml-2" id="inputPassword2" placeholder="Search" value="<?php echo $inputSearch ?>">
					    <button type="submit" name="btnSearch" id="btnSearch" class="btn btn-primary ml-2 btn-sm"><i class="fas fa-search"></i>&nbsp;Search/Filter</button>
					</div>
    			</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table class="table table-bordered table-striped text-center ">
			  <thead>
			    <tr class="text-info">
			      <th scope="col">Product Name</th>
			      <th scope="col">Description</th>
			      <th scope="col">Price</th>
			      <th scope="col">Photo 1</th>
			      <th scope="col">Photo 2</th>
			      <th class="text-center w-25" scope="col" colspan="2">Action</th>
			    </tr>
			  </thead>
			  <tbody >
			    <?php
	              $con = openConnection();
	              $strSql = "SELECT * FROM products $search";
	              $recProducts = getRecord($con, $strSql);
	            ?>
	            <?php if(!empty($recProducts)): ?>  
	              <?php foreach ($recProducts as $key => $value): ?> 
	              <tr>
	                <td class="align-middle"><small><?php echo $value['prodname'] ?></small></td>
	                <td class="align-middle"><small><?php echo $value['proddescrip']?></small></td>
	                <td class="align-middle"><small>₱&nbsp;<?php echo number_format($value['prodprice'], 2); ?></small></td>
	                <td class="align-middle"><small><?php echo $value['prodphoto1']; ?></small></td>
	                <td class="align-middle"><small><?php echo $value['prodphoto1']; ?></small></td>          
	                <td>
	                  <a href="form_updateproduct.php?k=<?php echo $value['prodid']; ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>&nbsp;Update</a>
	                  <a href="form_deleteproduct.php?k=<?php echo $value['prodid']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp;Delete</a>
	                </td>
	                </tr>
	              <?php endforeach; ?>         
	            <?php else: ?>
	                <tr>
	                <td colspan="8">No Record Found!</td>
	                </tr>
	            <?php endif; ?>

	          <?php
	            closeConnection($con);
	          ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php require_once('footer.php'); ?> 
