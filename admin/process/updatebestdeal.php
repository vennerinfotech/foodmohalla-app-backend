
<?php require_once ('connection.php'); 
require_once ('../session.php');


$id= $_POST['id'];
$bname = $_POST['bname'];
$cname = $_POST['dname'];
$coname = $_POST['textdesc'];
$price = $_POST['pprice'];



                if(!empty($_FILES["image"]["tmp_name"]))
                {
                    $name=$_FILES["image"]["name"];
                    $ext=pathinfo($name,PATHINFO_EXTENSION);
                    $newname="CERT".date('Ymdhis').".".$ext;
                } else {
                    $newname=$_POST["oldimg"];
                }

                if(!empty($_FILES["bimage"]["tmp_name"]))
                {
                    $name=$_FILES["bimage"]["name"];
                    $ext=pathinfo($name,PATHINFO_EXTENSION);
                    $newname1="CERT".date('Ymdhis').".".$ext;
                } else {
                    $newname1=$_POST["oldimg1"];
                }

                date_default_timezone_set('Asia/Kolkata');
                $date=date('Y-m-d h:i:s A',time());

                $result = mysqli_query($conn,"update grab_best_deal set shop_id='$bname',deal_name='$cname',description='$coname',price='$price',thumbnail_img_url='$newname',banner_img_url='$newname1',updated_at='$date' where id='$id'") or die(mysqli_error($conn));
                
                if($result== true)
                {
                    move_uploaded_file($_FILES["image"]["tmp_name"], "../Upload/Bestdeal/".$newname);

                    move_uploaded_file($_FILES["bimage"]["tmp_name"], "../Upload/Bestdeal-Banner/".$newname1);

                    $_SESSION['status'] = "Your Data Updated Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../viewbestdeal.php");
                    
                }
                else
                {
                        $_SESSION['status'] = "Your Data Not Updated!";
                        $_SESSION['status_code'] = "error";
                    header("Location:../viewbestdeal.php");
                }
?> 