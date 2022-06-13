<?php 
include("session.php"); 
include("process/connection.php");
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
	<link rel="stylesheet" type="text/css" href="src/plugins/jquery-steps/jquery.steps.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
<body>


        <!-- [ Header ] start -->
			<?php include("header.php") ?>
		<!-- [ Header ] end -->

		<!-- [ SIDE BAR ] start -->
			<?php include("sidebar.php") ?>
		<!-- [ SIDE BAR ] end -->

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Shop</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-blue h4">Add Shop</h4>
						<p class="mb-30"></p>
					</div>
					<div class="wizard-content">
						<form action="process/addshop.php" method="POST" enctype="multipart/form-data">	
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Shop Name :</label>
											<input type="text" id="sname" name="sname" placeholder="Enter Your Shop Name" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Shop Address :</label>
                                            <textarea class="form-control" type="text" class="form-control"  id="txtlandmark" name="txtlandmark" placeholder="Enter Your Shop Address" style="height: 60px; width: 553px;" required></textarea>
										</div>
									</div>
								</div>

                                    <div class="col-md-12">
                                        <div id="divmap" style="height: 300px;" required></div>
                                    </div> 

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>City :</label> 
											<input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Contact Number :</label>
											<input type="number" class="form-control" id="cnumber" name="cnumber" placeholder="Enter Contact Number" required>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label>Latitude :</label>
											<input type="text" class="form-control" id="txtlatitude" name="txtlatitude" placeholder="..." required>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label>Longitude :</label>
											<input type="text" class="form-control" id="txtlongitude" name="txtlongitude" placeholder="Enter Contact Number" required>
										</div>
									</div>
                                    <div class="col-md-12 col-sm-12 text-right">
							                <button type="submit" class="btn btn-primary btn-sm scroll-click" data-toggle="collapse" name="submit" id="submit" value="button">Submit</button>
						            </div>
								</div>
							</section>
						</form>
					</div>
				</div>			

			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Food Mohalla 
			</div>
		</div>
	</div>
	<!-- js -->
    <?php include("process/script.php") ?>
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyClJ7bohWjfhtUsd71UVKXfsu48-Wq5O5s"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-locationpicker/0.1.12/locationpicker.jquery.min.js"></script>

    <script>
    $('#divmap').locationpicker({
        location: {latitude: 21.1702, longitude: 72.8311},
        radius: 0,
        inputBinding: {
            latitudeInput: $('#txtlatitude'),
            longitudeInput: $('#txtlongitude'),
            locationNameInput: $('#txtlandmark')
        },
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        enableAutocomplete: true,
        });

    </script>

    <?php if(isset($_SESSION['status']) && $_SESSION['status'] != ''){?>
    <script>
        swal({
          /*title: "Good job!",*/
          text: "<?php echo $_SESSION['status'];?>",
          icon: "<?php echo $_SESSION['status_code'];?>",
          button: "Ok",
        });
    </script>
    <?php
    unset($_SESSION['status'],$_SESSION['status_code']);
}?>
</body>
</html>