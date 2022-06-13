<?php 
include("session.php"); 
include("process/connection.php");

	if(isset($_GET['id']))
	{
		$main_id = $_GET['id'];
		$sql_update = mysqli_query($conn,"UPDATE `order` SET status=1 WHERE id='$main_id'");
	}	
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

		
	    <script src="js/jquery.js"></script> 
        <script src="media/js/jquery.dataTables.min.js"></script> 
		<link href="media/css/jquery.dataTables.min.css" rel="stylesheet">
		<script>
			$(document).ready(function(){
			$("#myTable").dataTable();
			});
		</script>

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
									<li class="breadcrumb-item active" aria-current="page">View Order Details</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			<!-- Simple Datatable start -->
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">View Order</h4>
					</div>
					<div class="pb-20">
                        <div>
                        <!-- <table class="table table-striped table-sm text-center hover nowrap"> -->
						<table id="myTable" class="table table-responsive  hover nowrap">
							<thead>
								<tr>
                                    <th>#</th>
									<th>Order Number</th>
									<th>User Name</th>
									<th>Shop Name</th>
									<th>Delievry Boy Name</th>
                                    <th>User Address</th>
                                    <th>Payment Method</th>
                                    <th>Payemnt Gateway</th>
                                    <th>Payment Transaction</th>
                                    <th>Order Type</th>
                                    <th>Total Order</th>
                                    <th>Ongoing Offer</th>
                                    <th>Order Status</th>
                                    <th>Delivery Distance</th>
                                    <th>Delivery Charge</th>
                                    <th>GST Charges</th>
                                    <th>Discount Amount</th>
                                    <th>Promo Code</th>
                                    <th>Item Total</th>
									<th>Created At</th>
									<th>Updated At</th>
                                    <th>Deleted At</th>	
								</tr>
							</thead>
							<tbody>
                            	<?php
                                    $count=1;		
									$result=mysqli_query($conn,"SELECT  shops.shop_name, users.first_name,users.last_name, delivery_boy.name, user_address.address,order.item_total,order.promo_code,order.discount_amount,order.gst_charges,order.delivery_charges,order.delivery_distance,order.order_status,order.is_ongoing_order, order.order_number,order.payment_method,order.payment_gateway,order.payment_transaction_id,order.order_type,order.order_total, order.created_at,order.updated_at,order.deleted_at,order.id 
									from `order` inner join shops on shops.id=order.shop_id inner join users on users.id=order.user_id inner join delivery_boy on delivery_boy.id=order.delivery_boy_id inner join user_address on user_address.id=order.user_address_id where status='1'") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                ?>
								<tr>
                                    <td><?php echo $count;$count++; ?></td>
									<td>
										<a class="" data-toggle="modal" data-target="#orderitem<?php echo $row["order_number"]; ?>"  href="#orderitem?id = <?php echo $row["order_number"]; ?>" role="button">
											<?php echo $row["order_number"]; ?>
										</a> 
									</td>	
									<td><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></td>
									<td><?php echo $row["shop_name"]; ?></td>
									<td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["address"]; ?></td>
                                    <td><?php echo $row["payment_method"]; ?></td>
                                    <td><?php echo $row["payment_gateway"]; ?></td>
                                    <td><?php echo $row["payment_transaction_id"]; ?></td>
                                    <td><?php echo $row["order_type"]; ?></td>
                                    <td><?php echo $row["order_total"]; ?></td>
                                    <td><?php echo $row["is_ongoing_order"]; ?></td>
                                    <td>
									<select class="form-control" id="leadstatus" name="leadstatus" onchange="fetch_select(this.value);">
										<?php  
											$Values = array("preparing", "placed", "confirm", "delivered"); 

											foreach ($Values as $value) {
												if($value == $row["order_status"]){
												$val = $value."=".$row["id"];
												echo "<option value='".$val."' selected >".$value."</option>";
												}
												else
												{
												$val = $value."=".$row["id"];
												echo "<option value='".$val."'>".$value."</option>";
												}
											}
										?>
									</select>	
                                          
									</td>
                                    <td><?php echo $row["delivery_distance"]; ?></td>
                                    <td><?php echo $row["delivery_charges"]; ?></td>
                                    <td><?php echo $row["gst_charges"]; ?></td>
                                    <td><?php echo $row["discount_amount"]; ?></td>
                                    <td><?php echo $row["promo_code"]; ?></td>
                                    <td><?php echo $row["item_total"]; ?></td>
                                    <td><?php echo $row["created_at"]; ?></td>
                                    <td><?php echo $row["updated_at"]; ?></td>  
                                    <td><?php echo $row["deleted_at"]; ?></td>
							    </tr>
									<!-- Order Item -->
										<div class="modal fade" id="orderitem<?php echo $row["order_number"]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Order Item</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												</div>
												<div class="modal-body">	 							
													<?php 
															$sqldetails = "SELECT products.name, order.order_number, shops.shop_name, users.first_name, users.last_name,grab_best_deal.deal_name, order_item.item_price,order_item.quantity,order_item.created_at,order_item.updated_at,order_item.id
															from order_item inner join shops on shops.id= order_item.shop_id inner join products on products.id = order_item.product_id inner join `order` on order.id=order_item.order_id inner join users on users.id = order_item.user_id inner join grab_best_deal on grab_best_deal.id=order_item.grab_best_deal_id where order_item.order_id = '".$row['id']."' ";
															$resultdetails = mysqli_query($conn,$sqldetails);
															$rowdetails = mysqli_fetch_assoc($resultdetails);
															?>
													<form>	
													<div class="modal-body">
															<div class="row">
																<div class="col-md-4">
																	<h6>Order Number</h6>
																	<p><?php echo $rowdetails["order_number"]; ?></p>
																	<hr>
																</div>
																<div class="col-md-4 ml-auto">
																	<h6>User Name</h6>
																	<p><?php echo $rowdetails["first_name"]; ?> <?php echo $rowdetails["last_name"]; ?></p>
																	<hr>
																</div>
																<div class="col-md-4">
																	<h6>Shop Name</h6>
																	<p><?php echo $rowdetails["shop_name"]; ?></p>
																	<hr>
																</div>
																<div class="col-md-4 ml-auto">
																	<h6>Product Name</h6>
																	<p><?php echo $rowdetails["name"]; ?>	
																		<ul>	
																			<?php
																				$sql1 = "SELECT product_customize_option.option_name,product_customize_option.customize_charges, order_item_cutomize.id from `order_item_cutomize` inner join  product_customize_option on product_customize_option.id = order_item_cutomize.product_customize_id";	
																				$result1 = mysqli_query($conn,$sql1);
																			?>												
																			<?php while($row1 = mysqli_fetch_array($result1))
																				{														
																			?>
																			<p> + <?php echo $row1["option_name"]  ."=".   $row1["customize_charges"]; ?></p>
																			<?php } ?>
																			<?php
																			$sql11 = "SELECT SUM(product_customize_option.customize_charges) as total from `order_item_cutomize` inner join  product_customize_option on product_customize_option.id = order_item_cutomize.product_customize_id";	
																					$result1 = mysqli_query($conn,$sql11);
																					while($row2 = mysqli_fetch_array($result1))
																					{
																					?>
																			<p>Total = <?php echo $row2["total"]; ?></p>
																			<?php $tot =  $row2["total"]; ?>	
																			<?php } ?>	
																		</ul>			
																	</p>
																	<hr>
																</div>
																<div class="col-md-4">
																	<h6>Grab Best Deal</h6>
																	<p><?php echo $rowdetails["deal_name"]; ?></p>
																	<hr>
																</div>
																<div class="col-md-4 ml-auto">
																	<h6>Created At</h6>
																	<p><?php echo $rowdetails["created_at"]; ?></p>
																	<hr>
																</div>
																<div class="col-md-4">
																	<h6>Item Price</h6>
																	<p><?php echo $rowdetails["item_price"]; ?></p>
																	<hr>
																</div>
																<div class="col-md-4">
																	<h6>Quntity</h6>
																	<p><?php echo $rowdetails["quantity"]; ?></p>
																	<hr>
																</div>
																	<?php
																		$total_price = $rowdetails["quantity"] * $rowdetails["item_price"];
																	?>
																<div class="col-md-4"	>
																	<h6>Total</h6>
																	<p><?php echo $total_price; ?></p>
																	<hr>
																</div>
																<div class="col-md-4"	>
																	<h6>Total Amount</h6>
																	<p><?php echo $total_price + $tot; ?></p>
																	<hr>
																</div>	
															</div>
														</div>	
													</form>
												</div>
												<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-danger"  data-dismiss="modal">Close</button>
												<a class="btn btn-sm btn-success" href="PDF/view-order.php?id=<?php echo $row['id']; ?>">PDF</a> 
												</div>
											</div>
											</div>
										</div>
									<!-- Order Item -->
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

	<script>
		 function fetch_select(val){
            var myArray = val.split("=");
			
            $.ajax({
                type: 'post',
                url: 'process/updorderstatus.php',
                datatype:'json',
                data: {status:myArray[0],id:myArray[1]},
                success: function (response) {
                    alert(response);//This will print you result
                }
            });
        }
	</script>

</body>
</html>