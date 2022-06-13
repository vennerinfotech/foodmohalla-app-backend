<?php require_once ('../process/connection.php');
require_once ('../session.php'); 

                    date_default_timezone_set('Asia/Kolkata');
                    $date=date('Y-m-d h:i:s A',time());
                    //echo $date; exit();                  
                    $result = mysqli_query($conn,"insert into offers (`name`,`description`,`coupon_code`,`expaire_at`,`valid_for_item`,`discount_amount`,`discount_type`,`min_cart_price`,`max_discount_amount`,`created_at`) values
                    ('".$_POST["bname"]."','".$_POST["bdetail"]."','".$_POST["ccode"]."','".$_POST["edate"]."','".$_POST["vitem"]."','".$_POST["damout"]."','".$_POST["dtype"]."','".$_POST["mincart"]."','".$_POST["maxdisc"]."','".$date."')") or die(mysqli_error($conn));
                            
                    if($result==true)
                    {

                        $_SESSION['status'] = " Your Data Added Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location:../offer.php");
                    }
                    else
                    {
                        $_SESSION['status'] = " Data Not Added Successfully";
                        $_SESSION['status_code'] = "error";
                        header("Location:../offer.php");
                    }
?>
