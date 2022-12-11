<div class="modal fade" id="addadminModal" tabindex="-1" role="dialog" aria-labelledby="addadminModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="addadminModalLabel"><i class="fas fa-plus"></i>&nbsp;Add an Admin</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="form-group form-inline">
	            <form class="text-dark" method="post">
		            <fieldset class="">
		            	<h4>Please Fill up the Form</h4>
		            	<h6>All is Required</h6>
					 	<div class="form-group">
					 		<div class="col-xs-6">
							    <input type="text" name="inputFirstName" id="inputFirstName" class="form-control w-75" placeholder="First Name" required>
							</div>
							<div class="col-xs-6">
							    <input type="text" name="inputLastName" id="inputLastName" class="form-control w-75" placeholder="Last Name" required>
							</div>
					 	</div>
					 	<div class="form-group mt-3 ">
					 		<div class="col-xs-2 col-form-label">
					 			<label class="mr-5">Birthday:</label>
							</div>
					 		<div class="col-xs-6 ">
					 			<?php $date = date('Y-m-d') ?>
							    <input type="date" name="inputBday" id="inputBday" class="form-control" placeholder="Last Name" value="<?php echo $date ?>" required>
							</div>
					 	</div>
					 	<div class="form-group form-inline mt-3 ">
					 		<?php $arrSex = array('Male', 'Female')?>
					 		<div class="col-xs-2 col-form-label">
					 			<label>Sex:</label>
							</div>
							<?php foreach ($arrSex as $key => $value): ?>
						 		<div class="col-xs-2 ml-3">
						 			<label class="radio-inline" for="inputSex"><input type="radio" name="inputSex" id="inputSex" required value="<?php echo $value; ?>" <?php if ($key == 0) echo 'checked'?>>&nbsp;<?php echo$value ?> </label>
								</div>
							<?php endforeach; ?>							
					 	</div>
					 	<div class="form-group mt-3">
					 		<div class="col-xs-6">
							    <input type="text" name="inputAddress" id="inputAddress" class="form-control" placeholder="Address" required>
							</div>
					 	</div>
					 	<div class="form-group mt-3">
							<div class="col-xs-6">
								<div class="input-group-prepend">
						          	<div class="input-group-text"><b>+63</b></div>
							    	<input type="tel" name="inputContact" id="inputContact" class="form-control" placeholder="Contact No." pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
								</div>
							</div>
					 	</div>		
					 	<div class="form-group mt-3">
					 		<div class="col-xs-6">
					 			<div class="input-group-prepend">
						          <div class="input-group-text"><b>@</b></div>
						          <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email Address" required>
						        </div>						 
							</div>
					 	</div>
					 	<div class="form-group mt-3">
					 		<div class="col-xs-4">
							    <input type="password" oncopy="return false" oncut="return false" onpaste="return false" name="inputPass" id="inputPass" class="form-control w-75" placeholder="Password" required>
							</div>
							<div class="col-xs-4">
							    <input type="password" oncopy="return false" oncut="return false" onpaste="return false" name="confirmPass" id="confirmPass" class="form-control w-75" placeholder="Confirm Password" required>
							</div>
					 	</div>		        
			            <div class="control-group mt-3 float-right">
			              <div class="controls">
			                <button type="submit" name="btnAddAdmin" id="btnAddAdmin"  class="btn btn-primary">Add</button>
			                <button type="button" class="btn btn-secondary text-color" data-dismiss="modal">Cancel</button>
			              </div>
			            </div>
		            </fieldset>
	            </form>
	      	</div>
	      </div>
	  </div>
	</div>
</div>