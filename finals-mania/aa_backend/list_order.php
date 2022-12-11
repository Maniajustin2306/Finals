<?php session_start();  ?>
<?php $_SESSION['currentpage'] = 'orderlist';?>
<?php require_once('header.php'); ?>
<?php require_once('code_orderproduct.php'); ?>
<div class="container p-5">
    	<div class="row">
			<div class="col">
				<h2><i class="fas fa-shopping-cart"></i>&nbsp;Order List</h2>
				<hr class="bg-danger">
			</div>		
    	</div>
    	<div class="row">
    		<div class="col">
    			<form method="post">
	    			<div class="form-inline float-right">
						<div class="form-group mb-3">
						    <select class="form-control form-control-sm" name="drpDate" id="drpDate">
								<option value="">All</option>
								<option <?php echo $selected ?> value="day">This Day</option>
								<option  <?php echo $selected2 ?> value="month">This Month</option>
								<option <?php echo $selected3 ?> value="year">This Year</option>
								<option <?php echo $selected4 ?> value="pending">Pending</option>
								<option <?php echo $selected5 ?> value="received">Received</option>
							</select>
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
				    <tr class="text-danger">
				      <th scope="col">Order ID</th>
				      <th scope="col">Member Name</th>
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
					    $strSql = "SELECT * FROM orders $search ORDER BY status";
					    $recOrders = getRecord($con, $strSql);
					    
				    ?>

				    <?php if(!empty($recOrders)): ?>	
					    <?php foreach ($recOrders as $key => $value): ?> 
							<tr>
								<td class="align-middle"><?php echo $value['orderid'] ?></td>
								<?php
									$strSql2 = "SELECT * FROM accounts WHERE userid =".$value['memberid'];
					   				$recMembers = getRecord($con, $strSql2);
								?>
								<?php foreach ($recMembers as $key => $value2): ?> 
								<td class="align-middle"><?php echo $value2['firstname'] . " " . $value2['lastname']; ?></td>
								<?php endforeach; ?>
								<td class="align-middle"><?php echo $value['orderdate']; ?></td>
								<td class="align-middle"><?php echo $value['totalitems']; ?></td>
								<td class="align-middle">₱&nbsp;<?php echo number_format($value['totalamount']); ?></td>
								<td class="align-middle"><b><?php echo $value['status']; ?></b></td>						
								<td>
									<a href="form_receivedproduct.php?k=<?php echo $value['orderid'];?>" class="btn btn-info btn-sm" name="btnReceived" id="btnReceived" <?php echo ($value['status'] == 'Received') ? 'hidden' : '' ?> ><i class="fas fa-truck"></i>&nbsp;Received</button>
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
    </div>
<?php require_once('footer.php'); ?> 