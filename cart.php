<?php
$title = "List cart";
require_once 'layouts/header.php';
require_once 'library/init.php';

// if (isset($_SESSION['cart'])) {
$sql = "SELECT * FROM $cartName";
$cart = $db->fetch_assoc($sql);
$sqlCount = "SELECT COUNT(*) FROM $cartName";
$countCart = $db->fetch_assoc($sqlCount);
$count = implode($countCart[0]);
if ($count > 0) {
?>
    <br><br><br><br>
    <div class="main booking">
        <div class="container">
            <br>
            <h2>Giỏ hàng của bạn</h2>
            <br>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Chức năng</th>
                    <th></th>
                </tr>
                <?php
                $tong = 0;
                $i = 0;
                foreach ($cart as $c) {
                    $ttien = $c['Gia'] * $c['SoLuong'];
                    $tong += $ttien;

                    echo '
                <tr>
                    <td>' . ($i + 1) . '</td>
                    <td><img src="' . $c['HinhAnh'] . '" width="100px"/></td>
                    <td>' . $c['TenSP'] . '</td>
                    <td>' . $c['Gia'] . '$</td>
                    <td>' . $c['Size'] . '</td>
                    <td>' . $c['SoLuong'] . '</td>
                    <td>' . number_format($ttien) . '$</td>
                    <td><a class="btn-book" href="booking.php?Id=' . $c['IdSP'] . '&i=' . $i . '">Đặt hàng</a></td>
                    <td><a class="btn-delete" href="delcart.php?id=' . $c['Id'] . '"><i class="fa-solid fa-trash"></i></a></td>
                </tr>';
                    $i++;
                }
                ?>
            </table>
            <style>

            </style>
            <br>
            <p><a class="btn-cart" style="float:right;
                    margin-right: 20px;" href="delcart.php">Xóa giỏ hàng</a></p>
            <a class="btn-cart" style="margin-left: 10px;" href="index.php">Tiếp tục mua sắm nào</a>
            <?php
            if (!isset($_SESSION['id_kh'])) {
                echo '<a class="btn-cart" href="admin/login.php">Đăng nhập để đặt hàng</a>';
            }
            ?>
        </div>
    </div>
    <br>
<?php
} else {
    echo '
    <br><br>
    <div class="main booking">
        <div class="container" style="text-align: center;">
            <h2>Giỏ hàng của bạn</h2>
            <img src="images/empty-cart.png" width="30%"/>
            <h2><i class="fa-light fa-cart-circle-exclamation"></i></h2>
            <h4>Giỏ hàng rỗng <a href="index.php">tiếp tục đặt hàng nào</a></h4>
            <br>
        </div>
    </div>';
}
require_once 'layouts/footer.php';
?>