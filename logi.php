<?php
ob_start();
error_reporting(0);
session_start();

include 'connect.php';

if(isset($_SESSION['idx']))
{
if(strlen($_SESSION['idx'])!=0)
  { 
header('location:dash.php');
}
}
    
if (isset($_POST['login']))
{
  $username = $_POST['email'];
    $password = $_POST['password']; 
    //$password=md5($password);
    $query = "SELECT * FROM account WHERE username='$username' and password='$password'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $count = mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) 
  {
    while($row=mysqli_fetch_array($result))
        {
            $walletid=$row['label'];
        }
        $_SESSION['idx']=$walletid;
    header('Location:dash.php');
  }
    else{
    $_SESSION['error']="Invalid Details";
    }
}

ob_end_flush();
?>
<html>
<nav class="navbar navbar-default">
    <br>
    <center><b>pathwaytutors is a platform that provides you top-notch well prepaid dinstict howto's and resources.</b><p> For Educational and Information Purposes Only<br>
The purpose of this website, company, products, coaching and the educational services and information provided through and delivered via our blog, Website, Products, <br><font color="RED"><b>IF YOU ARE A TUTOR KINDLY</b><a href="tutlogin.php"> click here</a></p></font>
    <hr>
    -<b>LOGIN</b>-
    <br>
    <i>(fill up carefully)</i>!
    <form method="post" class="form-horizontal">
                        <fieldset>
 email
 <input required name="email" class="form-control" id="inputPassword" placeholder="your email" title="your mail" type="email">
 password
 <input required name="password" class="form-control" id="inputPassword" placeholder="password" title="your password" type="password">
 <label>
                                            <input required type="checkbox"> i agree & accept rules stated <a href="offers.php">here</a>
                                        </label>
                                        <br>
 <button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="login" class="btn btn-primary">Submit</button>
</fieldset>
</form>
<hr>
DON'T HAVE AN ACCOUNT?<br>
kindly <a href="reg.php" title="get onboard">REGISTER</a></b>
</center>
  </nav>