<?php
require_once 'library/init.php';
if (isset($_SESSION['id_kh'])) {
  $ID_KH = $_SESSION['id_kh'];
  if (isset($_GET['Id'])) {
    $get_Id = $_GET['Id'];
    $sql_get_item = "SELECT * FROM sanpham WHERE Id='$get_Id'";
    $sanpham = $db->fetch_assoc($sql_get_item)[0];
    $sql_get_theloai = "SELECT * FROM theloai";
    $theloai = $db->fetch_assoc($sql_get_theloai);
    $sql_get_cart = "SELECT * FROM $cartName";
    $cart = $db->fetch_assoc($sql_get_cart);
  }
  if (isset($_GET['i'])) {
    $i = $_GET['i'];
  }

  if (isset($_POST['Booking'])) {
    // Xử lý các giá trị 
    $TrangThai = 1;
    $VanChuyen = 1;
    $NgayDat = $date_current;
    $Id_DonHang = isset($_POST['Id_DonHang']) ? trim(htmlspecialchars(addslashes($_POST['Id_DonHang']))) : '';
    $TenSP = isset($_POST['TenSP']) ? trim(htmlspecialchars(addslashes($_POST['TenSP']))) : '';
    $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
    $TenKH = isset($_POST['TenKH']) ? trim(htmlspecialchars(addslashes($_POST['TenKH']))) : '';
    $ThanhTien = isset($_POST['ThanhTien']) ? trim(htmlspecialchars(addslashes($_POST['ThanhTien']))) : '';
    $Size = isset($_POST['Size']) ? trim(htmlspecialchars(addslashes($_POST['Size']))) : '';
    $SoLuong = isset($_POST['SoLuong']) ? trim(htmlspecialchars(addslashes($_POST['SoLuong']))) : '';
    $HinhAnh = isset($_POST['HinhAnh']) ? trim(htmlspecialchars(addslashes($_POST['HinhAnh']))) : '';
    $DiaChi = isset($_POST['DiaChi']) ? trim(htmlspecialchars(addslashes($_POST['DiaChi']))) : '';
    $GhiChu = isset($_POST['GhiChu']) ? trim(htmlspecialchars(addslashes($_POST['GhiChu']))) : '';
    if ($TenSP == "" || $DiaChi == "" || $Gia == "" || $TenKH == "") {
      echo '<script>alert("Không được để trống các trường")</script>';
    } else {
      $sql1 = "INSERT INTO $cartName (IdSP,TenSP ,Gia, HinhAnh, Size, DiaChi, SoLuong, ThanhTien)
    VALUES ('$Id_DonHang','$TenSP','$Gia','$HinhAnh', '$Size','$DiaChi','$SoLuong','$ThanhTien');";
      $db->query($sql1);
      $sql = "INSERT INTO `donhang` (`Id_SanPham`, `Id_KhachHang`,`TenKH`, `TenSP`,`Size`, `SoLuong`, `DiaChi`, `Gia`, `ThanhTien`,`GhiChu`,`TrangThai`,`VanChuyen`,`NgayDat`,`HinhAnh`)
    VALUES ('$Id_DonHang','$ID_KH','$TenKH','$TenSP', '$Size','$SoLuong','$DiaChi', '$Gia','$ThanhTien','$GhiChu','$TrangThai','$VanChuyen','$NgayDat','$HinhAnh');";
      $db->query($sql);

      new Redirect("orders.php");
    }
  }

?>
  <?php
  $title = 'Đặt hàng';
  require_once 'layouts/header.php';
  ?>
  <!-- main -->
  <br><br><br><br>
  <div class="main theloai" width="300px">
    <div class="container">
      <h2>Đặt hàng</h2>
      <form action="booking.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="HinhAnh" value="<?php echo $sanpham['Anh1'] ?> " />
        </div>
        <div class="form-group">
          <input type="hidden" name="Id_DonHang" class="form-control" id="Id_DonHang" value="<?php echo $sanpham['Id'] ?>">
        </div>
        <input type="hidden" name="NgayDat" class="form-control" id="current-time" />
        <div class="form-group">
          <input type="hidden" name="Size" class="form-control" id="Size" value="<?php echo $_SESSION['cart'][$i][5]; ?> ">
        </div>
        <div class=" form-group">
          <label for="Ten">Tên khách hàng</label>
          <input type="text" name="TenKH" class="form-control" id="TenKH" required>
        </div>
        <div class="form-group">
          <label for="TenSP">Tên sản phẩm</label>
          <input type="text" class="form-control" name="TenSP" id="TenSP" readonly="readonly" value="<?php echo $sanpham['Ten'] ?>" />
        </div>
        <div class="form-group">
          <label for="Gia">Giá</label>
          <input type="text" name="Gia" class="form-control" id="Gia" readonly="readonly" value="<?php echo $sanpham['Gia'] ?>" />
        </div>
        <div class="form-group">
          <label for="SoLuong">Số lượng</label>
          <input type="number" name="SoLuong" class="form-control" id="SoLuong" value="<?php echo $_SESSION['cart'][$i][4]; ?>" required>
        </div>
        <div class="form-group">
          <label for="DiaChi">Địa chỉ</label>
          <input type="text" name="DiaChi" class="form-control" id="DiaChi" />
        </div>
        <div class="form-group">
          <label for="GhiChu">Ghi chú</label>
          <input type="text" name="GhiChu" class="form-control" id="GhiChu" required>
        </div>
        <div class="form-group">
          <label for="ThanhTien">Thành tiền</label>
          <input type="text" name="ThanhTien" readonly class="form-control" id="ThanhTien" value="<?php echo number_format($sanpham['Gia'] * $_SESSION['cart'][$i][4]); ?>" required>
        </div>
        <button type="submit" class="btn-book" name="Booking">Đặt hàng</button>
      </form>
    </div>
  </div>
  <script>
    var curDate = new Date();
    // Ngày hiện tại
    var curDay = curDate.getDate();
    // Tháng hiện tại
    var curMonth = curDate.getMonth() + 1;
    // Năm hiện tại
    var curYear = curDate.getFullYear();
    // Gán vào thẻ HTML
    document.getElementById('current-time').value = curDay + "/" + curMonth + "/" + curYear;
  </script>
  <!-- //main -->
  <div class="clearfix">
    <br>
  </div>

<?php
} else {
  $title = 'Đặt hàng';
  require_once 'cart.php';
}
require_once 'layouts/footer.php';
?>