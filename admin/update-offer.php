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
	$sql = "select * from offers where id = '$id'";
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
									<li class="breadcrumb-item active" aria-current="page">Offer</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<h4 class="text-blue h4">Update Offer</h4>
						<p class="mb-30"></p>
					</div>
					<div class="wizard-content">
						<form action="process/updateoffer.php" method="POST" enctype="multipart/form-data">	
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label >Name :</label>
											<input type="text" id="bname" name="bname" placeholder="Enter Offer Name" class="form-control" value="<?php echo $row["name"]; ?>" required>
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label >Description :</label>
											<input type="text" class="form-control"  id="bdetail" name="bdetail" placeholder="Enter Offer Description" value="<?php echo $row["description"]; ?>" required>
										</div>
									</div>   
								</div>
								<div class="row">
                                <div class="col-md-6">
										<div class="form-group">
											<label >Coupon Code :</label>
											<input type="text" class="form-control"  id="ccode" name="ccode" placeholder="Enter Offer Coupon Code" value="<?php echo $row["coupon_code"]; ?>" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Expire Date :</label>
											<input type="date" class="form-control" id="edate" name="edate" placeholder="Select Coupne Expire Date" value="<?php echo $row["expaire_at"]; ?>" required>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label>Valid For Item :</label>
											<input type="text" class="form-control" id="vitem" name="vitem" placeholder="Enter Valid for Item" value="<?php echo $row["valid_for_item"]; ?>" required>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label>Descount Amount :</label>
											<input type="number" class="form-control" id="damout" name="damout" placeholder="Enter Decount Amount" value="<?php echo $row["discount_amount"]; ?>" required>
										</div>
									</div>
                                    <div class="col-md-6">
										<div class="form-group">
											<label>Descount Type :</label>
											<select class="custom-select2 form-control" name="dtype" id="dtype" style="width: 100%; height: 38px;" value="<?php echo $row["discount_type"]; ?>" required>
												<optgroup label="Select  Discount Type">
													<option value="Fix">Fix</option>
													<option value="Percentage">Percentage</option>
												</optgroup>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Minimum Cart Price :</label> 
											<input type="number" class="form-control" id="mincart" name="mincart" placeholder="Enter Minimum Cart Price" value="<?php echo $row["min_cart_price"]; ?>" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Maximum Discount Amount :</label>
											<input type="number" class="form-control" id="maxdisc" name="maxdisc" placeholder="Enter Maximum Discount Amount" value="<?php echo $row["max_discount_amount"]; ?>" required>
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