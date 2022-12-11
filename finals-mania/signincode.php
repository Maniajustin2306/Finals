<?php
	
	if (isset($_POST['btnSignin'])) {
		
		$con = openConnection();

		$usertypeIn = $_POST['drpType'];
		$emailIn = santizeInput($con, $_POST['emailIn']);
		$passIn = santizeInput($con, $_POST['passIn']); 

		$passIn = md5($passIn);
		
		$strSqlMember = "SELECT * FROM accounts WHERE email = '$emailIn' AND pass = '$passIn'";

		$strSqlAdmin = "SELECT * FROM accounts WHERE email = '$emailIn' AND pass = '$passIn' AND usertype = 'Admin'";

		if ($usertypeIn == 'Member') {
			if($rsLogin = mysqli_query($con, $strSqlMember)){
				if(mysqli_num_rows($rsLogin) > 0){
						$recMember = mysqli_fetch_array($rsLogin);
						$_SESSION['firstname'] = $recMember['firstname'];
						$_SESSION['memberid'] = $recMember['userid'];
						header('location: aa_frontend/index.php');
						mysqli_free_result($rsLogin);
				}
				else
					echo '<div class="alert alert-danger alert-dismissible mx-auto mt-5 w-25 show" role="alert">
	  						<strong><i class="fas fa-times"></i>&nbsp;Invalid Username/Password!</strong>
	  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    					<span aria-hidden="true">&times;</span>
	  						</button>
						</div>';
			}
			else
				echo '<div class="alert alert-danger mx-auto mt-3 w-25"  role="alert">ERROR: Could not execute your request.</div>';
		}
		elseif ($usertypeIn == 'Admin') {
			if ($rsLogin = mysqli_query($con, $strSqlAdmin)) {
				if(mysqli_num_rows($rsLogin) > 0){
					$recMember = mysqli_fetch_array($rsLogin);
					$_SESSION['firstname'] = $recMember['firstname'];
					$_SESSION['memberid'] = $recMember['userid'];
					header('location: aa_backend/index.php');
					mysqli_free_result($rsLogin);
				}
				else
					echo '<div class="alert alert-danger alert-dismissible mx-auto mt-5 w-25 show" role="alert">
	  						<strong><i class="fas fa-times"></i>&nbsp;Invalid Username/Password!</strong>
	  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    					<span aria-hidden="true">&times;</span>
	  						</button>
						</div>';
			}
		}
		
		closeConnection($con);
	}

?>