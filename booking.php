<?php
  require_once 'library/init.php';
  if(isset($_GET['Id'])) {
    $get_Id = $_GET['Id'];
    $url = 'booking.php?Id='.$get_Id;
    $sql_get_item = "SELECT * FROM sanpham WHERE Id='$get_Id'";
    $sanpham = $db->fetch_assoc($sql_get_item)[0];
    $sql_get_theloai = "SELECT * FROM theloai";
    $theloai = $db->fetch_assoc($sql_get_theloai);
}

if (isset($_POST['Booking'])) {
  // Xử lý các giá trị 
  $Id_DonHang = isset($_POST['Id_DonHang']) ? trim(htmlspecialchars(addslashes($_POST['Id_DonHang']))) : '';
  $TenSP = isset($_POST['TenSP']) ? trim(htmlspecialchars(addslashes($_POST['TenSP']))) : '';
  $DiaChi = isset($_POST['DiaChi']) ? trim(htmlspecialchars(addslashes($_POST['DiaChi']))) : '';
  $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
  $TenKH = isset($_POST['TenKH']) ? trim(htmlspecialchars(addslashes($_POST['TenKH']))) : '';
  $GhiChu = isset($_POST['GhiChu']) ? trim(htmlspecialchars(addslashes($_POST['GhiChu']))) : '';
  if($TenSP == "" || $DiaChi == "" || $Gia == "" || $TenKH == "") {
    echo '<script>alert("Không được để trống các trường")</script>';
        } 
else {
  $sql = "INSERT INTO donhang (Id_DonHang,TenKH ,TenSP, DiaChi, Gia, GhiChu)
  VALUES ($Id_DonHang, '$TenKH','$TenSP','$DiaChi', '$Gia','$GhiChu');";
  $db->query($sql);
  new Redirect('list-booking.php');
  }
}
?>
<?php 
    $title = 'Đặt hàng';
    require_once 'layouts/header.php';
?>
<!-- main -->
<div class="main theloai">
  <div class="container">
    <h4 class="label-booking" style="font-size: 40px; text-align: center;">Đặt hàng</h4>
      <form action="booking.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="Id_DonHang" class="form-control" id="Id_DonHang" value="<?php echo $sanpham['Id'] ?>">
        </div>
        <div class="form-group">
          <label for="Ten">Tên khách hàng</label>
          <input type="text" name="TenKH" class="form-control" id="TenKH" required>
        </div>
        <div class="form-group">
          <label for="TenSP">Tên sản phẩm</label>
          <input type="text" class="form-control" name="TenSP" id="TenSP" readonly="readonly" value="<?php echo $sanpham['Ten'] ?>"/>
        </div>
        <div class="form-group">
          <label for="Gia">Giá</label>
          <input type="text" name="Gia" class="form-control" id="Gia" readonly="readonly" value="<?php echo $sanpham['Gia'] ?>"/>
        </div>
        <div class="form-group">
          <label for="DiaChi">Địa chỉ</label>
          <input type="text" name="DiaChi" class="form-control" id="DiaChi" required>
        </div>
        <div class="form-group">
          <label for="GhiChu">Ghi chú</label>
          <input type="text" name="GhiChu" class="form-control" id="GhiChu" required>
        </div>
        <button type="submit" class="btn btn-success" name="Booking">Đặt hàng</button>
      </form>
  </div>
</div>
<!-- //main -->
<div class="clearfix">
  <br>
</div>

<?php
require_once 'layouts/footer.php';
?>