<?php
//including the database connection file
include("connection.php");
include("../session.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM delivery_boy WHERE id = '$id'");

if($result==true){
	$_SESSION['status'] = "Deleted Successfully"; 
    $_SESSION['status_code'] = "success";
	header("Location:../viewdeliveryboy.php");
}
else
{ 
	$_SESSION['status'] = "Not Deleted Successfully";
    $_SESSION['status_code'] = "error";
	header("Location:../viewdeliveryboy.php");
}

//redirecting to the display page (index.php in our case)
?>