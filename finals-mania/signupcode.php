<?php

	if (isset($_POST['btnSignup'])) {
		
		$con = openConnection();
		$arrErrors = [];

		$usertype = 'Member';
		$lastname = santizeInput($con, $_POST['inputLastName']);
		$firstname = santizeInput($con, $_POST['inputFirstName']);	
		$sex = $_POST['inputSex'];
		$address = santizeInput($con, $_POST['inputAddress']);
		$birthday = $_POST['inputBday'];
		$datejoined = date('Y-m-d');
		$contact = santizeInput($con, $_POST['inputContact']);
		$email = santizeInput($con, $_POST['inputEmail']);
		$pass = santizeInput($con, $_POST['inputPass']);
		$confirmpass = santizeInput($con, $_POST['confirmPass']);

		if(strlen($pass) < 8)
			$arrErrors[] = 'Password should be longer than 8 characters.';
		
		$pass = md5($pass);
		$confirmpass = md5($confirmpass);
		
		if(empty($firstname))
			$arrErrors[] = 'First Name is Required.';

		if(empty($lastname))
			$arrErrors[] = 'Last Name is Required.';

		if(empty($contact))
			$arrErrors[] = 'Contact No. is Required.';

		if(empty($email))
			$arrErrors[] = 'Email Address is Required.';

		if(empty($pass))
			$arrErrors[] = 'Password is Required.';

		

		//Date Validation
		$date2=date("d-m-Y");
	   	$date1=new DateTime($birthday);
	   	$date2=new DateTime($date2);
		$interval = $date1->diff($date2);
		$myage= $interval->y; 
		if($myage < 18){
		    $arrErrors[] = 'Age should be 18+.';
		}

		$tmpContact = mysqli_query($con, "SELECT * FROM accounts WHERE contact='$contact'");
		if(mysqli_num_rows($tmpContact) > 0)
			$arrErrors[] = 'Contact No. already exists.';

		$tmpEmail = mysqli_query($con, "SELECT * FROM accounts WHERE email='$email'");
		if(mysqli_num_rows($tmpEmail) > 0)
			$arrErrors[] = 'Email Address already exists.';

		if($pass !== $confirmpass)
			$arrErrors[] = 'Password Does not Match with Confirm Password.';


		if (empty($arrErrors)) {

			$strSql = "
					INSERT INTO accounts(usertype, lastname, firstname, sex, address, birthday, datejoined, contact, email, pass)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)

				";

			$stmt = mysqli_prepare($con, $strSql);
			mysqli_stmt_bind_param($stmt, "ssssssssss", $usertype, $lastname, $firstname, $sex, $address, $birthday, $datejoined, $contact, $email, $pass);

			$usertype = $usertype;
			$lastname = $lastname;
			$firstname = $firstname;	
			$sex = $sex;
			$address = $address;
			$birthday = $birthday;
			$datejoined = $datejoined;
			$contact = $contact;
			$email = $email;
			$pass = $pass;

			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);

			header('location: clearsignup.php');

		}
		else{
			echo '<div class="alert alert-danger" role="alert"><h3><i class="fas fa-times"></i>&nbsp;Error/s:</h3>';
     		foreach ($arrErrors as $key => $value) {
     			echo '<li><b>'.$value.'</b></li>';
     		}
     		echo '</div>';
		}

		closeConnection($con);
	}

?>