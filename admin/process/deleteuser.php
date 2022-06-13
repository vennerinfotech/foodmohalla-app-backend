<?php
//including the database connection file
include("connection.php");
include("../session.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");

if($result==true){
	$_SESSION['status'] = "Deleted Successfully"; 
    $_SESSION['status_code'] = "success";
	header("Location:../viewuser.php");
}
else
{ 
	$_SESSION['status'] = "Not Deleted Successfully";
    $_SESSION['status_code'] = "error";
	header("Location:../viewuser.php");
}

//redirecting to the display page (index.php in our case)
?>