<?php 
ob_start();
error_reporting(0);
include 'connect.php';
session_destroy();
//include 'logout.php';
if(isset($_POST['signup']))
{
 
$ctfid=$_POST['ctfid'];
$ctfid=trim($ctfid);

$email=$_POST['email'];
$nom=$_POST['fname'];
$nom2=$_POST['lname'];
$resident=$_POST['address'];
$social=$_POST['facebook'];
$statee=$_POST['state'];
$phone=$_POST['gsm'];
$password=$_POST['password'];
$rpassword=$_POST['rpassword'];
$coursee=$_POST['course'];
if($password!=$rpassword)
{
    $_SESSION['password_match']="Oops.. Password Mismatch";
}
else
{
$joined=date('Y-m-d');

$file = $_FILES['proofimage']['name'];
    $file_loc = $_FILES['proofimage']['tmp_name'];
    $folder="static/uploads/";
    $new_file_name = strtolower($file);
    $final_file=$_POST['ctfid']. strrchr($filename,'.').".jpg";
  
    if(move_uploaded_file($file_loc,$folder.$final_file))
      {
        $image=$final_file;
      }   

$query=mysqli_query($conn,"insert into tutors(label,fname,lname,email,password,gsm,state,address,course,paid,pix,facebook,regnumber) values('$ctfid','$nom','$nom2','$email','$password','$phone','$statee','$resident','$coursee','1','$image','$social','1')");
if($query)
{
    $_SESSION['success']="Go&Login";
}
else
{
    $_SESSION['error']="Not Registered Try Again";
}
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
    -<b>TUTOR REGISTRATION</b>-
    <br>
    <i>(fill up carefully)</i>!
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                          <input name="ctfid" class="form-control" id="inputEmail" type="text" placeholder="" value=" <?php



function random_num($size) {

  $alpha_key = ''; 

  $keys = range('A', 'Z');



  for ($i = 0; $i < 2; $i++) {

    $alpha_key .= $keys[array_rand($keys)];

  }



  $length = $size - 2;



  $key = '';

  $keys = range(0, 9);



  for ($i = 0; $i < $length; $i++) {

    $key .= $keys[array_rand($keys)];

  }



  return $alpha_key . $key;

}

$ran = random_num(3);
$csc = 'TT';
$mon = date("md");
$mon1 = date("hs");
echo $csc.''.$ran.''.$mon.''.$mon1;



       

 ?> " readonly>
 email
 <input required name="email" class="form-control" id="inputmail" placeholder="your email" type="email">
 firstname
 <input required name="fname" class="form-control" id="inputfirstname" placeholder="your name" type="text">
 lastname
 <input required name="lname" class="form-control" id="inputlastname" placeholder="your lastname" type="text">
 facebook link
 <input required name="facebook" class="form-control" id="inputlastname" placeholder="social link url" type="text">
 phonenumber
 <input required name="gsm" class="form-control" id="inputlastname" placeholder="your cell number" type="number">
 passport
 <input required type="file" name="proofimage" accept="image/x-png,image/gif,image/jpeg" placeholder="***">
 state
 <select required name="state" class="form-control" title="which state are you" id="select">
                                        <option>-choose state-</option>
                                        <?php
                                                 $sqlz= "SELECT * FROM `states` ";
                                                    $result = mysqli_query($conn,$sqlz);
                                                         while ($rowx = mysqli_fetch_array($result)) {
                                                    echo "<option value='" . $rowx['state'] . "'>" . $rowx['state'] ."</option>";}
                                                    ?>
                                    </select>
                                    address<br>
<textarea id="w3review" name="address" rows="4" cols="50" placeholder=" your residential address...."></textarea><br>
 password <span toggle="#password-fieldx" class="fa fa-fw fa-eye field-icon toggle-passwordx"></span>
 <input required name="password" class="form-control" id="password-fieldx" placeholder="password" title="set password" type="password">
 retype password <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
 <input required name="rpassword" class="form-control" id="password-field" placeholder="confirm password" title="retype password" type="password">
 field
 <select required name="course" class="form-control" title="choose area of interest" id="select">
                                        <option>-select course-</option>
                                        <?php
                                                 $sql = "SELECT * FROM `offers` ";
                                                    $result = mysqli_query($conn,$sql);
                                                         while ($row = mysqli_fetch_array($result)) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "&#8358;". $row['cost'] ."</option>";}
                                                    ?>
                                    </select>
                                    <br>
 <label>
                                            <input required type="checkbox"> i agree & accept rules stated <a href="disclaimer.php">here</a>
                                        </label>
                                        <br>
 <button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="signup" class="btn btn-primary">Submit</button>
</fieldset>
</form>
<hr>
ALREADY HAVE AN ACCOUNT?<br>
kindly <a href="log.php" title="get onboard">LOGIN</a></b>
</center>
  </nav>
  <script>
$(".toggle-passwordx").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>