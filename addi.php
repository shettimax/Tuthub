<?php 
ob_start();
error_reporting(0);
include 'connect.php';
if(strlen($_SESSION['idx'])==0)
  { 
header('location:log.php');
}
if(isset($_POST['signup']))
{
    
$colorx=$_POST['kala']; //color
//$kala=trim($kala);

$topicdin=$_POST['topic'];
$linkdin=$_POST['password'];
$linkdini=$_POST['rpassword'];
$lessondin=$_POST['lesson'];
$coursedin=$_POST['course'];
if($linkdin!=$linkdini)
{
    $_SESSION['password_match']="Oops..Link Mismatched";
}
else
{
$joined=date('Y-m-d');

//shigar da collected data's
$query=mysqli_query($conn,"INSERT INTO `notification`(subject,source,details,date,dismiss,level,fulldetails,courseid) values('$lessondin','$colorx','$topicdin','$joined','0','2','$linkdin','$coursedin')");
if($query)
{
    $_SESSION['success']="DEAR $walletid LESSON INSERTED";
}
else
{
    $_SESSION['error']="An Error Occurred";
}
}
}
ob_end_flush();
?>
<html>
<nav class="navbar navbar-default">
    <?php 
include_once 'config.php';
$queryxxi =mysqli_query($conn,"SELECT id from account where course='$course'");
$rowcount=mysqli_num_rows($queryxxi);
?>
    <br>
    <center><b>pathwaytutors is a platform that provides you top-notch well prepaid dinstict howto's and resources.</b><p> For Educational and Information Purposes Only<br># you're seeing this function because you're a moderator<br># Please be sure to crosscheck the lessons form before submitting.<br><b>you have <?php echo $rowcount; ?> students. you can verify id <a href="verify.php">here</b></a></p>
    <hr>
    -<b>ADD A LESSON</b>-
    <br>
    <i>(fill up carefully)</i>!
    <form method="post" class="form-horizontal">
                        <fieldset>
                          <input name="lesson" class="form-control" id="inputEmail" placeholder="LESSON" type="text">
 topic
 <input required name="topic" class="form-control" id="inputPassword" placeholder="TOPIC" title="topic e.g HOW TO THIS/THAT" type="text">
 link
 <input required name="password" class="form-control" id="inputPassword" placeholder="LINK" title="link to document" type="text">
 retype link
 <input required name="rpassword" class="form-control" id="inputPassword" placeholder="RETYPELINK" title="retype link to document" type="text">
                                    color
 <select type="hidden" required name="kala" class="form-control" id="select">
                                        <?php
                                                 $sqlx = "SELECT * FROM `colors` WHERE courseid='$course'";
                                                    $resultx = mysqli_query($conn,$sqlx);
                                                         while ($rowx = mysqli_fetch_array($resultx)) {
                                                    echo "<option value='" . $rowx['courseid'] . "'>" . $rowx['color'] . "&nbsp;FOR&nbsp;". $rowx['cosdin'] ."</option>";}
                                                    ?>
                                    </select>
                                    <br>
 <label>
                                            <input required type="checkbox"> i agree & accept rules stated <a href="disclaimer.php">here</a>
                                        </label>
                                        <br>
 <button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="signup" class="btn btn-primary">Submit</button><br>
<hr>
</fieldset>
</form>
<a href="tutor.php"><button type="reset" class="btn btn-default">Go Back</button></a>
<hr>
you're a<br>
Moderator</b>
</center>
  </nav>