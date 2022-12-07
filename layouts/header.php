<?php
require_once 'library/init.php';
$sql_get_theloai = "SELECT * FROM theloai";
$sql_get_brand = "SELECT * FROM brand";
$theloai = $db->fetch_assoc($sql_get_theloai);
$brand = $db->fetch_assoc($sql_get_brand);
?>
<!DOCTYPE HTML>
<html>

<head>
	<title><?php echo $title ?></title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="https://kit.fontawesome.com/196c7f2541.js" crossorigin="anonymous"></script>
	<script src="js/app_admin.js"></script>
</head>

<body>
	<!--header strat here-->
	<div class="header">
		<div class="container">
			<div class="header-main" id="stick">
				<div class="top-nav">
					<div class="content white">
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="navbar-brand logo">
									<a href="index.php">
										<img src="images/stockxlogo.png" alt="" width="50px">
									</a>
								</div>
							</div>
							<!--/.navbar-header-->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li>
										<a href="index.php">Home</a>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link" href="#" data-toggle="dropdown">
											Brand<span class="caret"></span>
										</a>

										<ul class="dropdown-menu">

											<?php
											foreach ($brand as $b) {
												echo "<li><a href='group.php?Id=" . $b["Id"] . "'> " . $b["TenHang"] . "</a></li>";
											}
											?>
										</ul>
									</li>
									<?php
									$sql_get_list = "SELECT * FROM theloai";
									if ($db->num_rows($sql_get_list)) {
										foreach ($db->fetch_assoc($sql_get_list) as $key => $theloai) {
											echo
											'
												<li><a href="theloai.php?Id=' . $theloai['Id'] . '">' . $theloai['Ten'] . '</a></li>
												';
										}
									}
									?>

								</ul>
							</div>
							<!--/.navbar-collapse-->
						</nav>
						<!--/.navbar-->
					</div>
				</div>
				<div class="header-right">
					<div class="search">
						<div class="search-text">
							<form action="timsanpham.php" method="POST">
								<input class="serch" id="noidung" name="noidung" type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" />
							</form>

						</div>
					</div>
					<ul class="nav navbar-nav">
						<li>
							<a href="list-booking.php"><i class="fa-sharp fa-solid fa-cart-arrow-down"></i> Cart</a>
						</li>
						<li><?php
							if (isset($_SESSION['id_kh']))
								echo '<a href="./admin/logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>';
							else
								echo '<a href="./admin/login.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>';
							?>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!--header end here-->