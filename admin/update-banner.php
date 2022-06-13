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
<?php
	$id = $_REQUEST['id'];
	$sql = "select * from banners where id = '$id'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
?>
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Banner</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-blue h4">Update Banner Details</h4>
						<p class="mb-30"></p>
					</div>
					<div class="wizard-content">
						<form method="POST" enctype="multipart/form-data" action="process/updatebanner.php">
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Banner Name :</label>
											<input type="text" id="bname" name="bname" placeholder="Enter Your Banner Name" class="form-control" value="<?php echo $row["banner_name"]; ?>" required >
											<input type="hidden" name="id" value="<?php echo $id; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Banner Details :</label>
											<input type="text" class="form-control"  id="bdetail" name="bdetail" placeholder="Enter Your Banner Details" value="<?php echo $row["banner_detail"]; ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Banner Image :</label>
											<input type="file" class="form-control" id="bimage" name="bimage" placeholder="Enter Banner Image" required>

											<input type="hidden" name="oldimg" value="<?php echo $row["image_url"]; ?>">
											<img src="Upload/Banner/<?php echo $row["image_url"]; ?>" style="height: 80px; width: 80px;" />
										</div>
									</div>
                                    <div class="col-md-12 col-sm-12 text-right">
							                <button type="submit" class="btn btn-primary btn-sm scroll-click" data-toggle="collapse" name="update" id="update" value="update">Update</button>
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
    

</body>
</html>