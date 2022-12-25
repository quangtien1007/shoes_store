<?php
$title = 'Sản phẩm';
require_once 'layouts/header.php';
?>
<!-- main -->
<br><br><br><br>
<div class="main sanpham">
    <div class="container">
        <h2 class="head-title">Sản phẩm</h2>
        <br>
        <a href="them-san-pham.php" class="btn-cart">Thêm sản phẩm</a>
        <br><br>
        <div class="form-group">
            <input type="text" name="noidung" class="form-control" id="noidung" placeholder="Tìm sản phẩm">
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Số lượng tồn</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="body-table-san-pham">
                <?php
                $sql_get_list = "SELECT * FROM sanpham ORDER BY Id ASC";
                if ($db->num_rows($sql_get_list)) {
                    foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
                        echo
                        '
                              <tr Id="' . $sanpham["Id"] . '" >
                                  <td>' . ($key + 1) . '</td>
                                  <td>' . $sanpham["Ten"] . '</td>
                                  <td width="200px">' . $sanpham["MoTa"] . '</td>
                                  <td>' . $sanpham["Gia"] . '</td>
                                  <td>
                                    <img width="120px" src="../' . $sanpham["Anh1"] . '">
                                    <img width="120px" src="../' . $sanpham["Anh2"] . '">
                                    <img width="120px" src="../' . $sanpham["Anh3"] . '">
                                  </td>
                                  <td>' . $sanpham['SoLuongTon'] . '</td>
                                  <td>
                                      <a class="btn-book" href="sua-san-pham.php?Id=' . $sanpham["Id"] . '">Sửa</a>
                                      <a class="btn-delete" Id="' . $sanpham["Id"] . '" data-href="xoa-san-pham.php?Id=' . $sanpham["Id"] . '">Xóa</a>
                                  </td>
                              </tr>
                              ';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- //main -->
<?php
require_once 'layouts/footer.php';
?>