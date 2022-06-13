<?php
include "connection.php";
require_once ('../session.php');

  

// $id= $_POST['id'];
// $scname = $_POST['txtpur'];


// $result = mysqli_query($conn,"update order set order_status='$scname' where id='$id'") or die(mysqli_error($conn));
              
// if($result)
// {
//     $_SESSION['status'] = "Your Data Updated Successfully";
//     $_SESSION['status_code'] = "success";
//     header("Location:../vieworder.php");
    
// }
// else
// {
//         $_SESSION['status'] = "Your Data Not Updated!";
//         $_SESSION['status_code'] = "error";
//     header("Location:../vieworder.php");
// }

if(isset($_POST['status']) && isset($_POST['id']))
{
    // date_default_timezone_set('Asia/Kolkata');
    //   $leaddate = date( 'Y-m-d H:i:s');
  $status = $_POST['status'];
  
    // echo $status;
  $id = $_POST['id'];
//   echo $status."-".$id;exit();
//   $fname = $_POST['filename'];
  $res=mysqli_query($conn,"UPDATE `order` SET order_status = '$status' where id='".$id."'");
  if($res){
    
   

    echo "Order Status Updated Successfully !";
  }
  else{
    echo "Order Status Not Updated Successfully !"; 
  }
}
?>