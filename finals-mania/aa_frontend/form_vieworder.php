<?php require_once('header.php'); ?>
<?php
	 $_SESSION['id'] = $_GET['k'];
?>
<div class="container m-5 mx-auto">
	<div class="row">
		<div class="col offset-2">
			<h4>Order No. <?php echo $_SESSION['id']?></h4>
		</div>
	</div>	
	<div class="row mx-auto">
		<div class="col offset-2">
			<table class="table table-striped table-responsive w-100">
				<thead>
					<tr>
						<th scope="col"></th>
						<th scope="col">Product</th>
						<th scope="col">Size</th>
						<th scope="col" class="text-center">Quantity</th>
						<th scope="col" class="text-right">Price</th>
						<th scope="col" class="text-right">Total</th>
					</tr>
				</thead>
				<tbody>
				<?php
				    $con = openConnection();
				    $strSql = "SELECT * FROM vieworders WHERE voorderid=".$_SESSION['id'];;
				    $recVieworders = getRecord($con, $strSql);
			    ?>	
				<?php if (empty($recVieworders)): ?>
					<tr>
						<td ></td>
						<td>No Record Found!</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr> 
				<form method="post">                             
				<?php else: ?>
				<?php foreach ($recVieworders as $key => $value) : ?>
					<tr>
						<td><img class="pic-1" style="width: 5vh;" src="../uploads/<?php echo $value['vophoto']; ?>"></td>
						<td><?php echo $value['voname']; ?></td>
						<td><?php echo $value['vosize']; ?></td>
						<td class="text-center"><?php echo $value['voquantity']; ?></td>
						<td class="text-right">₱ <?php echo number_format($value['voprice'], 2); ?></td>
						<td class="text-right">₱ <?php echo number_format($value['vototal'], 2); ?></td>                                                  
					</tr>
					<?php $finalquantity = $value['vofquantity']; ?>
					<?php $finaltotal = $value['voftotal']; ?>
				<?php endforeach; ?>
					<tr>
						<td></td>
						<td></td>
						<td><strong>Total</strong></td>
						<td class="text-center"><?php echo $finalquantity; ?></td>
						<td></td>                              
						<td class="text-right"><strong>₱ <?php echo number_format($finaltotal, 2); ?></strong></td>
					</tr>                               
				<?php endif; ?>
				</form> 
				</tbody>
			</table>
		</div>
	</div>
	<div class="row mt-5">
		<div class="col offset-2">
			<a href="vieworder.php" class="btn btn-danger" name="btnAddMore" value="Edit Profile"/><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<?php require_once('footer.php'); ?> 