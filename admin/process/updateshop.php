
<?php require_once ('connection.php'); 
require_once ('../session.php');


$id= $_POST['id'];
$bname = $_POST['sname'];
$bdetail = $_POST['txtlandmark'];
$bcity = $_POST['city'];
$bnumber = $_POST['cnumber'];
$blatitude = $_POST['txtlatitude'];
$lurl = $_POST['txtlongitude'];


                    date_default_timezone_set('Asia/Kolkata');
                    $date=date('Y-m-d h:i:s A',time());

                $result = mysqli_query($conn,"update shops set shop_name='$bname',address='$bdetail',city='$bcity',latitude='$blatitude',longitude='$lurl',contact_number='$bnumber',updated_at='$date' where id='$id'") or die(mysqli_error($conn));
              
                if($result== true)
                {
                    $_SESSION['status'] = "Your Data Updated Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../viewshop.php");
                    
                }
                else
                {
                        $_SESSION['status'] = "Your Data Not Updated!";
                        $_SESSION['status_code'] = "error";
                    header("Location:../viewshop.php");
                }
?>