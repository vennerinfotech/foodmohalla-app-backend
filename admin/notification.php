<?php 
include("session.php"); 
include("process/connection.php");


$sql = "SELECT * FROM `order` WHERE status = '0'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
		

echo $result->num_rows;
/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Notification: " . $row["description"];
    }
} else {
    echo "0 results";
}
*/
$conn->close();
?>
