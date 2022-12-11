<?php session_start();  ?>
<?php require_once('header.php'); ?>
<?php
    $con = openConnection();

    $_SESSION['id'] = $_GET['k'];

    $strsqlMembers = "SELECT * FROM accounts WHERE userid=".$_SESSION['id'];;
    $getMembers = getRecord($con, $strsqlMembers);

    $strsqlOrdersCur = "SELECT * FROM orders WHERE status = 'Pending' AND memberid=".$_SESSION['id'];
    $getOrdersCur = getRecord($con, $strsqlOrdersCur);

    $strsqlOrdersHis = "SELECT * FROM orders WHERE status = 'Received' AND memberid=".$_SESSION['id'];
    $getOrdersHis = getRecord($con, $strsqlOrdersHis);
?>

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <i class="far fa-address-card"></i>
                            <br>
                            <span class="profile-img-txt">User Info</span>
                        </div>
                            
                    </div>
                    <?php foreach ($getMembers as $key => $value): ?>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $value['firstname']; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $value['usertype']; ?>
                                    </h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="currentorder-tab" data-toggle="tab" href="#currentorder" role="tab" aria-controls="currentorder" aria-selected="false">Current Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Order History</a>
                                </li>            
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="list_member.php" class="btn btn-danger" name="btnAddMore" value="Edit Profile"/><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $value['userid']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $value['firstname'] . " " . $value['lastname']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $value['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sex</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $value['sex']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>+63&nbsp;<?php echo $value['contact']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $value['address']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Birthday</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $value['birthday']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date Joined</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $value['datejoined']; ?></p>
                                            </div>
                                        </div>
                            </div>
                        <?php endforeach;?>
                            <div class="tab-pane fade" id="currentorder" role="tabpanel" aria-labelledby="currentorder-tab">
                                    <table class="table table-bordered table-striped text-center ">
                                      <thead>
                                        <tr>
                                          <th scope="col">Order ID</th>
                                          <th scope="col">Order Date</th>
                                          <th scope="col">Total Items</th>
                                          <th scope="col">Total Amount</th>
                                          <th scope="col">Status</th>     
                                        </tr>
                                      </thead>
                                      <tbody >
                                        <?php if(!empty($getOrdersCur)): ?>    
                                            <?php foreach ($getOrdersCur as $key => $value): ?> 
                                                <tr>
                                                    <td class="align-middle"><?php echo $value['orderid'] ?></td>
                                                    <td class="align-middle"><?php echo $value['orderdate']; ?></td>
                                                    <td class="align-middle"><?php echo $value['totalitems']; ?></td>
                                                    <td class="align-middle">₱&nbsp;<?php echo number_format($value['totalamount']); ?></td>
                                                    <td class="align-middle"><?php echo $value['status']; ?></td>                                             </tr>
                                            <?php endforeach; ?>                 
                                        <?php else: ?>
                                                <tr>
                                                    <td colspan="8">No Record Found!</td>
                                                </tr>
                                        <?php endif; ?>                      
                                      </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <table class="table table-bordered table-striped text-center ">
                                      <thead>
                                        <tr>
                                          <th scope="col">Order ID</th>
                                          <th scope="col">Order Date</th>
                                          <th scope="col">Total Items</th>
                                          <th scope="col">Total Amount</th>
                                          <th scope="col">Status</th>     
                                        </tr>
                                      </thead>
                                      <tbody >
                                        <?php if(!empty($getOrdersHis)): ?>    
                                            <?php foreach ($getOrdersHis as $key => $value): ?> 
                                                <tr>
                                                    <td class="align-middle"><?php echo $value['orderid'] ?></td>
                                                    <td class="align-middle"><?php echo $value['orderdate']; ?></td>
                                                    <td class="align-middle"><?php echo $value['totalitems']; ?></td>
                                                    <td class="align-middle">₱&nbsp;<?php echo number_format($value['totalamount']); ?></td>
                                                    <td class="align-middle"><?php echo $value['status']; ?></td>                                             </tr>
                                            <?php endforeach; ?>                 
                                        <?php else: ?>
                                                <tr>
                                                    <td colspan="8">No Record Found!</td>
                                                </tr>
                                        <?php endif; ?>                      
                                      </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
<?php require_once('footer.php'); ?> 