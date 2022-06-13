<?php require_once ('../process/connection.php');
require_once ('../session.php'); 


$shopid = $_POST['bname'];
$dname = $_POST['bdetail'];
$phno = $_POST['lurl'];
$address = $_POST['daddress'];

                    foreach($shopid as $shoplist) 
                    {

                        date_default_timezone_set('Asia/Kolkata');
                        $date=date('Y-m-d h:i:s A',time());
                        //echo $date; exit();                  
                        $result = mysqli_query($conn,"insert into delivery_boy (`shop_id`,`name`,`phone_no`,`address`,`created_at`) values
                        ('$shoplist','$dname','$phno','$address','$date')") or die(mysqli_error($conn));
                    }      
                    if($result==true)
                    {

                        $_SESSION['status'] = " Your Data Added Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location:../deliveryboy.php");
                    }
                    else
                    {
                        $_SESSION['status'] = " Data Not Added Successfully";
                        $_SESSION['status_code'] = "error";
                        header("Location:../deliveryboy.php");
                    }
?>