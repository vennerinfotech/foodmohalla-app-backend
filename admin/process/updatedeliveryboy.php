
<?php require_once ('connection.php'); 
require_once ('../session.php'); 


$id= $_POST['id'];
$scname = $_POST['bname'];
$cname = $_POST['bdetail'];
$phno = $_POST['lurl'];
$baddress = $_POST['badd'];

                    date_default_timezone_set('Asia/Kolkata');
                    $date=date('Y-m-d h:i:s A',time());

                $result = mysqli_query($conn,"update delivery_boy set shop_id='$scname',name='$cname',phone_no='$phno',address='$baddress',updated_at='$date' where id='$id'") or die(mysqli_error($conn));
              
                if($result== true)
                {
                    $_SESSION['status'] = "Your Data Updated Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../viewdeliveryboy.php");
                    
                }
                else
                {
                        $_SESSION['status'] = "Your Data Not Updated!";
                        $_SESSION['status_code'] = "error";
                    header("Location:../viewdeliveryboy.php");
                }
?>