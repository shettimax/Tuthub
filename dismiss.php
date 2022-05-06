<?php
include('excecute.php');
//insert.php
$id =$_GET[id];
//echo $id;
if ($id=='All')
{
   dismiss(); 
}
else
{
    dismiss(' where id = '.$id);
}
function dismiss($options)
{   
   $sql = "Update `notification` SET `dismiss` = 1 ".$options;
DB_query($sql);
    
echo ($sql." Excecuted");
 //echo "done";
}
?>