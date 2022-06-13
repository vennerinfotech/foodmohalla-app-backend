<?php require_once ('../process/connection.php');
require_once ('../session.php'); 

$shopid = $_POST['bname'];
$cname = $_POST['cname'];
$pname = $_POST['iname'];
$description = $_POST['txtdescription'];
$price = $_POST['pprice'];


                    foreach($shopid as $shoplist) 
                    {

                        $name=$_FILES["bimage"]["name"];
                        $ext=pathinfo($name,PATHINFO_EXTENSION);
                        $newname="CERT".date('Ymdhis').".".$ext;

                        date_default_timezone_set('Asia/Kolkata');
                        $date=date('Y-m-d h:i:s A',time());
                        //echo $date; exit();                  
                        $result = mysqli_query($conn,"insert into products (`shop_id`,`category_id`,`name`,`description`,`image_url`,`price`,`created_at`) values
                        ('$shoplist','$cname','$pname','$description','$newname','$price','$date')") or die(mysqli_error($conn));
                    }
                    if($result==true)
                    {
                        move_uploaded_file($_FILES["bimage"]["tmp_name"], "../Upload/Product/".$newname);    

                        $_SESSION['status'] = " Your Data Added Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location:../product.php");
                    }
                    else
                    {
                        $_SESSION['status'] = " Data Not Added Successfully";
                        $_SESSION['status_code'] = "error";
                        header("Location:../product.php");
                    }
?>
