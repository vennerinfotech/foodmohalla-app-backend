<?php 
include("connection.php");
include("../session.php");

$id = $_REQUEST['id'];


$sql = "select * from delivery_boy where id = '$id'";
$result = mysqli_query($conn,$sql);
$raw = mysqli_fetch_array($result);
$status = $raw['is_avalible'];
if($status == '1')
{
    $sql = "UPDATE delivery_boy set is_avalible = '0' where id = '$id' ";
    $result = mysqli_query($conn,$sql);
    header("location:../viewdeliveryboy.php");

}else{
    $sql = "UPDATE delivery_boy set is_avalible = '1' where id = '$id' ";
    $result = mysqli_query($conn,$sql);
    header("location:../viewdeliveryboy.php"); 
}
?>