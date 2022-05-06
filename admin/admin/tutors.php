<?php
ob_start();
session_start();
error_reporting(0);


include 'config.php';

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}

?>

<?php 
// if(isset($_GET['action']) && $_GET['action']=='confirm')
// {
//     $id=$_GET['id'];
//     $walletid=$_GET['wallet_id'];
//     $amount=$_GET['amount'];
    
//     $query = "SELECT * FROM account WHERE label='$walletid'";
// 	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
//     $count = mysqli_num_rows($result);
// 	if (mysqli_num_rows($result) > 0) 
// 	{
//         while($row=mysqli_fetch_array($result))
//         {
// 			$balance=$row['balance'];
// 		}
//     }
//     $current_balance=$balance+$amount;

//     $sql="update account set balance='$current_balance' where label='$walletid'";
//     $check_success=mysqli_query($conn,$sql);

//     if($check_success)
//     {
//         mysqli_query($conn,"update topup set status='approved' where id='$id'");
//     $class="success";
//     $message="Status Approved ,Balance Updated";
//     }

// }
if(isset($_POST['submit']))
{
    $walletid=$_POST['walletid'];
}
ob_end_flush();
?>
<?php include 'header.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tutors</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">tutors</li>
                        </ol>
                        <form method="post">
    <div class="form-group">
        <label>Search By TUTORID</label>
        <input type="text" class="form-control" name="walletid">
        
        <input style="margin-top: 10px;" type="submit" name="submit" value="Search" class="btn btn-primary">
    </div>
</form>

                        <div class="card mb-4">
                            <div class="card-header">
                              
                                
                             
                            </div>
                         
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                
                                                <th>SN</th>
                                                <th>PHONE</th>
                                                <th>TUTOR NAME</th>
                                                <th>COURSE TUTORING</th>
                                                <th>TUTOR PHOTO</th>
                                                <th>ACTIVESTAT</th>
                                            </tr>
                                        </thead>
                                      
                                     


                                        <tbody>

                                        <?php
                                       
                                        $get="select * from tutors";
                                        $run=mysqli_query($conn,$get);
                                        $counter=0;
                                        while($row_pro=mysqli_fetch_array($run))
                                        {
                                            $id=$row_pro['id'];
                                            $phone=$row_pro['gsm'];
                                            $username=$row_pro['fname'] . ' '. $row_pro['lname'] ;
                                            $farko=$row_pro['paid'];
                                            $tutpix=$row_pro['pix'];
                                            $score=$row_pro['course'];
                                           
                                            
                                            
                                        ?>
<?php
                                       
                                        $getx="select * from offers where id='$score'";
                                        $runx=mysqli_query($conn,$getx);
                                        while($row_prox=mysqli_fetch_array($runx))
                                        {
                                            $Fullname=$row_prox['cost'] ;
                                            $cosdin=$row_prox['name'];
                                  
                                        ?>
                                            <tr>
                                                <td><?php echo ++$counter;?></td>
                                                <td><?php echo htmlentities($phone);?></td>
                                                <td><?php echo htmlentities($username);?></td>
                                                <td><?php echo htmlentities($cosdin);?></td>
                                                <td><a href="../../static/uploads/<?php echo $tutpix;?>" target="_blank"><img src="../../static/uploads/<?php echo $tutpix;?>" width="150px" height="80px"></td></a>
                                                <td>
                                                    <?php if($farko=='11')
                                                    { ?>
                                               <a id="status_change" class="btn btn-primary"><i class="fas fa-check-circle" style="margin-right: 5px;"></i>&#8358;<?php echo $Fullname; ?></a>
                                                    <?php } 
                                                    else
                                                    {
                                        
                                                    ?>
                                                    <span class="badge badge-success">ACTIVE & VERIFIED</span>
                                                    <?php } ?>
                                    
                                              </td>
                                            
                                                
                                               
                                            </tr>
                                          
                                        <?php } ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
             <?php include 'footer2.php'; ?>