<?php session_start();  ?>
<?php $_SESSION['currentpage'] = 'memberlist';?>
<?php require_once('header.php'); ?>
<?php require_once('code_addadmin.php'); ?>
<?php require_once('form_addadmin.php'); ?>
	<div class="container p-5">
	<div class="row">
		<div class="col">
			<h2><i class="fas fa-users"></i>&nbsp;Member List</h2>
			<hr class="bg-success">
		</div>		
	</div>
	<div class="row">
		<div class="col-6">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminModal">
				<i class="fas fa-plus"></i>&nbsp;Add an Admin
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
			    <tr class="text-success">
			      <th scope="col">User Type</th>
			      <th scope="col">Name</th>
			      <th scope="col">Sex</th>
			      <th scope="col">Address</th>
			      <th scope="col">Birthday</th>
			      <th scope="col">Date Joined</th>
			      <th scope="col">Contact No.</th>	     
			      <th class="text-center" scope="col" colspan="2">Action</th>
			    </tr>
			  </thead>
			  <tbody >
			   
			    <?php
				    $con = openConnection();
				    $strSql = "SELECT * FROM accounts $search";
				    $recAccounts = getRecord($con, $strSql);
			    ?>

			    <?php if(!empty($recAccounts)): ?>	
				    <?php foreach ($recAccounts as $key => $value): ?> 
						<tr>
							<td class="align-middle"><b><?php echo $value['usertype'] ?></b></td>
							<td class="align-middle"><small><?php echo $value['lastname'] . ', '. $value['firstname']; ?></small></td>
							<td class="align-middle"><small><?php echo $value['sex']; ?></small></td>
							<td class="align-middle"><small><?php echo $value['address']; ?></small></td>
							<td class="align-middle"><small><?php echo $value['birthday']; ?></small></td>
							<td class="align-middle"><small><?php echo $value['datejoined']; ?></small></td>
							<td class="align-middle"><small><?php echo $value['contact']; ?></small></td>
							
							<td>
								<a href="form_userinfo.php?k=<?php echo $value['userid'];?>" class="btn btn-info btn-sm"><i class="far fa-address-card"></i>&nbsp;User Info</a>
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
