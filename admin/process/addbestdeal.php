<?php require_once ('../process/connection.php');
require_once ('../session.php'); 

        $shopid = $_POST['bname'];
        $dname = $_POST['dname'];
        $txtdesc = $_POST['txtdescription'];
        $pprice = $_POST['pprice'];

        foreach($shopid as $shoplist)
        {

            $name=$_FILES["image"]["name"];
            $ext=pathinfo($name,PATHINFO_EXTENSION);
            $newname="CERT".date('Ymdhis').".".$ext;

            $name=$_FILES["bimage"]["name"];
            $ext=pathinfo($name,PATHINFO_EXTENSION);
            $newname1="CERT".date('Ymdhis').".".$ext;

            date_default_timezone_set('Asia/Kolkata');
            $date=date('Y-m-d h:i:s A',time());


            $query = "INSERT INTO grab_best_deal (shop_id,deal_name,description,price,thumbnail_img_url,banner_img_url,created_at) VALUES ('$shoplist','$dname','$txtdesc','$pprice','$newname','$newname1','$date')";
            $query_run = mysqli_query($conn,$query);
        }
        if($query_run)
        {

            move_uploaded_file($_FILES["image"]["tmp_name"], "../Upload/Bestdeal/".$newname);
                        
            move_uploaded_file($_FILES["bimage"]["tmp_name"], "../Upload/Bestdeal-Banner/".$newname1);

            $_SESSION['status'] = " Your Data Added Successfully";
            $_SESSION['status_code'] = "success";
            header("Location:../bestdeal.php");
            exit(0);
        }
        else
        {
            $_SESSION['status'] = " Data Not Added Successfully";
            $_SESSION['status_code'] = "error";
            header("Location:../bestdeal.php");
            exit(0);
        }

?>