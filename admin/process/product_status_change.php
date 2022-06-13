<?php 
include("connection.php");
include("../session.php");

$id = $_REQUEST['id'];


$sql = "select * from products where id = '$id'";
$result = mysqli_query($conn,$sql);
$raw = mysqli_fetch_array($result);
$status = $raw['is_recommended'];
if($status == '1')
{
    $sql = "UPDATE products set is_recommended = '0' where id = '$id' ";
    $result = mysqli_query($conn,$sql);
    header("location:../viewproduct.php");

}else{
    $sql = "UPDATE products set is_recommended = '1' where id = '$id' ";
    $result = mysqli_query($conn,$sql);
    header("location:../viewproduct.php"); 
}
?>