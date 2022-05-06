<?php
include 'config.php';
if(isset($_POST['action']) && $_POST['action']=='confirm')
{
    $id=$_POST['id'];
    $walletid=$_POST['walletid'];
    //$amount=$_POST['amount'];
    
    $query = "SELECT * FROM account WHERE label='$walletid'";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
	if (mysqli_num_rows($result) > 0) 
	{
        while($row=mysqli_fetch_array($result))
        {
			$balance=$row['paid'];
		}
    }
    $current_balance=0;

    $sql="update account set paid='$current_balance' where label='$walletid'";
    $check_success=mysqli_query($conn,$sql);

    if($check_success)
    {
        mysqli_query($conn,"update account set paid='1' where id='$id'");
    }

}
?>