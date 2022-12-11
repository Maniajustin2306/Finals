<!-- Login Form Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered">
    	<div class="modal-content">
	        <br>
	        <div class="bs-example bs-example-tabs">
	            <ul id="myTab" class="nav nav-tabs">
	              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
	              <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
	            </ul>
	        </div>
	    <div class="modal-body">
	      	<!-- Sign In Form -->
	        <div id="myTabContent" class="tab-content">
		        <div class="tab-pane fade active in" id="signin">
		            <form class="form-horizontal" method="post">
			            <fieldset>
						  	<div class="row">
						  		<div class="form-group col-xs-7 mx-auto">
								  	<select name="drpType" id="drpType" class="form-control" id="exampleFormControlSelect1">
								      	<option value="Member">Member</option>
								      	<option value="Admin">Admin</option>
								    </select>
								</div>							        
						 	</div>
						 	<div class="form-group row">
						 		<div class="col-xs-7 mx-auto">
								    <input type="email" name="emailIn" id="emailIn" class="form-control" placeholder="Email Address" required>
								</div>
						 	</div>
						 	<div class="form-group row">
						 		<div class="col-xs-7 mx-auto">
								    <input type="password" name="passIn" id="passIn" oncopy="return false" oncut="return false" onpaste="return false" class="form-control" placeholder="Password" required>
								</div>
						 	</div>					        
				            <div class="control-group pt-3">
				              <div class="controls">
				                <button name="btnSignin" id="btnSignin" class="btn btn-primary">Sign In</button>
				                <button type="button" class="btn btn-secondary text-color" data-dismiss="modal">Cancel</button>
				              </div>
				            </div>
			            </fieldset>
		            </form>
		        </div>
	         <!-- Sign Up Form -->
	        <div class="tab-pane fade" id="signup">
	            <form class="form-horizontal text-dark" method="post">
		            <fieldset>
		            	<h4>Please Fill up the Form</h4>
		            	<h6>All is Required</h6>
					 	<div class="form-group row">
					 		<div class="col-xs-6">
							    <input type="text" name="inputFirstName" id="inputFirstName" class="form-control" placeholder="First Name" required>
							</div>
							<div class="col-xs-6">
							    <input type="text" name="inputLastName" id="inputLastName" class="form-control" placeholder="Last Name" required>
							</div>
					 	</div>
					 	<div class="form-group row">
					 		<div class="col-xs-2 col-form-label">
					 			<label>Birthday:</label>
							</div>
					 		<div class="col-xs-6 ">
					 			<?php $date = date('Y-m-d') ?>
							    <input type="date" name="inputBday" id="inputBday" class="form-control" placeholder="Last Name" value="<?php echo $date ?>" required>
							</div>
					 	</div>
					 	<div class="form-group row">
					 		<?php $arrSex = array('Male', 'Female')?>
					 		<div class="col-xs-2 col-form-label">
					 			<label>Sex:</label>
							</div>
							<?php foreach ($arrSex as $key => $value): ?>
						 		<div class="col-xs-2">
						 			<label class="radio-inline" for="inputSex"><input type="radio" name="inputSex" id="inputSex" required value="<?php echo $value; ?>" <?php if ($key == 0) echo 'checked'?>><?php echo $value ?> </label>
								</div>
							<?php endforeach; ?>							
					 	</div>
					 	<div class="form-group row">
					 		<div class="col-xs-6">
							    <input type="text" name="inputAddress" id="inputAddress" class="form-control" placeholder="Address" required>
							</div>
							<div class="col-xs-6">
								<div class="input-group-prepend">
						          	<div class="input-group-text"><b>+63</b></div>
							    	<input type="tel" name="inputContact" id="inputContact" class="form-control" placeholder="Contact No." pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
								</div>
							</div>
					 	</div>	
					 	<div class="form-group row">
					 		<div class="col-xs-8">
					 			<div class="input-group-prepend">
						          <div class="input-group-text"><b>@</b></div>
						          <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email Address" required>
						        </div>						 
							</div>
					 	</div>
					 	<div class="form-group row">
					 		<div class="col-xs-6">
							    <input type="password" oncopy="return false" oncut="return false" onpaste="return false" name="inputPass" id="inputPass" class="form-control" placeholder="Password" required>
							</div>
							<div class="col-xs-6">
							    <input type="password" oncopy="return false" oncut="return false" onpaste="return false" name="confirmPass" id="confirmPass" class="form-control" placeholder="Confirm Password" required>
							</div>
					 	</div>
					 	<div class="form-group row">
					 		
					 	</div>			        
			            <div class="control-group pt-3">
			              <div class="controls">
			                <button type="submit" name="btnSignup" id="btnSignup"  class="btn btn-primary">Sign In</button>
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
</div>