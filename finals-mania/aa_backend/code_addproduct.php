<?php
	
	//ADD PRODUCT
	if (isset($_POST['btnAddProd'])) {
		
		$con = openConnection();
		$arrErrors = [];

		$prodname = santizeInput($con, $_POST['inputProdName']);
		$proddescrip = santizeInput($con, $_POST['inputDescrip']);
		$prodprice = $_POST['inputProdPrice'];

		if(isset($_FILES['inputPhoto1']) && isset($_FILES['inputPhoto2']) || empty($_FILES['inputPhoto1']) && empty($_FILES['inputPhoto2']))
			$photo1 = $_FILES['inputPhoto1']['name'];
			$sizephoto1 = $_FILES['inputPhoto1']['size'];
			$tempphoto1 = $_FILES['inputPhoto1']['tmp_name'];
			$typephoto1 = $_FILES['inputPhoto1']['type'];
			$fileExttemp1 = explode('.', $photo1);
			$fileExt1 = strtolower(end($fileExttemp1));

			$photo2 = $_FILES['inputPhoto2']['name'];
			$sizephoto2 = $_FILES['inputPhoto2']['size'];
			$tempphoto2 = $_FILES['inputPhoto2']['tmp_name'];
			$typephoto2 = $_FILES['inputPhoto2']['type'];
			$fileExttemp2 = explode('.', $photo2);
			$fileExt2 = strtolower(end($fileExttemp2));

			$arrAllowedFiles = array('jpeg', 'jpg', 'png');
			$uploadDIR = '../uploads/';

			if (in_array($fileExt1, $arrAllowedFiles) === false) {
				$arrErrors[] = 'Photo 1 Extension File is not Allowed!';
			}

			if ($sizephoto1 > 10000000) {
				$arrErrors[] = 'Photo 1 File size should be 10mb Maximum.';
			}

			if (in_array($fileExt2, $arrAllowedFiles) === false) {
				$arrErrors[] = 'Photo 2 Extension File is not Allowed!';
			}

			if ($sizephoto2 > 10000000) {
				$arrErrors[] = 'Photo 2 File size should be 10mb Maximum.';
			}
			
			$tmpProdname = mysqli_query($con, "SELECT * FROM products WHERE prodname='$prodname'");
			if(mysqli_num_rows($tmpProdname) > 0)
				$arrErrors[] = 'Product Name already exists.';

			if(empty($prodname))
				$arrErrors[] = 'Product Name is Required.';

			if(empty($proddescrip))
				$proddescrip = 'No Description Available';

			if (empty($arrErrors)) {

				move_uploaded_file($tempphoto1, $uploadDIR . $photo1);
				move_uploaded_file($tempphoto2, $uploadDIR . $photo2);

				$strSql = "
						INSERT INTO products(prodname, proddescrip, prodprice, prodphoto1, prodphoto2)
						VALUES (?, ?, ?, ?, ?)

					";

				$stmt = mysqli_prepare($con, $strSql);
				mysqli_stmt_bind_param($stmt, "ssiss", $prodname, $proddescrip, $prodprice, $photo1, $photo2);

				$prodname = $prodname;
				$proddescrip = $proddescrip;
				$prodprice = $prodprice;
				$photo1 = $photo1;	
				$photo2 = $photo2;

				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);

				$_SESSION['addID'] = 'addproduct';
				header('location: clearAdd.php');
			}
			else{
				echo '<div class="alert alert-danger w-25 mx-auto mt-5" role="alert"><h3><i class="fas fa-times"></i>&nbsp;Error/s:</h3>';
		 		foreach ($arrErrors as $key => $value) {
		 			echo '<li><b>'.$value.'</b></li>';
		 		}
		 		echo '</div>';
			}

		closeConnection($con);
	}


	
?>
<?php
	$con = openConnection();
	$inputSearch = "";
	$search ="";
	if (isset($_POST['btnSearch'])) {
		$search ="";
		$inputSearch = santizeInput($con, $_POST['inputSearch']);
		$search = "WHERE prodname LIKE '%$inputSearch%'";
		
	}
	else
		$search ="";
	closeConnection($con);

?>	