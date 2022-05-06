<?php
ob_start();
error_reporting(0);
session_start();

include 'connect.php';

if(isset($_SESSION['idx']))
{
if(strlen($_SESSION['idx'])!=0)
  { 
header('location:log.php');
}
}
    
if (isset($_POST['reg']))
{
  $regno = $_POST['regnumber'];
    $query = "SELECT * FROM account WHERE label='$regno'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $count = mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) 
  {
    while($row=mysqli_fetch_array($result))
        {
            $regid=$row['regnumber'];
        }
        $_SESSION['idx']=$walletid;
    $_SESSION['success']="ID: $regno IS VALID";
  }
    else{
    $_SESSION['error']="Data Not Found";
    }
}

ob_end_flush();
?>
<html>
<nav class="navbar navbar-default">
    <br>
    <center><b>pathwaytutors is a platform that provides you top-notch well prepaid dinstict howto's and resources.</b><p> For Educational and Information Purposes Only<br></p>
    <hr>
    -<b>VERIFY AN ID</b>-
    <br>
    <i>(for tutor use)</i>!
    <form method="post" class="form-horizontal">
                        <fieldset>
 matricnumber
 <input required name="regnumber" class="form-control" id="inputPassword" placeholder="student id/label" title="student matric number" type="text">
                                        <br>
 <button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="reg" class="btn btn-primary">Submit</button>
</fieldset>
</form>
<hr>
DONE WITH VERIFICATION?<br>
kindly <a href="tutor.php" title="get onboard">GO BACK</a></b>
</center>
  </nav>