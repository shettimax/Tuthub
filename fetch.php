<?php
ob_start();
session_start();
//fetch n turn dem  to array
include('excecute.php');
include('connect.php');
$resultArray=array();
$arrayItem=array();

if(strlen($_SESSION['idx'])==0)
  { 
header('location:log.php');
}
$walletid=$_SESSION['idx'];

$query = "SELECT * FROM account WHERE label='$walletid'";
  $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) 
  {
        while($row=mysqli_fetch_array($result))
        {
      $course=$row['course']; //which course user de on
           
    }
  }

$select_query = "SELECT * FROM `notification` WHERE `dismiss` = 0 AND `courseid` = '$course' ORDER BY `notification`.`date` DESC";

$result = DB_query($select_query);

$resultCount =  count($result);

//array_push($resultArray,$arrayItem);
for ($i=0;$i<$resultCount ;$i++)
{
//$arrayItem["index"]=$i;
$arrayItem["notification_id"] = $result[$i][0];
$arrayItem["notification_subject"] = $result[$i][1];
$arrayItem["notification_source"] = $result[$i][2];
$arrayItem["notification_text"] = $result[$i][3];
$arrayItem["notification_date"] = $result[$i][4];
$arrayItem["notification_dismiss"] = $result[$i][5];  
$arrayItem["notification_level"] = $result[$i][6];
$arrayItem["fulldetails"] = $result[$i][7];
$resultArray[$i] = $arrayItem;
}
//$subject = $result[1]; dunno d magic but dis line is horrible
?>