<?php
	$search = "";
	$selected = "";
	$selected2 = "";
	$selected3 = "";
	$selected4 = "";
	$selected5 = "";
	$con = openConnection();
	if (isset($_POST['btnSearch'])) {
		if ($_POST['drpDate'] == 'day') {
			$day = date('Y-m-d');
			$search = "WHERE orderdate LIKE '$day'";
			$selected = "selected";
			$selected2 = "";
			$selected3 = "";
			$selected4 = "";
			$selected5 = "";
		}
		elseif ($_POST['drpDate'] == 'month') {
			$month = date('Y-m');
			$search = "WHERE orderdate LIKE '%$month%'";
			$selected = "";
			$selected2 = "selected";
			$selected3 = "";
			$selected4 = "";
			$selected5 = "";
		}
		elseif ($_POST['drpDate'] == 'year') {
			$year = date('Y');
			$search = "WHERE orderdate LIKE '%$year%'";
			$selected = "";
			$selected2 = "";
			$selected3 = "selected";
			$selected4 = "";
			$selected5 = "";
		}
		elseif ($_POST['drpDate'] == 'pending') {
			$search = "WHERE status = 'Pending'";
			$selected = "";
			$selected2 = "";
			$selected3 = "";
			$selected4 = "selected";
			$selected5 = "";
		}
		elseif ($_POST['drpDate'] == 'received') {
			$search = "WHERE status = 'Received'";
			$selected = "";
			$selected2 = "";
			$selected3 = "";
			$selected4 = "";
			$selected5 = "selected";
		}
		
		
	}

	closeConnection($con);



?>	