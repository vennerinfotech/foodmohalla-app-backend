<?php require_once ('../process/connection.php');
require_once ('../session.php'); 

                    date_default_timezone_set('Asia/Kolkata');
                    $date=date('Y-m-d h:i:s A',time());
                    //echo $date; exit();                  
                    $result = mysqli_query($conn,"insert into shops (`shop_name`,`address`,`city`,`latitude`,`longitude`,`contact_number`,`created_at`) values
                    ('".$_POST["sname"]."','".$_POST['txtlandmark']."','".$_POST["city"]."','".$_POST["txtlatitude"]."','".$_POST["txtlongitude"]."','".$_POST["cnumber"]."','".$date."')") or die(mysqli_error($conn));
                            
                    if($result==true)
                    {

                        $_SESSION['status'] = " Your Data Added Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location:../shop.php");
                    }
                    else
                    {
                        $_SESSION['status'] = " Data Not Added Successfully";
                        $_SESSION['status_code'] = "error";
                        header("Location:../shop.php");
                    }
?>