<?php include('process/connection.php');
// error_reporting(0);
// session_start();
// if($_REQUEST["REQUEST_METHOD"]=="POST")
// {

// 	$username = $_POST["emailid"];
// 	$password = $_post["password"];

// 	$sql="select * from admin where a_email = '".$username."' AND  a_password = '".$password."'";
// 	$result = mysqli_query($conn,$sql);
// 	$row = mysqli_fetch_array($result);

// 	if($row["role"]=="Admin"){
		
// 		header("location:dashboard.php");
// 	}
// 	else if($row["role"]=="Shop")
// 	{	
// 		header("location:shopdashboard.php");
// 	}
// }

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Food Mohalla</title> 

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/favicon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="#">
					<img src="vendors/images/adminlogo.png" alt="">
				</a>
			</div>
			<!-- <div class="login-menu">
				<ul>
					<li><a href="register.php">Register</a></li>
				</ul>
			</div> -->
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-6">
					<img src="vendors/images/favicon.png" alt=""  style="height: 450px; width: 450px;">
				</div>
				
				<div class="col-md-6 col-lg-5">
				    <form enctype="multipart/form-data" method="POST">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Login into your Food Mohalla</h2>
							</div>							
								<div class="input-group custom">
									<input type="email" id="emailid" name="emailid" class="form-control form-control-lg" placeholder="Email-Id">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
									</div>
								</div>
								<div class="input-group custom">
									<input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="**********">
									<div class="input-group-append custom">
										<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
									</div>
								</div>
								<span class="text-danger" id="error"></span>
								<div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck1">
											<label class="custom-control-label" for="customCheck1">Remember</label>
										</div>
									</div>
									<!-- <div class="col-6">
										<div class="forgot-password"><a href="forgot-password.php">Forgot Password</a></div>
									</div> -->
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">
												<input class="btn btn-primary btn-lg btn-block" type="submit" id="submit" value="submit">
											<!--<a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> -->
										</div>
										<!-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
										<div class="input-group mb-0">
											<a class="btn btn-outline-primary btn-lg btn-block" href="register.php">Register To Create Account</a>
										</div> -->
									</div>
								</div>	
						    </div>
						</form>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>              
   

	<script>
    $(document).ready(function(){
        $("#submit").click(function(){
			
            var email= document.getElementById("emailid").value;
                var password= document.getElementById("password").value;
				
				if(email=="" && password == ""){
					alert("Email-Id and Password Required !!");
				}
				else
				{			
					$.ajax({
						url:'login.php',
						method:'POST',
						data:{
							a_email:email,
							a_password:password
						},
					success:function(data){
						var msg = data;
						
						if(msg == 'admin')
						{
							window.location.href='dashboard.php';
						}else{
							

							if(msg == 'Email-Id or Password invalid'){

								alert(data);	
							}
							else
							{
								window.location.href='shopdashboard.php';
							}
						}
						
					}
					});
					
				}
 });
});

</script>

</body>
</html>