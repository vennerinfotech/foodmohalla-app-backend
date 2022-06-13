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
									<li class="breadcrumb-item active" aria-current="page">Recommand</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-blue h4">Add Recommand</h4>
						<p class="mb-30"></p>
					</div>
					<div class="wizard-content">
						<form action="process/addrecommanded.php" method="POST" enctype="multipart/form-data">	
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Shop Name :</label>
											<select class="custom-select2 form-control" multiple="multiple"  name="bname[]" id="bname" style="width: 100%; height: 38px;"required>
												<optgroup label="Select Shop">

												<?php
                                                    $res=mysqli_query($conn,"select * from shops");
                                                    while($row=mysqli_fetch_assoc($res))    
                                                    { ?>
													<option value="<?php echo $row["id"]; ?>"><?php echo $row["shop_name"]; ?></option>
													<?php } ?> 
												</optgroup>
											</select>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label >Product Name :</label>
											<select class="custom-select2 form-control" name="pname" id="pname" style="width: 100%; height: 38px;" required>
												<optgroup label="Select Product">

												<?php
                                                    $res=mysqli_query($conn,"select * from products");
                                                    while($row=mysqli_fetch_assoc($res))    
                                                    { ?>
													<option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
													<?php } ?> 
												</optgroup>
											</select>
										</div>
									</div>
									
								</div>
								<div class="row">
                                    <div class="col-md-6">
										<div class="form-group">
											<label >Combo Name :</label>
											<input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Combo Name" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Description :</label>
											<textarea class="form-control" type="text" class="form-control"  id="txtdescription" name="txtdescription" placeholder="Enter Your Combo Description" style="height: 60px; width: 553px;" required></textarea>
										</div>
									</div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Combo Image :</label>
                                                <input type="file" class="form-control" id="cimage" name="cimage" placeholder="Enter Combo Image">
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Banner Image :</label>
                                                <input type="file" class="form-control" id="bimage" name="bimage" placeholder="Enter Combo Image">
                                            </div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label>Price :</label>
											<input class="form-control" type="text" class="form-control"  id="pprice" name="pprice" placeholder="Enter Your Product Price" required>
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