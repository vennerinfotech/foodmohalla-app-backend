<?php require_once ('../process/connection.php');
require_once ('../session.php'); 

$shopid = $_POST['bname'];
$cname = $_POST['cname'];
$description = $_POST['txtdescription'];
$price = $_POST['pprice'];
$pname = $_POST['pname'];


                foreach($shopid as $shoplist) 
                {
                    $name=$_FILES["cimage"]["name"];
                    $ext=pathinfo($name,PATHINFO_EXTENSION);
                    $newname="CERT".date('Ymdhis').".".$ext;

                    $name=$_FILES["bimage"]["name"];
                    $ext=pathinfo($name,PATHINFO_EXTENSION);
                    $newname1="CERT".date('Ymdhis').".".$ext;

                    date_default_timezone_set('Asia/Kolkata');
                    $date=date('Y-m-d h:i:s A',time());

                    //echo $date; exit();                  
                    $result = mysqli_query($conn,"insert into recommanded (`shop_id`,`combo_name`,`thumbnail_img_url`,`description`,`banner_img_url`,`price`,`product_id`,`created_at`) values
                    ('$shoplist','$cname','".$newname."','$description','".$newname1."','$price','$pname','$date')") or die(mysqli_error($conn));
                }       
                    if($result==true)
                    {
                        move_uploaded_file($_FILES["cimage"]["tmp_name"], "../Upload/Combo/".$newname);
                        
                        move_uploaded_file($_FILES["bimage"]["tmp_name"], "../Upload/Rbanner/".$newname1);

                        $_SESSION['status'] = " Your Data Added Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location:../recommand.php");
                    }
                    else
                    {
                        $_SESSION['status'] = " Data Not Added Successfully";
                        $_SESSION['status_code'] = "error";
                        header("Location:../recommand.php");
                    }
?>
