<?php session_start();  ?>
<?php $_SESSION['currentpage'] = 'dashboard';?>
<?php require_once('header.php'); ?>
<?php
	$con = openConnection();

	$strsqlProducts ="SELECT * FROM products";
	$getProducts = getRecord($con, $strsqlProducts);
	$totalProducts = sizeof($getProducts);

	$strsqlMembers = "SELECT * FROM accounts";
	$getMembers = getRecord($con, $strsqlMembers);
	$totalMembers = sizeof($getMembers);

	$strsqlOrders = "SELECT * FROM orders";
	$getOrders = getRecord($con, $strsqlOrders);
	$totalOrders = sizeof($getOrders);

	$strsqlFeedbacks = "SELECT * FROM feedbacks";
	$getFeedbacks = getRecord($con, $strsqlFeedbacks);
	$totalFeedbacks = sizeof($getFeedbacks);

	closeConnection($con);
?>
    <div class="container p-5">
    	<div class="row">
			<div class="col">
				<h2><i class="fas fa-house-user"></i>&nbsp;Dashboard</h2>
				<hr class="bg-dark">
			</div>		
    	</div>
    	<div class="jumbotron shadow shadow-lg border bg-light">	
	    	<div class="row">
	    		<div class="col-md-3">
		            <div class="card border-danger shadow mx-sm-1 p-3">
		                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fas fa-shopping-cart" aria-hidden="true"></span></div>
		                <div class="text-danger text-center mt-3"><h4>Orders</h4></div>
		                <div class="text-danger text-center mt-2"><h1><?php echo $totalOrders; ?></h1></div>
		                <a href="list_order.php" class="btn btn-danger w-50 mx-auto">View</a>
		            </div>
		        </div>
	    		<div class="col-md-3">
		            <div class="card border-info shadow mx-sm-1 p-3">
		                <div class="card border-info shadow text-info p-3 my-card" ><span class="fas fa-clipboard-list pl-1 pr-1" aria-hidden="true"></span></div>
		                <div class="text-info text-center mt-3"><h4>Products</h4></div>
		                <div class="text-info text-center mt-2"><h1><?php echo $totalProducts; ?></h1></div>
		                <a href="list_product.php" class="btn btn-info w-50 mx-auto">View</a>
		            </div>
		        </div>
		        <div class="col-md-3">
		            <div class="card border-success shadow mx-sm-1 p-3">
		                <div class="card border-success shadow text-success p-3 my-card"><span class="fas fa-users" aria-hidden="true"></span></div>
		                <div class="text-success text-center mt-3"><h4>Members</h4></div>
		                <div class="text-success text-center mt-2"><h1><?php echo $totalMembers; ?></h1></h1></div>
		                <a href="list_member.php" class="btn btn-success w-50 mx-auto">View</a>
		            </div>
		        </div>       
		        <div class="col-md-3">
		            <div class="card border-warning shadow mx-sm-1 p-3">
		                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
		                <div class="text-warning text-center mt-3"><h4>Feedbacks</h4></div>
		                <div class="text-warning text-center mt-2"><h1><?php echo $totalFeedbacks; ?></h1></div>
		                <a href="list_feedback.php" class="btn btn-warning w-50 mx-auto">View</a>
		            </div>
		        </div>    		
			</div>
    	</div>
    	<hr class="bg-dark">
    	<div class="row mx-auto">
    		<div class="jumbotron mx-auto w-100 shadow shadow-lg border bg-light">
			  <div class="container">
			  	<h4>Pending Order This <?php echo date('F'); ?></h4>
			    <table class="table table-bordered table-striped text-center">
				  <thead>
				    <tr>
				      <th scope="col">Order ID</th>
				      <th scope="col">Order Date</th>
				      <th scope="col">Total Items</th>
				      <th scope="col">Total Amount</th>
				      <th scope="col">Status</th>     				     
				    </tr>
				  </thead>
				  <tbody >
				   
				    <?php
					    $con = openConnection();
					    $month = date('Y-m');
					    $strSql = "SELECT * FROM orders WHERE orderdate LIKE '%$month%' AND status ='Pending'";
					    $recOrders = getRecord($con, $strSql);
				    ?>

				    <?php if(!empty($recOrders)): ?>	
					    <?php foreach ($recOrders as $key => $value): ?> 
							<tr>
								<td class="align-middle"><?php echo $value['orderid'] ?></td>
								<td class="align-middle"><?php echo $value['orderdate']; ?></td>
								<td class="align-middle"><?php echo $value['totalitems']; ?></td>
								<td class="align-middle">₱&nbsp;<?php echo number_format($value['totalamount']); ?></td>
								<td class="align-middle"><?php echo $value['status']; ?></td>								
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
    	<hr class="bg-dark">
    	<div class="row mx-auto">
    		<div class="jumbotron mx-auto w-100 shadow shadow-lg border bg-light">
			  <div class="container">
			  	<h4>Member This <?php echo date('F'); ?></h4>
			    <table class="table table-bordered table-striped text-center ">
				  <thead>
				    <tr>
				      <th scope="col">User Type</th>
				      <th scope="col">Name</th>
				      <th scope="col">Sex</th>
				      <th scope="col">Address</th>
				      <th scope="col">Date Joined</th>	     
				    </tr>
				  </thead>
				  <tbody >
				   
				    <?php
					    $con = openConnection();
					    $month = date('Y-m');
					    $strSql = "SELECT * FROM accounts WHERE datejoined LIKE '%$month%' AND usertype = 'Member'";
					    $recOrders = getRecord($con, $strSql);
				    ?>

				    <?php if(!empty($recOrders)): ?>	
					    <?php foreach ($recOrders as $key => $value): ?> 
							<tr>
								<td class="align-middle"><small><?php echo $value['usertype']; ?></small></td>
								<td class="align-middle"><small><?php echo $value['lastname'] . ', '. $value['firstname']; ?></small></td>
								<td class="align-middle"><small><?php echo $value['sex']; ?></small></td>
								<td class="align-middle"><small><?php echo $value['address']; ?></small></td>
								<td class="align-middle"><small><?php echo $value['datejoined']; ?></small></td>				
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
    	<hr class="bg-dark">
    	<div class="row mx-auto">
    		<div class="jumbotron mx-auto w-100 shadow shadow-lg border bg-light">
			  <div class="container">
			  	<h4>Feedbacks</h4>
				<div class="row">
					<?php foreach ($getFeedbacks as $key => $value): ?>
					<div class="col-4">
						<div class="card" style="width: 18rem; height: 40vh;">
						  <div class="card-body">
						    <h5 class="card-title">Feedback # <?php echo $value['id']; ?></h5>
						    <p class="card-text"><?php echo $value['description']; ?></p>
						  </div>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
				
			  </div>
			</div>
    	</div>
    </div>

<?php require_once('footer.php'); ?> 


