<?php
require_once 'library/init.php';
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $sql_get_item = "SELECT * FROM donhang WHERE Id='$Id'";
    $donhang = $db->fetch_assoc($sql_get_item)[0];
    // $sql_get_list = "SELECT * FROM $cartName WHERE Id='$Id_Cart'";
    // $cart = $db->fetch_assoc($sql_get_list)[0];
}

if (isset($_POST['Edit'])) {
    // echo 'ok';
    // Xử lý các giá trị 
    $Id = isset($_POST['Id']) ? trim(htmlspecialchars(addslashes($_POST['Id']))) : '';
    $Id_DonHang = isset($_POST['Id_DonHang']) ? trim(htmlspecialchars(addslashes($_POST['Id_DonHang']))) : '';
    $TenSP = isset($_POST['TenSP']) ? trim(htmlspecialchars(addslashes($_POST['TenSP']))) : '';
    $DiaChi = isset($_POST['DiaChi']) ? trim(htmlspecialchars(addslashes($_POST['DiaChi']))) : '';
    $GhiChu = isset($_POST['GhiChu']) ? trim(htmlspecialchars(addslashes($_POST['GhiChu']))) : '';
    $SoLuong = isset($_POST['SoLuong']) ? trim(htmlspecialchars(addslashes($_POST['SoLuong']))) : '';;
    $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
    $Size = isset($_POST['Size']) ? trim(htmlspecialchars(addslashes($_POST['Size']))) : '';
    $GhiChu = isset($_POST['GhiChu']) ? trim(htmlspecialchars(addslashes($_POST['GhiChu']))) : '';
    //$cartName1 = isset($_POST['cartName']) ? trim(htmlspecialchars(addslashes($_POST['cartName']))) : '';
    if ($SoLuong == "")
        echo '<script>alert("Không được để trống tên số lượng")</script>';
    else if ($Size == "")
        echo '<script>alert("Không được để trống tên size")</script>';
    else if ($DiaChi == "")
        echo '<script>alert("Không được để trống tên địa chỉ")</script>';
    else if ($GhiChu == "")
        echo '<script>alert("Không được để trống ghi chú")</script>';
    else {
        //$updateCart = "UPDATE $cartName1 SET Size='$Size', DiaChi='$DiaChi', SoLuong='$SoLuong' WHERE Id = '$Id'";
        $updateDonhang = "UPDATE donhang SET Size='$Size', SoLuong='$SoLuong', DiaChi='$DiaChi', GhiChu='$GhiChu' WHERE Id = $Id";
        //$db->query($updateCart);
        $db->query($updateDonhang);
        new Redirect('orders.php');
    }
}
?>
<?php
$title = 'Sửa sản phẩm';
require_once 'layouts/header.php';
?>
<!-- main -->
<br><br><br><br>
<div class="main theloai">
    <div class="container">
        <h4 class="edit-booking" style="font-size: 30px; text-align: center;">Sửa thông tin đơn hàng</h4>
        <form action="edit-booking.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Id" class="form-control" id="Id" value="<?php echo $donhang['Id'] ?>">
            <div class="form-group">
                <input type="hidden" name="Id_DonHang" class="form-control" id="Id_DonHang" value="<?php echo $donhang['Id_SanPham']; ?>" />
            </div>
            <div class="form-group">
                <input type="hidden" name="cartName" class="form-control" id="cartName" value="<?php echo $cartName; ?>" />
            </div>
            <div class=" form-group">
                <label for="TenSP">Tên sản phẩm</label>
                <input type="text" class="form-control" name="TenSP" id="TenSP" readonly="readonly" value="<?php echo $donhang['TenSP']; ?>" />
            </div>
            <div class="form-group">
                <label for="Gia">Giá</label>
                <input type="text" name="Gia" class="form-control" id="Gia" readonly="readonly" value="<?php echo $donhang['Gia'] ?>" />
            </div>
            <div class="form-group">
                <label for="SoLuong">Số lượng</label>
                <input type="number" name="SoLuong" class="form-control" id="SoLuong" value="<?php echo $donhang['SoLuong'] ?>" />
            </div>
            <div class="form-group">
                <label for="Size">Size</label>
                <select class="form-control" name="Size">
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                </select>
            </div>
            <div class="form-group">
                <label for="DiaChi">Địa chỉ</label>
                <input type="text" name="DiaChi" class="form-control" id="DiaChi" value="<?php echo $donhang['DiaChi'] ?>" required>
            </div>
            <div class="form-group">
                <label for="GhiChu">Ghi chú</label>
                <input type="text" name="GhiChu" class="form-control" id="GhiChu" value="<?php echo $donhang['GhiChu'] ?>" required>
            </div>
            <button type="submit" class="btn-book" name="Edit">Cập nhật</button>
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