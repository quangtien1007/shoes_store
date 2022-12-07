<?php
require_once 'library/init.php';
$title = 'Danh sách đơn hàng';
require_once 'layouts/header.php';
if (isset($_SESSION['id_kh'])) {
?>
    <!-- main -->
    <div class="main booking">
        <div class="container">
            <h4 class="label label-primary">Đơn hàng của bạn</h4>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Địa chỉ</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody class="body-table-san-pham">
                    <?php
                    $id = $_SESSION["id_kh"];
                    $sql = "SELECT Email from account where Id=$id";
                    $exec = $db->fetch_assoc($sql)[0];
                    $email = $exec["Email"];
                    $arr = explode("@", $email, 2);
                    $cartName = $arr[0] . '_cart';
                    $sql_get_list = "SELECT * FROM $cartName ORDER BY Id ASC";
                    if ($db->num_rows($sql_get_list)) {
                        foreach ($db->fetch_assoc($sql_get_list) as $key => $cartName) {
                            echo
                            '
                              <tr Id="' . $cartName["Id"] . '" >
                                  <td>' . ($key + 1) . '</td>
                                  <td><img src="' . $cartName["HinhAnh"] . '" width="100px"/></td>
                                  <td>' . $cartName["TenSP"] . '</td>
                                  <td>' . $cartName["Gia"] . '</td>
                                  <td>' . $cartName["DiaChi"] . '</td>
                                  <td>' . $cartName["SoLuong"] . '</td>
                                  <td>' . $cartName["ThanhTien"] . '</td>
                                  <th>
                                      <a class="btn btn-info" href="edit-booking.php?Id=' . $cartName["Id"] . '">Sửa</a> 
                                      <a class="btn btn-danger delete" Id="' . $cartName["Id"] . '"href="delete-booking.php?Id=' . $cartName["Id"] . '">Xóa</a>
                                  </th>
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
} else {
    echo '<div class="main booking">
    <div class="container" style="text-align: center;">
        <h4 class="label label-primary">Đơn hàng của bạn</h4>
        <img src="images/empty-cart.png" width="30%"/>
        <h2><i class="fa-light fa-cart-circle-exclamation"></i></h2>
        <h4>Giỏ hàng rỗng <a href="index.php">tiếp tục đặt hàng nào</a></h4>
        <br>
    </div>
</div>';
}
require_once 'layouts/footer.php';
?>