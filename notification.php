<?php
//script dat fetch and manipulate datas in some sort of associative arrays 
include('fetch.php');
$output = '';
$finalLevel=-2;
//////////// Rendering the lresult //////////////////
//$resultCount = count($resultArray);

if ($resultCount >0)
{
    $finalLevel= $resultArray[0]["notification_level"];

    for($i=0;$i<$resultCount;$i++)
    {
        if ($resultArray[$i]["notification_level"] < $finalLevel) 
        {
            $finalLevel = $resultArray[$i]["notification_level"];
        }
        $bgColor = getBGColor( $resultArray[$i]["notification_level"]);
        $resultArray[$i]["bgColor"] = $bgColor;
      $output .= '
   <li>
   <a href="#" onclick="showModal('.$resultArray[$i]["notification_id"].','.$i.',\''.$resultArray[$i]["notification_subject"].'\',\'Hi there \')")>
   <div   style="background :'.$bgColor.';" >
   <strong>'.$resultArray[$i]["notification_subject"].'</strong>
   </div>
   <div   style="background :orange" >
   <small><em>'.$resultArray[$i]["notification_text"].'</em></small></div>   
   </a>
   </li>
   ';
    }
}
else{
     $output .= '
     <li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}

$bgColor= getBGColor($finalLevel);
$data = array(
    'bellColor'=>$bgColor,
     'unseen_notification'  => $resultCount,
    'notification' => $output,

    'result'=>$resultArray
    
);


///////////////////Display the Result///////////////
echo json_encode($data);

function getBGColor($level)
{
    $bgColor = '';
    switch($level)
    {
        case 1:
                $bgColor="red";
                break;

        case 2:

                 $bgColor="orange";
                break;
        
         case 3:
                $bgColor="gray";                
                break;

    }
    return $bgColor;
    
    
}

?>

