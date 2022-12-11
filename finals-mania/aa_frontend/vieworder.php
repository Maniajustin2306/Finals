<?php require_once('header.php'); ?>

<div class="container">
	<h3>Your Orders</h3>
	<hr>
	<div class="row">
    		<div class="col">
    			<table class="table table-bordered table-striped text-center ">
				  <thead>
				    <tr class="text-danger">
				      <th scope="col">Order ID</th>
				      <th scope="col">Order Date</th>
				      <th scope="col">Total Items</th>
				      <th scope="col">Total Amount</th>
				      <th scope="col">Status</th>     
				      <th class="text-center" scope="col" colspan="2">Action</th>
				    </tr>
				  </thead>
				  <tbody >
				   
				    <?php
					    $con = openConnection();
					    $strSql = "SELECT * FROM orders WHERE memberid=". $_SESSION['memberid'];
					    $recOrders = getRecord($con, $strSql);
				    ?>

				    <?php if(!empty($recOrders)): ?>	
					    <?php foreach ($recOrders as $key => $value): ?> 
							<tr>
								<td class="align-middle"><?php echo $value['orderid'] ?></td>								
								<td class="align-middle"><?php echo $value['orderdate']; ?></td>
								<td class="align-middle"><?php echo $value['totalitems']; ?></td>
								<td class="align-middle">₱&nbsp;<?php echo number_format($value['totalamount']); ?></td>
								<td class="align-middle"><b><?php echo $value['status']; ?></b></td>						
								<td>
									<a href="form_vieworder.php?k=<?php echo $value['orderid'];?>" class="btn btn-info btn-sm ml-2"><i class="far fa-eye"></i>&nbsp;Detailed</a>
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
    	<div class="row mt-5">
		<div class="col">
			<a href="index.php" class="btn btn-danger" name="btnAddMore" value="Edit Profile"/><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>


<?php require_once('footer.php') ?>	