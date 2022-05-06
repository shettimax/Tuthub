<?php
//include ('../globals.php');
include ('excecute.php');

class Notification
{   
public function __construct()
{
    //echo "Hi";
    
}
    
public function Add($subject="",$level="3",$details="",$fulldetails="",$source='2',$date="CURRENT_TIMESTAMP ")
    {

$sql = "INSERT INTO `notification` (`id`, `subject`, `source`, `details`, `date`, `dismiss`, `level`, `fulldetails`) VALUES (NULL, '".$subject."', '".$source."', '".$details."', ".$date.", '0', '".$level."', '".fulldetails." ');";

        $result =  DB_query($sql);
  
    return $result ;
    }
    
    
    
}
$notif = new Notification();
$notif->Add("TEST3",2);
?>