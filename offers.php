<html>
<style>
table, th, td {
  border: 1px solid black;
  padding: 5px;
}
table {
  border-spacing: 15px;
}
#er {
  width: 100%;    
  background-color: #f1f1c1;
}
</style>
<nav class="navbar navbar-default">
    <br>
    <center><font color="green"><b>pathwaytutors is a platform that provides you top-notch well prepaid distinct howto's and resources.</b><p> For Educational and Information Purposes Only<br>
      <img src="static/bannerdina.png" title="tutor&studs" alt="babuhoto" width="380px" height="249px"><br>
The purpose of this website, company, products, coaching and the educational services and information provided through and delivered via our blog, Website, Products, <br>Programs and Services is for educational and informational purposes only and is made available to you as self-educational materials and tools for your own use. All materials and information are to educate, inform and inspire your skillset.</p></font>
    <hr>
    -<b>WHAT WE OFFER</b>-
    <br>
    <i>(you pay once in a life time ain't that generous?)</i>!
    <table style="width:85%" id="er">
  <tr>
    <th>Course</th>
    <th>Context</th> 
    <th>Amount</th>
  </tr>
   <?php
   include_once 'connect.php';
                                       
                                        $getr="SELECT * FROM `offers`";
                                        $run=mysqli_query($conn,$getr);
                                        while($row_pro=mysqli_fetch_array($run))
                                        {
                                            $tutsname=$row_pro['name'];
                                            $tutdescrip=$row_pro['description'];
                                            $tutcost=$row_pro['cost'];
                                           
                                            
                                            
                                        ?>
                        <tr>
                            <td><?php echo htmlentities($tutsname);?></td>
                            <td><?php echo htmlentities($tutdescrip);?></td>
                            <td>&#8358;<?php echo htmlentities($tutcost);?></td>
                        </tr>
                        <?php } ?>
</table>
<br>
-<b>#STEPS</b>-<br>
REGISTER > PAY > LOGIN AND ENJOY CLASSIC RESOURCES
<hr>
NOTE: to access your packages kindly<br>
<a href="reg.php" title="register"><b>REGISTER</a> or <a href="log.php" title="get onboard">LOGIN</a></b>
</center>
  </nav>