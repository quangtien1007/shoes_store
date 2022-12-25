<?php
require_once '../library/init.php';
if (isset($_GET['Id'])) {
    $get_Id = $_GET['Id'];
    $url = 'sua-san-pham.php?Id=' . $get_Id;
    $sql_get_item = "SELECT * FROM sanpham WHERE Id='$get_Id'";
    $sanpham = $db->fetch_assoc($sql_get_item)[0];
    $sql_get_theloai = "SELECT * FROM theloai";
    $theloai = $db->fetch_assoc($sql_get_theloai);
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
        <h2 class="head-title">Sửa sản phẩm</h2>
        <form action="../model/xlsanpham.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="Ten">Tên</label>
                <input type="text" name="Ten" class="form-control" id="Ten" value="<?php echo $sanpham['Ten'] ?>" required>
            </div>
            <div class="form-group">
                <label for="MoTa">Mô tả</label>
                <textarea class="form-control" name="MoTa" id="MoTa" required><?php echo $sanpham['MoTa'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="Gia">Giá</label>
                <input type="text" name="Gia" class="form-control" id="Gia" value="<?php echo $sanpham['Gia'] ?>" required>
            </div>
            <div class="form-group">
                <label for="TheLoaiId">Thể loại</label>
                <select class="form-control" id="TheLoaiId" name="TheLoaiId">
                    <?php
                    for ($i = 0; $i < count($theloai); $i++) {
                        if ($sanpham['TheLoaiId'] == $theloai[$i]['Id']) {
                            echo '<option selected value="' . $theloai[$i]['Id'] . '">' . $theloai[$i]['Ten'] . '</option>';
                        } else {
                            echo '<option value="' . $theloai[$i]['Id'] . '">' . $theloai[$i]['Ten'] . '</option>';
                        }
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
            <input type="hidden" name="Id" value="<?php echo $sanpham['Id'] ?>">
            <input type="hidden" name="url" value="<?php echo $url ?>">
            <button type="submit" class="btn btn-default" name="Sua">Sửa</button>
        </form>
    </div>
</div>
<!-- //main -->
<?php
require_once 'layouts/footer.php';
?>