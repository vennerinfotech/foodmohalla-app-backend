<?php 
include("connection.php");
include("../session.php");

$id = $_REQUEST['id'];


$sql = "select * from offers where id = '$id'";
$result = mysqli_query($conn,$sql);
$raw = mysqli_fetch_array($result);
$status = $raw['is_active'];
if($status == '1')
{
    $sql = "UPDATE offers set is_active = '0' where id = '$id' ";
    $result = mysqli_query($conn,$sql);
    header("location:../viewoffer.php");

}else{
    $sql = "UPDATE offers set is_active = '1' where id = '$id' ";
    $result = mysqli_query($conn,$sql);
    header("location:../viewoffer.php"); 
}
?> 
