<?php
require_once 'library/init.php';
$title = 'Danh sách đơn hàng';
require_once 'layouts/header.php';
if (isset($_SESSION['id_kh'])) {
    $IdKH = $_SESSION['id_kh'];
    $cart = "SELECT COUNT(*) FROM donhang WHERE Id_KhachHang='$IdKH'";
    $countCart = $db->fetch_assoc($cart);
}
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $update = "UPDATE donhang SET TrangThai=3 WHERE Id='$Id'";
    $db->query($update);
}
if (isset($_SESSION['id_kh']) && (implode($countCart[0]) > 0)) {
?>
    <!-- main -->
    <br><br><br><br>
    <div class="main booking">
        <div class="container">
            <h2>Đơn hàng của bạn</h2>
            <br>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Size</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Địa chỉ</th>
                        <th>Thành tiền</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody class="body-table-san-pham">
                    <?php
                    $sql = "SELECT * FROM donhang";
                    $donhang = $db->fetch_assoc($sql);
                    $sql_get_list = "SELECT * FROM donhang WHERE Id_KhachHang='$IdKH'";
                    $dhang = $db->fetch_assoc($sql_get_list);
                    // $sql_get_list1 = "SELECT * FROM $cartName";
                    // $donhang = $db->fetch_assoc($sql_get_list);
                    // $diachi = $db->fetch_assoc($sql_get_list);

                    if ($db->num_rows($sql_get_list)) {
                        foreach ($db->fetch_assoc($sql_get_list) as $key => $dh) {
                            if (isset($dh['TrangThai'])) {
                                if ($dh['TrangThai'] == '0')
                                    $TrangThai = 'Đơn đã bị hủy';
                                if ($dh['TrangThai'] == '1')
                                    $TrangThai = 'Đang chờ xử lý';
                                if ($dh['TrangThai'] == '2')
                                    $TrangThai = 'Đang giao hàng';
                                if ($dh['TrangThai'] == '3')
                                    $TrangThai = 'Đang chờ xác nhận hủy';
                                echo
                                '
                              <tr Id="' . $dh["Id"] . '" >
                                  <td>' . ($key + 1) . '</td>
                                  <td><img src="' . $dh["HinhAnh"] . '" width="100px"/></td>
                                  <td>' . $dh["TenSP"] . '</td>
                                  <td>' . $dh["Size"] . '</td>
                                  <td>' . $dh["Gia"] . '</td>
                                  <td>' . $dh["SoLuong"] . '</td>
                                  <td>' . $dh["DiaChi"] . '</td>
                                  <td>' . $dh["ThanhTien"] . '</td>
                                  <td>' . $TrangThai . '</td>
                                  <th>
                                      <a class="btn-delete" href="edit-booking.php?Id=' . $dh['Id'] . '"><i class="fa-solid fa-pen-to-square"></i></a> &nbsp
                                      <a class="btn-delete" href="orders.php?Id=' . $dh["Id"] . '">&nbsp<i class="fa-sharp fa-solid fa-xmark"></i>&nbsp</a>
                                  </th>
                              </tr>
                              ';
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br><br><br><br>
    <!-- //main -->
<?php

} else {
    echo '<br><br><br><br><div class="main booking">
    <div class="container" style="text-align: center;">
        <h2>Đơn hàng của bạn</h2>
        <img src="images/empty-cart.png" width="30%"/>
        <h2><i class="fa-light fa-cart-circle-exclamation"></i></h2>
        <h4>Giỏ hàng rỗng <a href="index.php">tiếp tục đặt hàng nào</a></h4>
        <br>
    </div>
</div>';
}
require_once 'layouts/footer.php';
?>