<?php
	require_once 'library/init.php';
    $title = 'Tìm kiếm sản phẩm';
	// if(isset($_GET['Id'])) {
    //     $get_Id = $_GET['Id'];
	// 	$sql_get_list = "SELECT * FROM sanpham WHERE TheLoaiId='$get_Id'";
	// 	if($db->num_rows($sql_get_list)) {
	// 		$sanpham = $db->fetch_assoc($sql_get_list);
	// 	}
    //     $sql_get_theloai = "SELECT * FROM theloai WHERE Id = '$get_Id'";
	// 	if($db->num_rows($sql_get_theloai)) {
	// 		$ten_the_loai = $db->fetch_assoc($sql_get_theloai)[0]['Ten'];
	// 		$title = $ten_the_loai;
	// 	}
		
	// }
	require_once 'layouts/header.php'; 
?>
	<!--product start here-->
	<div class="product">
		<div class="container">
			<div class="product-main">
				<div class="product-block">
                    <?php
						$nd = isset($_POST['noidung']) ? $_POST['noidung'] : '';
                        if($nd == '') {
                            $sql_get_list = "SELECT * FROM sanpham ORDER BY Id ASC";
                        } else {
                            $sql_get_list = "SELECT sanpham.Ten, sanpham.TheLoaiId, sanpham.Id, sanpham.Gia, sanpham.Anh1, sanpham.Anh2, sanpham.Anh3 
                            FROM sanpham 
                            INNER JOIN theloai ON sanpham.TheLoaiId = theloai.Id
                            WHERE (sanpham.Ten LIKE '%$nd%') OR (sanpham.MoTa LIKE '%$nd%') OR (theloai.Ten LIKE '%$nd%')";
                        }
                        if($db->num_rows($sql_get_list)) {
                            foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
                                echo 
								'
								<div class="col-md-3 home-grid">
									<div class="home-product-main">
										<div class="home-product-top">
											<a href="single.php?theloai='.$sanpham['TheLoaiId'].'&sanpham='.$sanpham['Id'].'">
												<img src="'.$sanpham['Anh1'].'" alt="" class="img-responsive zoom-img">
											</a>
										</div>
										<div class="home-product-bottom">
											<h3>
												<a href="single.php?theloai='.$sanpham['TheLoaiId'].'&sanpham='.$sanpham['Id'].'">'.$sanpham['Ten'].'</a>
											</h3>
											<p>Khám phá ngay</p>
										</div>
										<div class="srch">
											<span>'.$sanpham['Gia'].'</span>
										</div>
									</div>
								</div>
								';
                            }
                        }
					?>

					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<!--product end here-->
<?php
    require_once 'layouts/footer.php'; 
?>
