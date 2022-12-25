<?php
require_once 'library/init.php';
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $sql_get_item = "SELECT * FROM donhang WHERE Id='$Id'";
    $donhang = $db->fetch_assoc($sql_get_item)[0];
    // $sql_get_list = "SELECT * FROM $cartName WHERE Id='$Id_Cart'";
    // $cart = $db->fetch_assoc($sql_get_list)[0];
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
        <form action="model/xlbooking.php" method="post" enctype="multipart/form-data">
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