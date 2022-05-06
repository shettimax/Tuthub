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
                        <h1 class="mt-4">Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">users</li>
                        </ol>
                        <form method="post">
    <div class="form-group">
        <label>Search By USERID</label>
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
                                                
                                                <th>ID</th>
                                                <th>CTFID</th>
                                                <th>EMAIL</th>
                                                <th>COURSE</th>
                                                <th>JOINED</th>
                                                <th>PAYSTAT</th>
                                            </tr>
                                        </thead>
                                      
                                     


                                        <tbody>

                                        <?php
                                       
                                        $get="select * from account";
                                        $run=mysqli_query($conn,$get);
                                        while($row_pro=mysqli_fetch_array($run))
                                        {
                                            $id=$row_pro['id'];
                                            $label=$row_pro['label'];
                                            $username=$row_pro['username'];
                                            $farko=$row_pro['paid'];
                                            $date=$row_pro['regdate'];
                                            $score=$row_pro['course'];
                                           
                                            
                                            
                                        ?>
<?php
                                       
                                        $getx="select * from offers where id='$score'";
                                        $runx=mysqli_query($conn,$getx);
                                        $counter=0;
                                        while($row_prox=mysqli_fetch_array($runx))
                                        {
                                            $Fullname=$row_prox['cost'] ;
                                            $cosdin=$row_prox['name'];
                                  
                                        ?>
                                            <tr>
                                                <td><?php echo ++$counter;?></td>
                                                <td><?php echo htmlentities($label);?></td>
                                                <td><?php echo htmlentities($username);?></td>
                                                <td><?php echo htmlentities($cosdin);?></td>
                                                <td><?php echo htmlentities($date);?></td>
                                               
                                                <td>
                                                    <?php if($farko=='1')
                                                    { ?>
                                               <a id="status_change" class="btn btn-primary"><i class="fas fa-check-circle" style="margin-right: 5px;"></i>&#8358;<?php echo $Fullname; ?></a>
                                                    <?php } 
                                                    else
                                                    {
                                        
                                                    ?>
                                                    <span class="badge badge-success">NOT PAID!</span>
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