<?php
ob_start();
//session_start();
include 'config.php';
//if(strlen($_SESSION['id'])==0)
    //{   
//header('location:login.php');
//}
//$walletid=$_SESSION['id'];


    if(isset($_POST['request']))
    {
        $file = $_FILES['proofimage']['name'];
        $file_loc = $_FILES['proofimage']['tmp_name'];
        $folder="admin/proofimages/";
        $new_file_name = strtolower($file);
        $final_file=str_replace(' ','-',$new_file_name);
    
        if(move_uploaded_file($file_loc,$folder.$final_file))
            {
                $image=$final_file;
            }

        $package=$_POST['course'];
        //$myNumber=$package;
 
//I want to get 10% of what refereduser is investing.
//$percentToGet=10;
 
//Convert our percentage value into a decimal.
//$percentInDecimal=$percentToGet / 100;
 
//Get the result.
//$percent=$percentInDecimal * $myNumber;

//bonusbalance+wah we got up gon b final bonusbalance
//$refbalance=$refb+$percent;
        $lesson=$_POST['lessondin'];
        $topic=$_POST['topicdin'];
        $link=$_POST['linkdin'];
        $date=date('Y-m-d');
        $queryi=mysqli_query($conn,"insert into notification(subject,source,details,date,dismiss,level,fulldetails,courseid) values('$lesson','1','$topic','$date','0','0','$link','$package')"); //this store user investment request into tbl invest(admin work on dis)
        $query2i=mysqli_query($conn,"update notification set fulldetails='$link' where courseid='$package'"); //debit the investor
        if($queryi and $query2i) //to confirm the two queries above n run d next line
        {

            $query5=mysqli_query($conn,"update notification set level='$package' where courseid='$package'"); //quuery pile coins to admin we cnt just waste coins
            $url="#";
            $_SESSIONc['success']="Invested stb$package successfully";
            echo "<script>
            window.location.href='$url'
            </script>";
        }
        else
        {
            $_SESSIONc['error']="o0ps.. An Error Occured"; //prolly when dere is an error
        }
    }
    ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>💀</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">pathwaytutors-BACKBOX💀</h3></div>
                                    <div class="card-body">
                                        <form action="index.php" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">LESSON</label>
                                                <input required name="lessondin" class="form-control py-4" id="inputEmailAddress" type="text" placeholder="e.g lesson 3" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">TOPIC</label>
                                                <input required name="topicdin" class="form-control py-4" id="inputEmailAddress" type="text" placeholder="e.g how to root" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">DRIVELINK</label>
                                                <input required name="link" class="form-control py-4" id="inputEmailAddress" type="text" placeholder="drive url" title="the url gotten from shared google drive folder/file" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">COURSE</label>
                                                <select class="form-element" name="course">
                                <option value="">view plans</option>
                                <?php
                                                 $sql = "SELECT * FROM `offers` ";
                                                    $result = mysqli_query($conn,$sql);
                                                         while ($row = mysqli_fetch_array($result)) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";}
                                                    ?>
                            </select>
                                            </div>
                                           <!-- <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">password</label>
                                                <input required name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="password" />
                                            </div>-->
                                          
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" name="request" type="submit">SUBMIT</button>
                                             
                                        </div>
                                        </form>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
          
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>