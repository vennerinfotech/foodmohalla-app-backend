<?php 
include("session.php"); 
include("process/connection.php");

$name=$_SESSION['a_email'] ;

$sql = "select a_name from admin where a_email = '$name'";
$result = mysqli_query($conn,$sql);
$raw = mysqli_fetch_array($result);
$a_name = $raw['a_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta http-equiv="refresh" content="3">	 -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>


    <div class="header">
		<div class="header-left">
		
		</div>

		<?php 
			$sql1 = "SELECT count(*)as count FROM `order` WHERE status = '0'";
			$result = mysqli_query($conn,$sql1);
			$row = mysqli_fetch_array($result);
			$count = $row['count'];		
		?>
	
		<div class="header-right" >
			<div class="user-notification">
				<div class="dropdown"> 		
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active" id="noti_number"><?php echo $count; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" id="responsecontainer">	
						<!-- <div class="notification-list mx-h-350 customscroll">
							<?php 
								$sql_get = mysqli_query($conn, "SELECT  users.first_name,users.last_name,order.order_number,order.id from `order` inner join users on users.id=order.user_id    where status = '0'");
								if(mysqli_num_rows($sql_get)>0)	
								{
									while($result1 = mysqli_fetch_assoc($sql_get)){
											?>
									<ul>	
										<li>
											<a href="#">
												<img src="vendors/images/img.jpg" alt="">
												<span><?php echo $result1['first_name'] ?> <?php echo $result1['last_name'] ?></span><br>
												<span onclick = "window.location.href= 'vieworder.php?id=<?php echo $result1['id'] ?>'">Order Number : <?php echo $result1['order_number'] ?></span>
											</a>
										</li>
									</ul>
								<?php  }?>
							<?php  }else
								echo "Sorry! No Order";
							?>
						</div> -->
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/photo1.jpg" alt="">
						</span>
						<span class="user-name"><?php echo $a_name; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">				
						<a class="dropdown-item" href="logout.php"><i class="dw dw-logout"></i>Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
function loadDoc() {

setInterval(function(){

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
	document.getElementById("noti_number").innerHTML = this.responseText;
}
};
xhttp.open("GET", "notification.php", true);
xhttp.send();

},3000);

}
loadDoc();


$(document).ready(function () {

function load() {
	$.ajax({ //create an ajax request to load_page.php
		type: "GET",
		url: "info.php",
		dataType: "html", //expect html to be returned                
		success: function (response) {
			$("#responsecontainer").html(response);
			setTimeout(load, 3000)
		}
	});
}

load(); //if you don't want the click
$("#display").click(load); //if you want to start the display on click
});
</script>


</body>
</html>
