<?php
$title = "List cart";
require_once 'layouts/header.php';
if (isset($_SESSION['cart'])) {
    //echo var_dump($_SESSION['cart']);
    // echo '<br> Ban co tiep tuc <a href="index.php">mua hang khong';
?>
    <br><br><br><br>
    <div class="main booking">
        <div class="container">
            <br>
            <h2>Giỏ hàng của bạn</h2>
            <br>
            <table class="table table-hover">
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
                foreach ($_SESSION['cart'] as $sp) {
                    $ttien = $sp[3] * $sp[4];
                    $tong += $ttien;
                    echo '
                <tr>
                    <td>' . ($i + 1) . '</td>
                    <td><img src="' . $sp[1] . '" width="100px"/></td>
                    <td>' . $sp[2] . '</td>
                    <td>' . $sp[3] . '$</td>
                    <td>' . $sp[5] . '</td>
                    <td>' . $sp[4] . '</td>
                    <td>' . number_format($ttien) . '$</td>
                    <td><a href="booking.php?Id=' . $sp[0] . '&i=' . $i . '">Đặt hàng</a></td>
                    <td><a href="delcart.php?id=' . $i . '">Xóa</a></td>
                </tr>';
                    $i++;
                }
                ?>
            </table>
            <style>
                td {
                    vertical-align: middle;
                }
            </style>
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
    <br><br>
<?php
} else {
    echo 'Giỏ hàng rỗng hãy <a href="index.php">tiếp tục mua sắm</a>';
}
require_once 'layouts/footer.php';
?>