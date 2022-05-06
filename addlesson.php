<?php
ob_start();
session_start();
include 'connect.php';
if(strlen($_SESSION['idx'])==0)
  { 
header('location:log.php');
}
$walletid=$_SESSION['idx'];
$query = "SELECT * FROM tutors WHERE label='$walletid'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) 
  {
        while($row=mysqli_fetch_array($result))
        {
      $email=$row['email']; //fetch colmn username  so2 echo l8r
      $phone=$row['gsm']; // registration date
      $paid=$row['paid']; //payment statz 1 or 0
      $course=$row['course']; //what course the user is on
      $adderr=$row['paid']; //what course the user is on
      $place=$row['state'];//fetch the state of user
      $pix=$row['pix'];//hoton user
           
    }
  }

  $query5 = "SELECT * FROM offers WHERE id='$course'";
  $result = mysqli_query($conn,$query5) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) 
  {
        while($row=mysqli_fetch_array($result))
        {
      $planx=$row['name'] . ' &#8358;'. $row['cost'] ; //joined name n cost of dcourse
      $des=$row['description']; //description of course user is on
      $pln=$row['name']; //name of the course user is on
           
    }
  }

$result1 = mysqli_query($conn,"SELECT * FROM `tutors` WHERE course='$course' and state='$place' LIMIT 3");
            $count1 = mysqli_num_rows($result1);
            if (mysqli_num_rows($result1) > 0) 
            {
              while($row=mysqli_fetch_array($result1))
              {
      $tutor=$row['fname'] . ' '. $row['lname'] ; //joined names of tutor
      $phone=$row['gsm']; //description of course user is on
      $tutorid=$row['label']; //label of d tutor
      $placee=$row['state'];// state of tutor
      $social=$row['facebook'];//facebook link of tutor
      $mail=$row['email'];//tutor mail address
      $tutpix=$row['pix'];//picx of d tutor
           
    }
  }
  ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TutsDashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="shortcut icon" href="./static/images/remorobo.png" type="image/png" />
	<link rel="icon" href="./static/images/remorobo.png" type="image/png" />
	<link href="./static/css.php" rel="stylesheet" type="text/css">
	<link href="./static/css/remorobo.css" rel="stylesheet" type="text/css">
 
	<!-- end My Custom CSS-->
	
    
    <!-- My custom JS -->
    <!--Globals -->
    <script>
		
		
    //Events Listeners 
document.addEventListener('DOMContentLoaded', function() {
    setInterval(load_unseen_notification, 1000);

}, false);


   var data; // notification Data json
   var currentNotificationIndex; //current notification message 
var currentNotificationId; //Current Notification Id
        </script>
    <!--End Globals --> 
    <!-- Ajax script -->
    <script>
//generic Ajax Function RunPhP XMLHttpRequest Example //////////        

function RunPhp(serverFile=null,async=true,timeout='5000') {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        var address= this.responseText;
         // alert("Dismiss");
       document.getElementById("divglobalstatuscontent").innerHTML=this.responseText; 
        
     return true;
    }
      else{
          
          //request failed.
          document.getElementById("divglobalstatuscontent").innerHTML="...";
      }
  }
  xmlhttp.open("GET",serverFile,async);
  xmlhttp.timeout=timeout;
  xmlhttp.send();
}











/////////// end Ajax Function RunPhp///////////// 
//////////the below XMLHttpRequest Example was crafted with help of https://www.w3schools.com/xml/xml_http.asp//////    
 function load_unseen_notification(view = '')
 {
var serverFile = "notification.php?id="+view;
     
 if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.ontimeout= load_unseen_notificationTimeOut;
     xmlhttp.onerror = load_unseen_notificationError;
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
     data = JSON.parse(this.responseText);   
    if(data.unseen_notification > 0)
    { 
      //Get the element with the specified ID:
      document.getElementById("dropdown-menu").innerHTML =  data.notification;        
        document.getElementById("count").innerHTML = data.unseen_notification;
        document.getElementById("bellIcon").style.color = data.bellColor;
        document.getElementById("count").style.color = data.bellColor;        
        //addLog("notification Updated");
   }
        else
        {
document.getElementById("dropdown-menu").innerHTML = "<li><strong>Welcome </strong><br /><small><em>No Lessons ... </em></small></li> ";
             document.getElementById("count").innerHTML="";
        document.getElementById("bellIcon").style.color = "transparent" ;
            
        }
    }//for onreadystatechange Function on success 
  } //for onreadystatechange Event  state change 
  
  xmlhttp.open("GET",serverFile,true);
  xmlhttp.send(null);   
}
        // Events Handellings ...
       function load_unseen_notificationTimeOut()
        {            
         //   addLog("The request for unseen Messages timed out.");
        }
        
         function load_unseen_notificationError(){
    // addLog("error in load Unseen ajax","Ajax","Error","error");
        }
        
        
    </script>

    <!-- end Ajax -->

<!--end my custom JS-->
    <!-- hide div -->
    <!--end hide div-->
    <!-- end My custom Java scripts-->
  
  
</head>
<body>


<div class="container">
	
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
        <img src="./static/logo.png"/><br>
				<a class="navbar-brand" href="index.php">Topnotch Howto's</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>
<div id="system-status" class="panel panel-default" style="margin-bottom: 5px">
				

					<div class="panel-heading">
						<h3 class="panel-title"><?php echo strtoupper("$planx");?>

                        <!--Notification Icons -->
                            <!-- refresh-->
                        <a href="?updated" target="_top" data-refresh="system-status" class="btn btn-success pull-right" style="margin:-6px -11px; color: white;"> 
                            <i class="fa fa-refresh"></i>                            
                            </a>
                         <!-- end Refrish -->
                                                        
      <!-- notification -->
<ul class="nav navbar-nav navbar-right" style="margin:-10px 21px;">
      <li id="dropdown" class="dropdown" style="width:45px;">
        <?php if($paid=='1')
                                                    { ?>
<a href="#" onclick="notificationIconOnClick()" style="height:34px; background-color: transparent; color:transparent;" class="dropdown-toggle"  data-toggle="dropdown">
 <span class="label label-pill label-danger count" style="border-radius:10px; 
   font-size:16px; color:green;
"></span>   

    <span class="fa fa-bell" id="bellIcon" style="font-size:25px; margin: -10px -11px;"></span>
          <div id ="count"  style="margin:-30px -25px; font-weight:bold;  color: black; height:17px;" >  </div>
          </a>
          
       <ul id="dropdown-menu" class="dropdown-menu"></ul>
      </li>
     </ul>
     <?php } 
                                                    else
                                                    {
                                        
                                                    ?>NO PAY<?php } ?>
     
     
     
                            <!-- end notification -->

                         <!-- End Notification Icons-->
                        </h3>
					</div>
                    
                    
                    
<div class="panel-body">

    <!-- END Control Buttons-->
    
    <!-- Add Here the second section    --> 

    
    <div id"divglobalstatuscontent"><?php echo strtoupper("$des");?></div>
    <b>tap on bell icon</b>
    <hr>
    <img src="static/uploads/<?php echo $pix;?>" width="220" height="220" alt="user" title="<?php echo $email;?>"/>
    <br>
    <?php if($paid=='1')
                                                    { ?>
    user:
    <b>
      <?php echo $email;?></b>
      <br>
    plan:
    <b>
    <?php echo $walletid;?> /<?php echo $pln;?>
                                                      <?php } 
                                                    else
                                                    {
                                        
                                                    ?><font color="red">ACCOUNT NOT ACTIVATED !!<br>PLEASE PAY TO OUR VENDOR TO UNLOCK MATERIALS<br>below vendor is available<br></font><a href="https://wa.me/08143542252?text=Hello%20pathwaytutors%20vendor01%20i%20want%20to%20pay/unlock%20my%20courses%20myid: <?php echo $walletid; ?>"> message me </a><?php } ?>
  </b>
    <br>
     phone:
     <b>
     <?php echo $phone;?>
     </b><br>
      <a href="logout.php"><img src="./static/logoout.png" width="45" height="32" title="logOff account"></a>
      <hr>
      <?php if($adderr=='1')//if user paid & is moderator
                                                    { ?><?php include 'addi.php';?>
                                                      <?php } 
                                                    else
                                                    {
                                        
                                                    ?>
                                                    <?php } ?>
    
		</div><!-- for  panel-body -->
											
</div><!-- for system-status Div -->
				
</div> <!-- end container -->
    
    
<footer class="footer">
	<div class="container">
		<p class="text-muted">M4XD3V<a href="#" target="_blank">
            <!--<img src="./static/images/Donate-PayPal-green.svg" title="support us">-->
            </a>&copy; <a href="http://t.me/mazangizo" target="_blank">pathwaytutors crafted with ♥ 2021</a></p>
	</div>
</footer>
<div id="dialog-placeholder"></div>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    
    <!-- My custom footer divs-->
    
    
    <!--Hidden modal divs -->
    

    <!-- Message Modal -->    
  <div class="modal fade" id="divmessageModel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="divmessageheadercontainer">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="divmodalheader">Modal Header</h4>
        </div>
          <div id ="divmodalmessageid" style=" visibility: hidden;"></div>
        <div class="modal-body" id ="divmodalbody">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
            
    <!--<div class="checkbox"> -->
  <label><input type="chefckbox" value="pathwaytutors"  id="divmssagesDismissAllCheckBox" value="" readonly></label>
<!-- </div> -->
         <!-- <button type="button" class="btn btn-default" onclick="dismiss(currentNotificationId)">Dismiss</button>-->
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div><!-- end message Modal-->
    <!--Modal JS-->
    <script>
        function showModal(id='',index='',title="Hello title", body= " this is the body ")
    {
        var fullTitle='';  
        var fullBody='';
        if (id>0 && id != null)
        { 
           //fullTitle +=id;            
        }
        fullTitle +=title;
        document.getElementById("divmssagesDismissAllCheckBox").checked = false;
        document.getElementById("divmodalheader").innerHTML=fullTitle;
       /*
       $arrayItem["notification_id"] = $result[$i][0];
$arrayItem["notification_subject"] = $result[$i][1];
$arrayItem["notification_source"] = $result[$i][2];
$arrayItem["notification_text"] = $result[$i][3];
$arrayItem["notification_date"] = $result[$i][4];
$arrayItem["notification_dismiss"] = $result[$i][5];  
$arrayItem["notification_level"] = $result[$i][6];
$arrayItem["fulldetails"] = $result[$i][7];
I NO LONGER WANT THEM SO I RENDER THEM INACTIVE
       */
         fullBody  +="<label></label>"+ data.result[index]["notification_text"] + "<br/>";
        
        fullBody  +="<label>Source:&nbsp;</label>"+  '<?php echo $pln;?>' + "<br/>";
         
         //fullBody  +="<label>TOPIC:&nbsp;</label>"+  data.result[index]["notification_text"] + "<br/>";
         
          fullBody  +="<label>LINK:&nbsp;</label>"+  "<a href="+ data.result[index]["fulldetails"] +">"+"READ HERE</a>" + "<br/>";
          fullBody  +="<label>PUBLISHED:&nbsp;</label>"+  data.result[index]["notification_date"] + "<br/>";
        
          //fullBody  +="<label>id:&nbsp;</label>"+  data.result[index]["notification_id"] + "<br/>";        
        
 document.getElementById("divmessageheadercontainer").style.backgroundColor = data.result[index]["bgColor"];
        document.getElementById("divmodalbody").innerHTML= fullBody;
        
       
        currentNotificationIndex = index;
        currentNotificationId = id;
        
        
        $('#divmessageModel').modal("show");
       
    }  
function dismiss (id='')
        {
            $('#divmessageModel').modal("hide");
            var dismissServerFile = "dismiss.php?id=";
            if (id!= null)
                {
                    if (id==''|| document.getElementById("divmssagesDismissAllCheckBox").checked == true)
                        {
                         //  addLog("dismiss All Notifications");
                            dismissServerFile+="All";
 document.getElementById("count").innerHTML ="";
                        }
                else{
               //  addLog("Dismiss with Id "+id);
                    dismissServerFile+=id;
                    document.getElementById("count").innerHTML ="..";
                    
                    //load_unseen_notification();
                    } 
                    
                    RunPhp(dismissServerFile);
                    
                    } // for id != null            
            
        }
    </script><!-- end modal js-->
    <!-- end Hidden Modal divs -->
    
    <!--end My custom footer divs and sweet alert functions-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php 
    if($_SESSION['password_match'])
    {
    ?>
    <script>
swal("", "<?php echo $_SESSION['password_match'];?>!", "warning");
    </script>
    <?php 
    unset($_SESSION['password_match']);
    } 
    else if($_SESSION['success'])
    {
    ?>
    <script>
swal("Success", "<?php echo $_SESSION['success'];?>!", "success");
    </script>
    <?php 
    unset($_SESSION['success']);
    } 
    else if($_SESSION['error'])
    {
    ?>
    <script>
swal("Oops..", "<?php echo $_SESSION['error'];?>!", "error");
    </script>
    <?php 
    unset($_SESSION['error']);
    } 
    ?>
    
<!-- my custom JS-->
    
    <!-- end my custom javascript -->

</body>
</html>

