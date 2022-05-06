<?php
ob_start();
error_reporting(0);
session_start();
//include 'logout.php';
include 'connect.php';

//if(isset($_SESSION['idx']))
//{
//if(strlen($_SESSION['idx'])!=0)
  //{ 
//header('location:tutorreg.php');
//}
//}
    
if (isset($_POST['reg']))
{
  $regno = $_POST['regnumber'];
    $schoolx = $_POST['school']; 
    //$password=md5($password);
    $query = "SELECT * FROM tutsvalidation WHERE regnumber='$regno' and schoolname='$schoolx'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $count = mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) 
  {
    while($row=mysqli_fetch_array($result))
        {
            $regid=$row['regnumber'];
        }
        $_SESSION['regnumber']=$regnumb;
    header('Location:tutorreg.php');
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
    <center><b>pathwaytutors is a platform that provides you top-notch well prepaid dinstict howto's and resources.</b><p> For Educational and Information Purposes Only<br>
The purpose of this website, company, products, coaching and the educational services and information provided through and delivered via our blog, Website, Products, <br>Programs and Services is for educational and informational purposes only and is made available to you as self-educational materials and tools for your own use. All materials and information are to educate, inform and inspire your skillset.</p>
    <hr>
    -<b>TUTOR PRE-REG</b>-
    <br>
    <i>(fill up carefully)</i>!
    <form method="post" class="form-horizontal">
                        <fieldset>
 matricnumber
 <input required name="regnumber" class="form-control" id="inputPassword" placeholder="your registration number" title="yor matric number" type="text">
 school
 <select required name="school" class="form-control" title="school you graduated from" id="select">
                                        <option>-select school-</option>
                                        <?php
                                                 $sql = "SELECT * FROM `tutsvalidation` ";
                                                    $result = mysqli_query($conn,$sql);
                                                         while ($row = mysqli_fetch_array($result)) {
                                                    echo "<option value='" . $row['schoolname'] . "'>" . $row['schoolname'] . " > ". $row['department'] ."</option>";}
                                                    ?>
                                    </select>
 <label>
                                            <input required type="checkbox"> i agree & accept rules stated <a href="offers.php">here</a>
                                        </label>
                                        <br>
 <button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="reg" class="btn btn-primary">Submit</button>
</fieldset>
</form>
<hr>
ALREADY HAVE AN ACCOUNT?<br>
kindly <a href="log.php" title="get onboard">LOGIN</a></b>
</center>
  </nav>