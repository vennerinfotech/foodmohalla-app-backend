
<?php require_once ('connection.php'); 
require_once ('../session.php');


$id= $_POST['id'];
$bname = $_POST['bname'];
$cname = $_POST['cname'];
$pname = $_POST['iname'];
$price = $_POST['pprice'];
$description = $_POST['textdesc'];



                if(!empty($_FILES["bimage"]["tmp_name"]))
                {
                    $name=$_FILES["bimage"]["name"];
                    $ext=pathinfo($name,PATHINFO_EXTENSION);
                    $newname="CERT".date('Ymdhis').".".$ext;
                } else {
                    $newname=$_POST["oldimg"];
                }
                date_default_timezone_set('Asia/Kolkata');
                $date=date('Y-m-d h:i:s A',time());

                $result = mysqli_query($conn,"update products set shop_id='$bname',category_id='$cname',name='$pname',description='$description',price='$price',image_url='$newname',updated_at='$date' where id='$id'") or die(mysqli_error($conn));
                
                if($result== true)
                {
                    move_uploaded_file($_FILES["bimage"]["tmp_name"], "../Upload/Product/".$newname);

                    $_SESSION['status'] = "Your Data Updated Successfully";
                    $_SESSION['status_code'] = "success";
                    header("Location:../viewproduct.php");
                    
                }
                else
                {
                        $_SESSION['status'] = "Your Data Not Updated!";
                        $_SESSION['status_code'] = "error";
                    header("Location:../viewproduct.php");
                }
?> 