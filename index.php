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
					$sql_get_list = "SELECT * FROM sanpham ";
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
				<h6></h6>
				<h3>STOCKX CHUẨN GIÀY REAL DEAL SIÊU KHỦNG</h3>
				<p>Cửa Hàng StockX là một trong những nơi sưu tầm có khối lượng giày hiếm siêu khủng. Có những mẫu giày cực kì hype được giới sưu tầm săn lùng, thậm chí bạn sẽ bắt gặp nhiều mẫu lạ mới mà hiếm shop nào có. Có những mẫu chỉ có độc nhất 1 đôi. Ngoài ra những mẫu đang rất HOT trên thị trường sneaker về liên tục nên các bạn cứ yên tâm không sợ hết hàng.</p>
				<!-- <h6>Benefits</h6>
				<ul>
					<li>
						<h4>Temporibus autem quibusdam</h4>
						<h5>At vero eos et accusamus et iusto odio</h5>
					</li>
					<li>
						<h4>These cases are perfectly</h4>
						<h5>voluptatum deleniti atque corrupti quos</h5>
					</li>
				</ul> -->
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
			</div><br><br>

			<div class="clearfix"> </div>
		</div>
		<div class="row-s">
			<div class="col-xs-6 col-sm-6">
				<img src="images/sontungjordan1.jpg" width="100%" alt="">
			</div>
			<div class="col-xs-6 col-sm-6 blc-layer3-grids1">
				<h3>ĐƯỢC CÁC NGÔI SAO BIẾT ĐẾN</h3>
				<p class="p-picture">Được các nghệ sĩ hàng đầu Việt Nam lựa chọn, đặc biệt như Sơn Tùng M-TP cũng chọn cho mình một đôi Jordan 1 Retro High OG với màu xanh rất nhẹ nhàng</p>
				<br>
				<div class="box-grid" width="60%">
					<?php
					$sql_get_list = "SELECT * FROM sanpham";
					if ($db->num_rows($sql_get_list)) {
						foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
							if ($key == 2) {
								echo '
										<h3><a href="single.php?theloai=' . $sanpham['TheLoaiId'] . '&sanpham=' . $sanpham['Id'] . '">New Arrival</a></h3>
					   					<h5>Same Son Tung M-TP</h5>
										<a href="single.php?theloai=' . $sanpham['TheLoaiId'] . '&sanpham=' . $sanpham['Id'] . '"><img style="width: 40%;margin-left:120px;" src="' . $sanpham['Anh1'] . '"></a>
										<div class="box-grid-price">
											<div class="box-grid-price-left">
												<h4>' . $sanpham['Ten'] . '</h4>
											</div>
											<div class="box-grid-price-rit">
												<h4 class="item_price">' . $sanpham['Gia'] . '$</h4>
											</div>
											<div class="clearfix"> </div>
										</div> ';
							}
						}
					} ?>
				</div>
			</div>
		</div>

	</div>
</div>
<!--block-layer1 end here-->
<!--home-block start here-->
<div class="home-block">
	<div class="container">
		<div class="home-block-main">
			<h2 style="text-align: center;">Sản phẩm nổi bật</h2><br>
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