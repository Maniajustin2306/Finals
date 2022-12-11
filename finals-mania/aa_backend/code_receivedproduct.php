<?php
  session_start();
  $_SESSION['addID'] = 'updatereceived';

  if (isset($_GET['k'])) {
    $_SESSION['k'] = $_GET['k']; 
  }

  //RECEIVED PRODUCT
  if (isset($_POST['btnReceived'])) {
    
    $con = openConnection();

    $updateStrSql = "UPDATE orders SET status = 'Received' WHERE orderid = " . $_SESSION['k'];

    if(mysqli_query($con, $updateStrSql)){
      $_SESSION['addID'] = 'updatedelivered';
      header('location: clearAdd.php');
    }
    closeConnection($con);
  }

    
  


?>