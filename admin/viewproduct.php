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
									<li class="breadcrumb-item active" aria-current="page">View Product Details</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">View Product</h4>
					</div>
					<div class="pb-20">
                        <div class="table-responsive">
                        <!-- <table class="table table-striped table-sm text-center hover nowrap"> -->
						<table  class="data-table table stripe hover">
							<thead>
								<tr>
                                    <th>#</th>
									<th class="table-plus datatable-nosort">Product Name</th>
									<th>Shop Name</th>
									<th>Category Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th>Product Status</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
                                <?php
                                    $count=1;
									$result=mysqli_query($conn,"SELECT products.name, shops.shop_name,categories.name as cname,products.description,products.image_url,products.is_recommended,products.price,products.created_at,products.updated_at,products.id from products inner join shops on shops.id= products.shop_id inner join categories on categories.id = products.category_id") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_assoc($result))
                                    { 
										$active = $row["is_recommended"];
                                ?>
								<tr> 
                                    <td><?php echo $count;$count++; ?></td>
									<td>
										<a type="" class="" href="productcusttype.php?id=<?php echo $row["name"]; ?>">
											<?php echo $row["name"]; ?>
										</a>
									</td>
									<td><?php echo $row["shop_name"]; ?></td>
									<td><?php echo $row["cname"]; ?></td>
                                    
                                    <td><?php echo $row["description"]; ?></td>
                                    <td>
                                    <a href="Upload/Product/<?php echo $row['image_url']; ?>" target='blank'><img src="Upload/Product/<?php echo $row["image_url"]; ?>" style="height: 50px; width: 50px;" /></a>
                                    </td>
                                    <td><?php echo $row["price"]; ?></td>
                                    <td><?php echo $row["created_at"]; ?></td>
                                    <td><?php echo $row["updated_at"]; ?></td>
									<?php if($active == '1'){ ?>
									<td>
										<a class="badge badge-danger btn-sm" href="process/product_status_change.php?id=<?php echo $row['id']; ?>">Not Active</a>
									</td>
									<?php }else{ ?>
									<td>
										<a class="badge badge-success btn-sm" href="process/product_status_change.php?id=<?php echo $row['id']; ?>">Active</a>
									</td>
									<?php } ?>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="update-product.php?id=<?php echo $row["id"]; ?>"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="process/deleteproduct.php?id=<?php echo $row["id"]; ?>"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<!-- Modal -->
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Product</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form>
												<div class="modal-body">
														<div class="row">
															<div class="col-md-6">
																<h6>Size</h6>
																<p>
																<div class="form-group form-check">
																		<input type="radio"name="radioengl" value="Small" id="txtexsmall">
																		<label for="txtexcellent" class="form-radio-label">Small
																		</label>&nbsp;

																		<input type="radio" checked name="radioengl" value="Medium" id="txtmedium">
																		<label for="txtgood" class="form-radio-label">Medium
																		</label>&nbsp;

																		<input type="radio"  name="radioengl" value="Large" id="txtlarge">
																		<label for="txtpoor" class="form-radio-label">Large
																		</label>
                                                       			 </div>
																</p>
																<hr>
															</div>
															<div class="col-md-6 ml-auto">
																<h6>Milk</h6>
																<p>
																
																	<div class="form-group form-check">

																		<input type="checkbox" name="selector[]" class="cd" value="Steamed Milk" id="form-check-input">
																		<label for="txtand" class="form-check-label">Steamed Milk
																		</label>&nbsp;
																		<input type="checkbox" name="selector[]" class="cd" value="hot Milk" id="form-check-input" >
																		<label for="txtgarlic" class="form-check-label">hot Milk
																		</label>&nbsp;
																		<input type="checkbox" name="selector[]" class="cd" value="cold Milk" id="form-check-input">
																		<label for="txtburger" class="form-check-label">cold Milk
																		</label>&nbsp;
											
																	</div>
                                                    			
																</p>
																<hr>
															</div>
															<div class="col-md-6">
																<h6>Veggies</h6>
																<p>
																<div class="form-group form-check">

																	<input type="checkbox" name="selector[]" class="cd" value="Onion" id="form-check-input">
																	<label for="txtand" class="form-check-label">Onion
																	</label>&nbsp;
																	<input type="checkbox" name="selector[]" class="cd" value="tomato" id="form-check-input" >
																	<label for="txtgarlic" class="form-check-label">tomato
																	</label>&nbsp;<br>
																	<input type="checkbox" name="selector[]" class="cd" value="cabbage" id="form-check-input">
																	<label for="txtburger" class="form-check-label">cabbage	
																	</label>

																</div>
																</p>
																<hr>
															</div>
															<div class="col-md-6 ml-auto">
																<h6>Extra</h6>
																<p>
																<div class="form-group form-check">

																	<input type="checkbox" name="selector[]" class="cd" value="cheess" id="form-check-input">
																	<label for="txtand" class="form-check-label">cheess
																	</label>&nbsp;
																	<input type="checkbox" name="selector[]" class="cd" value="souce" id="form-check-input" >
																	<label for="txtgarlic" class="form-check-label">souce
																	</label>&nbsp;
																	<input type="checkbox" name="selector[]" class="cd" value="mayo" id="form-check-input">
																	<label for="txtburger" class="form-check-label">mayo
																	</label>

																</div>
																</p>
																<hr>
															</div>
														</div>
													</div>	
									    </form>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
										</div>
										</div>
									</div>
									</div>
								<!-- Modal -->
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