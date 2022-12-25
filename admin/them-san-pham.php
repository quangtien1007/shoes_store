<?php
require_once '../library/init.php';
$sql_get_theloai = "SELECT * FROM theloai";
$sql_get_brand = "SELECT * FROM brand";
$theloai = $db->fetch_assoc($sql_get_theloai);
$brand = $db->fetch_assoc($sql_get_brand);

?>

<?php
$title = 'Thêm sản phẩm';
require_once '../admin/layouts/header.php';
?>
<!-- main -->
<br><br><br><br>
<div class="main theloai">
    <div class="container">
        <h2>Thêm sản phẩm</h2>
        <br>
        <form action="../model/xlsanpham.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Ten">Tên</label>
                <input type="text" name="Ten" class="form-control" id="Ten" required>
            </div>
            <div class="form-group">
                <label for="MoTa">Mô tả</label>
                <textarea class="form-control" name="MoTa" id="MoTa" required></textarea>
            </div>
            <div class="form-group">
                <label for="Gia">Giá</label>
                <input type="text" name="Gia" class="form-control" id="Gia" required>
            </div>
            <div class="form-group">
                <label for="TheLoaiId">Thể loại</label>
                <select class="form-control" id="TheLoaiId" name="TheLoaiId">
                    <?php
                    for ($i = 0; $i < count($theloai); $i++) {
                        echo '<option value="' . $theloai[$i]['Id'] . '">' . $theloai[$i]['Ten'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="brandID">Hãng</label>
                <select class="form-control" id="brandID" name="brandID">
                    <?php
                    for ($i = 0; $i < count($brand); $i++) {
                        echo '<option value="' . $brand[$i]['Id'] . '">' . $brand[$i]['TenHang'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="Anh1">Ảnh 1</label>
                <input type="file" name="Anh1" class="form-control" id="Anh1" required>
            </div>
            <div class="form-group">
                <label for="Anh2">Ảnh 2</label>
                <input type="file" name="Anh2" class="form-control" id="Anh2" required>
            </div>
            <div class="form-group">
                <label for="Anh3">Ảnh 3</label>
                <input type="file" name="Anh3" class="form-control" id="Anh3" required>
            </div>
            <div class="form-group">
                <label for="SoLuong">Số lượng</label>
                <input type="text" name="SoLuong" class="form-control" id="SoLuong" required>
            </div>
            <button type="submit" class="btn btn-default" name="Them">Thêm</button>
        </form>
    </div>
</div>
<!-- //main -->
<?php
require_once '../admin/layouts/footer.php';
?>