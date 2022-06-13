<?php 
	include('process/connection.php');
	include('session.php');
	$username = $_SESSION['a_email'];
	$sql = "select * from `admin` where a_email = '$username'";

	$query = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($query);
	$name = $row['role'];	
	
?>
<div class="left-side-bar">
		<div class="brand-logo">
			<a href="dashboard.php">
				<img src="vendors/images/adminlogo.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<!-- <label  style="display: inline-block; width: 90px; text-align: right; color:white; font-size:25px;">ADMIN</label> -->
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
				<?php if($row['role'] == 'Admin'){ ?>
					
					<li>
						<a href="dashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Banner</span>
						</a>
						<ul class="submenu">
							<li><a href="banner.php">Add Banner</a></li>
							
							<li><a href="viewbanner.php">View Banner</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Best Offer</span>
						</a>
						<ul class="submenu">
							<li><a href="bestoffer.php">Add Best-Offer</a></li>
							<li><a href="viewbestoffer.php">View Best-Offer</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-shop"></span><span class="mtext">Shop</span>
						</a>
						<ul class="submenu">
							<li><a href="shop.php">Add Shop</a></li>
							<li><a href="viewshop.php">View Shop</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Category</span>
						</a>
						<ul class="submenu">
							<li><a href="category.php">Add Categorie</a></li>
							<li><a href="viewcategory.php">View Categorie</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Product</span>
						</a>
						<ul class="submenu">
							<li><a href="product.php">Add Product</a></li>
							<li><a href="viewproduct.php">View Product</a></li>

						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">Delivery Boy</span>
						</a>	
						<ul class="submenu">	
							<li><a href="deliveryboy.php">Add Delivery Boy</a></li>
							<li><a href="viewdeliveryboy.php">View Delivery Boy</a></li>
						</ul>
					</li>
					<li>
						<a href="viewuser.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">View User</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Recommanded</span>
						</a>
						<ul class="submenu">
							<li><a href="recommand.php">Add Recommanded</a></li>
							<li><a href="viewrecommanded.php">View Recommanded</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Grab Best Deal</span>
						</a>
						<ul class="submenu">
							<li><a href="bestdeal.php">Add Grab Best-Deal</a></li>
							<li><a href="viewbestdeal.php">View Grab Best-Deal</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Offer</span>
						</a>
						<ul class="submenu">
							<li><a href="offer.php">Add Offer</a></li>
							<li><a href="viewoffer.php">View Offer</a></li>
						</ul>
					</li>
					
					<li>
						<a href="vieworder.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">View Order</span>
						</a>
					</li>
					<?php }else{ ?>
					<li>
						<a href="shopdashboard.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Banner</span>
						</a>
						<ul class="submenu">
							<li><a href="banner.php">Add Banner</a></li>
							<li><a href="viewbanner.php">View Banner</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Best Offer</span>
						</a>
						<ul class="submenu">
							<li><a href="bestoffer.php">Add Best-Offer</a></li>
							<li><a href="viewbestoffer.php">View Best-Offer</a></li>
						</ul>
					</li>
					<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-shop"></span><span class="mtext">Shop</span>
						</a>
						<ul class="submenu">
							<li><a href="Shop.php">Add Shop</a></li>
							<li><a href="viewshop.php">View Shop</a></li>
						</ul>
					</li> -->
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Category</span>
						</a>
						<ul class="submenu">
							<li><a href="category.php">Add Categorie</a></li>
							<li><a href="viewcategory.php">View Categorie</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Product</span>
						</a>
						<ul class="submenu">
							<li><a href="product.php">Add Product</a></li>
							<li><a href="viewproduct.php">View Product</a></li>

						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-user"></span><span class="mtext">Delivery Boy</span>
						</a>	
						<ul class="submenu">	
							<li><a href="deliveryboy.php">Add Delivery Boy</a></li>
							<li><a href="viewdeliveryboy.php">View Delivery Boy</a></li>
						</ul>
					</li>
					<!-- <li>
						<a href="viewuser.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">View User</span>
						</a>
					</li> -->
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Recommanded</span>
						</a>
						<ul class="submenu">
							<li><a href="recommand.php">Add Recommanded</a></li>
							<li><a href="viewrecommanded.php">View Recommanded</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Grab Best Deal</span>
						</a>
						<ul class="submenu">
							<li><a href="bestdeal.php">Add Grab Best-Deal</a></li>
							<li><a href="viewbestdeal.php">View Grab Best-Deal</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Offer</span>
						</a>
						<ul class="submenu">
							<li><a href="offer.php">Add Offer</a></li>
							<li><a href="viewoffer.php">View Offer</a></li>
						</ul>
					</li>	
					<li>
						<a href="vieworder.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">View Order</span>
							
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	