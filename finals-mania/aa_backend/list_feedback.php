<?php session_start();  ?>
<?php $_SESSION['currentpage'] = 'feedbacks';?>
<?php require_once('header.php'); ?>
<?php
	$con = openConnection();

	$strsqlFeedbacks = "SELECT * FROM feedbacks";
	$getFeedbacks = getRecord($con, $strsqlFeedbacks);

	closeConnection($con);
?>
<div class="container p-5">
	<div class="row">
		<div class="col">
			<h2><i class="fas fa-comments"></i>&nbsp;Member Feedbacks</h2>
			<hr class="bg-warning">
		</div>		
	</div>
	<?php foreach ($getFeedbacks as $key => $value): ?>
	<div class="row m-5">
		<div class="col">
			
				<div class="card ">
					<div class="card-header bg-warning">
					Feedback # <?php echo $value['id'] ?>
					</div>
					<div class="card-body">
					<p class="card-text"><?php echo $value['description']; ?></p>
				</div>
			
			</div>
		</div>		
	</div>
	<?php endforeach; ?>
</div>

<?php require_once('footer.php'); ?> 
