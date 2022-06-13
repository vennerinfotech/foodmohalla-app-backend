
<?php require_once ('connection.php'); 
require_once ('../session.php'); 


$id= $_POST['id'];
$scname = $_POST['bname'];
$cname = $_POST['cname'];


                    date_default_timezone_set('Asia/Kolkata');
                    $date=date('Y-m-d h:i:s A',time());

                $result = mysqli_query($conn,"update categories set shop_id='$scname',name='$cname',updated_at='$date' where id='$id'") or die(mysqli_error($conn));
              
                if($result== true)
                {
                    $_SESSION['status'] = "Your Data Updated Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../viewcategory.php");
                    
                }
                else
                {
                        $_SESSION['status'] = "Your Data Not Updated!";
                        $_SESSION['status_code'] = "error";
                    header("Location:../viewcategory.php");
                }
?>