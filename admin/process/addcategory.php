<?php require_once ('../process/connection.php');
require_once ('../session.php'); 

$shopid = $_POST['bname'];
$dname = $_POST['bdetail'];

                    foreach($shopid as $shoplist) 
                    {

                        date_default_timezone_set('Asia/Kolkata');
                        $date=date('Y-m-d h:i:s A',time());
                        //echo $date; exit();                  
                        $result = mysqli_query($conn,"insert into categories (`shop_id`,`name`,`created_at`) values
                        ('$shoplist','$dname','$date')") or die(mysqli_error($conn));
                    }       
                    if($result==true)
                    {

                        $_SESSION['status'] = " Your Data Added Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location:../category.php");
                    }
                    else
                    {
                        $_SESSION['status'] = " Data Not Added Successfully";
                        $_SESSION['status_code'] = "error";
                        header("Location:../category.php");
                    }
?>
