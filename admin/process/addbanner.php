<?php require_once ('../process/connection.php');
require_once ('../session.php'); 


                    $name=$_FILES["bimage"]["name"];
                    $ext=pathinfo($name,PATHINFO_EXTENSION);
                    $newname="CERT".date('Ymdhis').".".$ext;

                    date_default_timezone_set('Asia/Kolkata');
                    $date=date('Y-m-d h:i:s A',time());

                    //echo $date; exit();                  
                    $result = mysqli_query($conn,"insert into banners (banner_name,banner_detail,image_url,created_at) values
                    ('".$_POST["bname"]."','".$_POST['bdetail']."','".$newname."','".$date."')") or die(mysqli_error($conn));
                            
                    if($result==true)
                    {
                            move_uploaded_file($_FILES["bimage"]["tmp_name"], "../Upload/Banner/".$newname);

                        $_SESSION['status'] = " Your Data Added Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location:../banner.php");
                    }
                    else
                    {
                        $_SESSION['status'] = " Data Not Added Successfully";
                        $_SESSION['status_code'] = "error";
                        header("Location:../banner.php");
                    }
?>