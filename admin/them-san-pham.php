<?php
require_once '../library/init.php';
$sql_get_theloai = "SELECT * FROM theloai";
$sql_get_brand = "SELECT * FROM brand";
$theloai = $db->fetch_assoc($sql_get_theloai);
$brand = $db->fetch_assoc($sql_get_brand);
if (isset($_POST['Them'])) {
    // Xử lý các giá trị 
    $Ten = isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
    $MoTa = isset($_POST['MoTa']) ? trim(htmlspecialchars(addslashes($_POST['MoTa']))) : '';
    $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
    $TheLoaiId = isset($_POST['TheLoaiId']) ? trim(htmlspecialchars(addslashes($_POST['TheLoaiId']))) : '';
    $brandID = isset($_POST['brandID']) ? trim(htmlspecialchars(addslashes($_POST['brandID']))) : '';

    if ($Ten == "" || $MoTa == "" || $Gia == "" || $TheLoaiId == "" || $brandID == "") {
        echo '<script>alert("Không được để trống các trường")</script>';
    } else {
        $Anh1 = (new UploadImage('Anh1'))->get_check();
        if ($Anh1 == "0") {
            echo '<script>alert("Ảnh 1 bị lỗi")</script>';
        } else {
            $Anh2 = (new UploadImage('Anh2'))->get_check();
            if ($Anh2 == "0") {
                unlink($Anh1);
                echo '<script>alert("Ảnh 2 bị lỗi")</script>';
            } else {
                $Anh3 = (new UploadImage('Anh3'))->get_check();
                if ($Anh3 == "0") {
                    unlink($Anh2);
                    echo '<script>alert("Ảnh 3 bị lỗi")</script>';
                } else {
                    $sql = "INSERT INTO sanpham (Ten, MoTa, Gia, TheLoaiId, brand_id,Anh1, Anh2, Anh3)
                        VALUES ('$Ten', '$MoTa', '$Gia', '$TheLoaiId','$brandID', '$Anh1', '$Anh2', '$Anh3');";
                    $db->query($sql);
                    new Redirect('san-pham.php');
                }
            }
        }
        new Redirect('san-pham.php');
    }
}
?>

<?php
$title = 'Thêm sản phẩm';
require_once 'layouts/header.php';
?>
<!-- main -->
<br><br><br><br>
<div class="main theloai">
    <div class="container">
        <h2>Thêm sản phẩm</h2>
        <br>
        <form action="them-san-pham.php" method="post" enctype="multipart/form-data">
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
            <button type="submit" class="btn btn-default" name="Them">Thêm</button>
        </form>
    </div>
</div>
<!-- //main -->
<?php
require_once 'layouts/footer.php';
?>