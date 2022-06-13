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
									<li class="breadcrumb-item active" aria-current="page">View Category</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">View Category</h4>
					</div>
					<div class="pb-20">
                        <div class="table-responsive">
                        <!-- <table class="table table-striped table-sm text-center hover nowrap"> -->
						<table  class="data-table table stripe hover nowrap">
							<thead>
								<tr>
                                    <th>#</th>
									<th class="table-plus datatable-nosort">Shop Name</th>
									<th>Category Name</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                <?php
                                    $count=1;
									$result=mysqli_query($conn,"SELECT shops.shop_name, categories.name,categories.created_at,categories.updated_at,categories.id from shops inner join categories on shops.id=categories.shop_id") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                ?>
								<tr>
                                    <td><?php echo $count;$count++; ?></td>
									<td class="table-plus"><?php echo $row["shop_name"]; ?></td>
									<td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["created_at"]; ?></td>
                                    <td><?php echo $row["updated_at"]; ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="update-category.php?id=<?php echo $row["id"]; ?>"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="process/deletecategory.php?id=<?php echo $row["id"]; ?>"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
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