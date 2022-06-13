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
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	
	<script src="js/jquery.js"></script> 
	<script src="media/js/jquery.dataTables.min.js"></script> 
	<link href="media/css/jquery.dataTables.min.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
	$("#myTable").dataTable();
	});

	</script>
	

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
</head>
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
									<li class="breadcrumb-item active" aria-current="page">View User Details</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">View User</h4>
					</div>
					<div class="pb-20">
                        <div class="table-responsive">
                        <!-- <table class="table table-striped table-sm text-center hover nowrap"> -->
						<table  id="myTable" class="table table-responsive hover">
							<thead>
								<tr>
                                    <th>#</th>	
									<th class="table-plus datatable-nosort">First Name</th>
									<th>Last Name</th>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>Phone No</th>
                                    <th>Email</th>
									<th>Phone No Verified At</th>
                                    <th>Device Type</th>
                                    <th>Created At</th>
									<th>Updated At</th>
									<th>View User Address</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                <?php
                                    $count=1;
									$result=mysqli_query($conn,"select * from users") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_assoc($result))
                                    { 
                                ?>
								<tr>
                                    <td><?php echo $count;$count++; ?></td>						
									<td class="table-plus"><?php echo $row["first_name"]; ?></td>
									<td><?php echo $row["last_name"]; ?></td>
                                    <td>
                                    <a href="Upload/User/<?php echo $row['image_url']; ?>" target='blank'><img src="Upload/User/<?php echo $row["image_url"]; ?>" style="height: 50px; width: 50px;" /></a>
                                    </td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["phone_number"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["phone_verified_at"]; ?></td>
                                    <td><?php echo $row["device_type"]; ?></td>
                                    <td><?php echo $row["created_at"]; ?></td>
                                    <td><?php echo $row["updated_at"]; ?></td>
									<td>	
										<a class="badge badge-success btn-sm" data-toggle="modal" data-target="#user<?php echo $row["id"]; ?>"  href="#user?id=<?php echo $row['id']; ?>" role="button">
										User Address
										</a>
									</td>
									<td>
									  <a class="badge badge-danger btn-sm"  href="process/deleteuser.php?id=<?php echo $row["id"]; ?>">Delete</a>
									</td>
								</tr>
							<!-- User Address Box -->
											<div class="modal fade" id="user<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
											<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">User Address</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">								
												<?php 
														$sqldetails = "SELECT users.first_name,users.last_name, user_address.address,user_address.user_id, user_address.zipcode, user_address.landmark, user_address.city, user_address.state, user_address.country,user_address.type,user_address.created_at,user_address.updated_at
														from user_address inner join users on users.id=user_address.user_id  where user_address.user_id = '".$row['id']."' ";
														$resultdetails = mysqli_query($conn,$sqldetails);
														$rowdetails = mysqli_fetch_assoc($resultdetails);	
												?>
											<form>
											<div class="modal-body">
													<div class="row">
														<div class="col-md-4">
															<h6>User Name</h6>
															<p><?php echo $rowdetails["first_name"]; ?> <?php echo $rowdetails["last_name"]; ?></p>
															<hr>
														</div>
														<div class="col-md-8 ml-auto">
															<h6>Address</h6>
															<p><?php echo $rowdetails["address"]; ?></p>
															<hr>
														</div>
														<div class="col-md-4">
															<h6>Zipcode</h6>
															<p><?php echo $rowdetails["zipcode"]; ?></p>
															<hr>
														</div>
														<div class="col-md-4 ml-auto">
															<h6>Landmark</h6>
															<p><?php echo $rowdetails["landmark"]; ?></p>
															<hr>
														</div>
														<div class="col-md-4">
															<h6>City</h6>
															<p><?php echo $rowdetails["city"]; ?></p>
															<hr>
														</div>
														<div class="col-md-4 ml-auto">
															<h6>State</h6>
															<p><?php echo $rowdetails["state"]; ?></p>
															<hr>
														</div>
														<div class="col-md-4">
															<h6>Country</h6>
															<p><?php echo $rowdetails["country"]; ?></p>
															<hr>
														</div>
														<div class="col-md-4">
															<h6>Type</h6>
															<p><?php echo $rowdetails["type"]; ?></p>
															<hr>
														</div>
														<div class="col-md-4">
															<h6>Created At</h6>
															<p><?php echo $rowdetails["created_at"]; ?></p>
															<hr>
														</div>
														<div class="col-md-4">
															<h6>Updated At</h6>
															<p><?php echo $rowdetails["updated_at"]; ?></p>
															<hr>
														</div>
													</div>
												</div>	
											</form>		
										</div>
										<div class="modal-footer">
										<button type="button" class="btn btn-sm btn-danger"  data-dismiss="modal">Close</button>
										</div>
									</div>
									</div>
								</div>
							<!-- User Address Box -->
							<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>
        <!-- Simple Datatable End -->
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