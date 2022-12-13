<?php
$title = 'Home';
require_once 'layouts/header.php';
?>
<!--banner strat here-->
<br><br><br><br>
<div class="banner">
	<div class="container">
		<div class="banner-main">
			<div class="col-md-6 banner-left">
				<a href="./"><img src="images/bannerjordan1.png" alt="" class="img-responsive1" width="540px"></a>
			</div>
			<div class="col-md-6 banner-right simpleCart_shelfItem">
				<span class="bann-heart"></span>
				<!-- <h2>Giày chính hãng</h2>	 -->
				<h1>Feel your style</h1>
				<h5 class="item_price">Low cost everyday</h5>
				<ul class="bann-small-img">
					<?php
					$sql_get_list = "SELECT * FROM sanpham";
					if ($db->num_rows($sql_get_list)) {
						foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
							// mục đích chỉ hiện 2 sản phẩm thôi cho đẹp
							if ($key > 1) break;
							echo
							'
							<li><a href="single.php?theloai=' . $sanpham['TheLoaiId'] . '&sanpham=' . $sanpham['Id'] . '"><img style="width: 80px; " src="' . $sanpham['Anh1'] . '" target="_blank"></a></li>
							';
						}
					}
					?>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--banner end here-->
<!--block-layer2 start here-->
<!-- <div class="blc-layer2">
	<div class="container">
		<div class="blc-layer2-main">
			<div class="col-md-6 blc-layer2-left">

			</div>
			<div class="col-md-6 blc-layer2-right">

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> -->
<!--block-layer2 end here-->
<!--block-layer1 start here-->
<div class="blc-layer3">
	<div class="container">
		<div class="blc-layer3-main">
			<div class="col-md-4 blc-layer3-grids1">
				<h6>Story</h6>
				<h3>Denouncing pleasure</h3>
				<p>pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder.</p>
				<h6>Benefits</h6>
				<ul>
					<li>
						<h4>Temporibus autem quibusdam</h4>
						<h5>At vero eos et accusamus et iusto odio</h5>
					</li>
					<li>
						<h4>These cases are perfectly</h4>
						<h5>voluptatum deleniti atque corrupti quos</h5>
					</li>
				</ul>
			</div>
			<div class="col-md-4 blc-layer3-grids2">
				<?php
				$sql_get_list = "SELECT * FROM sanpham";
				if ($db->num_rows($sql_get_list)) {
					foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
						if ($key == 2) {
							echo
							'
									<a href="single.php?theloai=' . $sanpham['TheLoaiId'] . '&sanpham=' . $sanpham['Id'] . '"><img src="' . $sanpham['Anh1'] . '"></a>
									';
							break;
						}
					}
				}
				?>
			</div>
			<div class="col-md-4 blc-layer3-grids-3 simpleCart_shelfItem">
				<div class="box-grid">

					<?php
					$sql_get_list = "SELECT * FROM sanpham";
					if ($db->num_rows($sql_get_list)) {
						foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
							if ($key == 3) {
								echo
								'
										<h3><a href="single.php?theloai=' . $sanpham['TheLoaiId'] . '&sanpham=' . $sanpham['Id'] . '">New Arrival</a></h3>
					   					<h5>Update Everyday</h5>
										<a href="single.php?theloai=' . $sanpham['TheLoaiId'] . '&sanpham=' . $sanpham['Id'] . '"><img style="width: 270px;" src="' . $sanpham['Anh1'] . '"></a>
										<div class="box-grid-price">
											<div class="box-grid-price-left">
												<h4>' . $sanpham['Ten'] . '</h4>
											</div>
											<div class="box-grid-price-rit">
												<h4 class="item_price">' . $sanpham['Gia'] . '$</h4>
											</div>
											<div class="clearfix"> </div>
										</div>
										';
								break;
							}
						}
					}
					?>

				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--block-layer1 end here-->
<!--home-block start here-->
<div class="home-block">
	<div class="container">
		<div class="home-block-main">
			<?php
			$sql_get_list = "SELECT * FROM sanpham";
			if ($db->num_rows($sql_get_list)) {
				foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
					if ($key > 3) {
						if ($key == 8) break;
						echo
						'
							<div class="col-md-3 home-grid">
								<div class="home-product-main">
								<div class="home-product-top">
									<a href="single.php?theloai=' . $sanpham['TheLoaiId'] . '&sanpham=' . $sanpham['Id'] . '"><img src="' . $sanpham['Anh1'] . '" alt="" class="img-responsive zoom-img"></a>
								</div>
									<div class="home-product-bottom">
											<h3><a href="single.php?theloai=' . $sanpham['TheLoaiId'] . '&sanpham=' . $sanpham['Id'] . '">' . $sanpham['Ten'] . '</a></h3>
											<p>Find out now</p>						
									</div>
									<div class="srch">
										<span>' . $sanpham['Gia'] . '$</span>
									</div>
								</div>
							</div>
							';
					}
				}
			}
			?>

			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--home block end here-->
<?php
require_once 'layouts/footer.php';
?>