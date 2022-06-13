
<?php require_once ('connection.php'); 
require_once ('../session.php');


$id= $_POST['id'];
$bname = $_POST['bname'];
$bdetail = $_POST['bdetail'];
$bcode = $_POST['ccode'];
$bdate = $_POST['edate'];
$oitem = $_POST['vitem'];
$amount = $_POST['damout'];
$type = $_POST['dtype'];
$mcart = $_POST['mincart'];
$mdisc = $_POST['maxdisc'];


                    date_default_timezone_set('Asia/Kolkata');
                    $date=date('Y-m-d h:i:s A',time());

                $result = mysqli_query($conn,"update offers set name='$bname',description='$bdetail',coupon_code='$bcode',expaire_at='$bdate',valid_for_item='$oitem',discount_amount='$amount',discount_type='$type',min_cart_price='$mcart',max_discount_amount='$mdisc',updated_at='$date' where id='$id'") or die(mysqli_error($conn));
              
                if($result== true)
                {
                    $_SESSION['status'] = "Your Data Updated Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../viewoffer.php");
                    
                }
                else
                {
                        $_SESSION['status'] = "Your Data Not Updated!";
                        $_SESSION['status_code'] = "error";
                    header("Location:../viewoffer.php");
                }
?>