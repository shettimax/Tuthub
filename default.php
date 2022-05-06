<?php
$active_page = 'remorobo';
	include_once('./include/config.php');
ob_start();
$html = ob_get_contents();
ob_end_clean();
preg_match('/(?:<body[^>]*>)(.*)<\/body>/isU', $html, $matches);
$phpinfo = $matches[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="./static/images/remorobo.png" type="image/png" />
	<link rel="icon" href="./static/images/remorobo.png" type="image/png" />
	<title>RemoRobo</title>
	<link href="./static/css.php" rel="stylesheet" type="text/css">
	<link href="./static/css/remorobo.css" rel="stylesheet" type="text/css">

	<script src="./static/js.php" type="text/javascript"></script> 
    
    
    <!--Custom js Libs and source-->
       <script src="./static/js/volume.js" type="text/javascript"></script> 
	<!--My Custom Style -->
<!--Volume -->
    
<style type="text/css">     
.volumcontroller {
    height: 35px;
    width: 90px;
}
#volumcontroller div{
    height:40px;
}
.volumecontrollerbar{
    border-left:1px solid #222;
    float:right;
    width:3px;
    -webkit-border-top-left-radius: 3px;
    -moz-border-radius-topleft: 3px;
    border-top-left-radius: 3px;
    background-color: #4c4c4c;
    cursor:pointer;
}
.volumecontrollerbar:hover{
    background-color:#bcbcbc !important;
}
    </style>

    </style>
    
    <!-- My custom JS -->
    <!--Globals -->
    <script>
   var data; // notification Data json
   var currentNotificationIndex; //current notification message 
var currentNotificationId; //Current Notification Id
        </script>
    <!--End Globals --> 
    <!-- Ajax script -->
    <script>
//generic Ajax Function RunPhP //////////        
function RunPhp(serverFile=null,controlId=null,attName='', callId='',device='robot',async=true,timeout='5000') {
    document.getElementById("divglobalstatuscontent").innerHTML="loading..";
    addLog("I am at RunPhp"+serverFile);
  if (serverFile==''|| serverFile==null) {
      addLog ("RunPhp : ServerFile Empty");
      return;
  }        
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

        xmlhttp.ontimeout = function () {
        addLog("The request TimeOut  "+serverFile);
             document.getElementById("divglobalstatuscontent").innerHTML="time out";
    };
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
        var address= this.responseText;
        if(attName=='')
            {
        if(controlId !=''&& controlId)
            {  
                document.getElementById(controlId).innerHTML = this.responseText; 
            }
            }
        else
            {
                 document.getElementById(controlId).setAttribute(attName,this.responseText);
                
            }
         addLog("RunPhp: "+callId+"STATUS="+this.status+",VALUE="+this.responseText);
        
        switch(device)
            {
                    case("robot"):
                    document.getElementById("divrobotstatusbar").innerHTML = this.responseText;
                    break;
                    case("cam"): 
                    document.getElementById("divcamstatusbar").innerHTML = this.responseText;
                    break;
                    case("led"):
                    document.getElementById("divledstatusbar").innerHTML = this.responseText;
                    break;
                    case('notification'):
                    break;
                    case("move"):
                        document.getElementById("divmovestatusbar").innerHTML = this.responseText;
                    break;
                    case('global'):
                    break;
                default:
                    document.getElementById("divglobalstatuscontent").innerHTML=this.responseText;         
            }
         document.getElementById("divglobalstatuscontent").innerHTML="Success call"; 
        
     return true;
    }
      else{
          
          //request failed.
          //document.getElementById("divglobalstatuscontent").innerHTML="...";
      }
  }
  xmlhttp.open("GET",serverFile,async);
  xmlhttp.timeout=timeout;
  xmlhttp.send();
}
/////////// end Ajax Function RunPhp/////////////     
 function load_unseen_notification(view = '')
 {
var serverFile = "./remoroboinclude/ajax/notification.php?id="+view;
     
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
      document.getElementById("dropdown-menu").innerHTML =  data.notification;        
        document.getElementById("count").innerHTML = data.unseen_notification;
        document.getElementById("bellIcon").style.color = data.bellColor;
        document.getElementById("count").style.color = data.bellColor;        
        //addLog("notification Updated");
   }
        else
        {
document.getElementById("dropdown-menu").innerHTML = "<li><strong>Welcome </strong><br /><small><em>No new Notification ... </em></small></li> ";
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
            addLog("The request for unseen Messages timed out.");
        }
        
         function load_unseen_notificationError(){
     addLog("error in load Unseen ajax","Ajax","Error","error");
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
				<a class="navbar-brand" href="./index.php"><img src="./static/images/remorobo.png" />RemoRobo</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<?php
						include_once('./include/menu.php');
					?>
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>
		<div id="system-status" class="panel panel-default" style="margin-bottom: 5px">
				

					<div class="panel-heading">
						<h3 class="panel-title">RemoRobo
                        <!--Notification Icons -->
                            <!-- refresh-->
                        <a href="?updated" target="_top" data-refresh="system-status" class="btn btn-success pull-right" style="margin:-6px -11px; color: white;"> 
                            <i class="fa fa-refresh"></i>                            
                            </a>
                         <!-- end Refrish -->
                                                        
      <!-- notification -->
<ul class="nav navbar-nav navbar-right" style="margin:-10px 21px;">
      <li id="dropdown" class="dropdown" style="width:45px;">
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
                            <!-- end notification -->

                         <!-- End Notification Icons-->
                        </h3>
					</div>
                    
                    
                    
<div class="panel-body">    
    
    
		</div><!-- for  panel-body -->
											
</div><!-- for system-status Div -->
				
</div> <!-- end container -->
    
    
<footer class="footer">
	<div class="container">
		<p class="text-muted">ArabicRobotics <a href="http://www.ArabicRobotics.com" target="_blank">
            <img src="images/web.png">
            </a>. <a href="http://www.ArabicRobotics.com/RemoRobo" target="_blank"><img src="./static/images/remorobosmall.png"/></a></p>
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
  <label><input type="checkbox" value="ALL"  id="divmssagesDismissAllCheckBox" value="">Dismiss All</label>
<!-- </div> -->
          <button type="button" class="btn btn-default" onclick="dismiss(currentNotificationId)">Dismiss</button>
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

       */
         fullBody  +="<label> Full details  :</label>"+ "" + "<br/>";
        
        fullBody  +="<label>Source:</label>"+  data.result[index]["notification_source"] + "<br/>";
         
         fullBody  +="<label>message:</label>"+  data.result[index]["notification_text"] + "<br/>";
         
          fullBody  +="<label>details:</label>"+  data.result[index]["fulldetails"] + "<br/>";
          fullBody  +="<label>date:</label>"+  data.result[index]["notification_date"] + "<br/>";
        
          fullBody  +="<label>id:</label>"+  data.result[index]["notification_id"] + "<br/>";        
        
 document.getElementById("divmessageheadercontainer").style.backgroundColor = data.result[index]["bgColor"];
        document.getElementById("divmodalbody").innerHTML= fullBody;
        
       
        currentNotificationIndex = index;
        currentNotificationId = id;
        
        
        $('#divmessageModel').modal("show");
       
    }  
function dismiss (id='')
        {
            $('#divmessageModel').modal("hide");
            var dismissServerFile = "./remoroboinclude/db/dismiss.php?id=";
            if (id!= null)
                {
                    if (id==''|| document.getElementById("divmssagesDismissAllCheckBox").checked == true)
                        {
                           addLog("dismiss All Notifications");
                            dismissServerFile+="All";
 document.getElementById("count").innerHTML ="";
                        }
                else{
                 addLog("Dismiss with Id "+id);
                    dismissServerFile+=id;
                    document.getElementById("count").innerHTML ="..";
                    
                    //load_unseen_notification();
                    } 
                    RunPhp(dismissServerFile,'','','','notification');
                    
                    } // for id != null            
            
        }
    </script><!-- end modal js-->
    <!-- end Hidden Modal divs -->
    
    <!--end My custom footer divs-->
    
    
<!-- my custom JS-->
    
    <!-- end my custom javascript -->
</body>
</html>
