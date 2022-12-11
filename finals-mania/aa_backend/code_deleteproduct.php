<?php
  session_start();
  $_SESSION['addID'] = 'delproduct';
  if (isset($_GET['k'])) {
    $_SESSION['k'] = $_GET['k']; 
  }

  //DELETE PRODUCT
  if (isset($_POST['btnDelProd'])){
    $con = openConnection();
    $delStrSql = "DELETE FROM products WHERE prodid = " . $_SESSION['k'];
    if(mysqli_query($con, $delStrSql)){
      header('location: clearAdd.php');
    }
    
    closeConnection($con);
  }
?>