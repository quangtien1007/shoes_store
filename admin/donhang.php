<?php
require_once '../library/init.php';
$title = 'Đơn đặt hàng';
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $update = "UPDATE donhang SET TrangThai=2 WHERE Id='$Id'";
    $db->query($update);
}
if (isset($_GET['IdX'])) {
    $Id = $_GET['IdX'];
    $update = "UPDATE donhang SET TrangThai=0 WHERE Id='$Id'";
    $db->query($update);
}
if (isset($_GET['IdXoa'])) {
    $Id = $_GET['IdXoa'];
    $update = "DELETE FROM donhang WHERE Id='$Id'";
    $db->query($update);
}
$sql = "SELECT * FROM donhang";
$donhang = $db->fetch_assoc($sql);
require_once 'layouts/header.php';
?>
<!--product start here-->
<br><br><br><br>
<script src="../js/app_client.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<div class="product">
    <div class="container">
        <div class="product-main">
            <div class="product-block">
                <h1 class="title-nguoidung">Quản lý đơn hàng</h1>
                <div class="row-nguoidung">
                    <div class="col-sm-2">
                        <div class="components-nguoidung list-group">
                            <br>
                            <ul>
                                <li><a class="list-group-item active" onclick="handleShowOrder()" id="orders-order">Đơn đặt hàng</a></li>
                                <li><a class="list-group-item" onclick="handleShowConfirm()" id="orders-confirm">Đơn đã xác nhận</a></li>
                                <li><a class="list-group-item" onclick="handleShowCancel()" id="orders-cancel">Đơn đã hủy</a></li>
                                <li><a class="list-group-item" onclick="handleShowConfirmCancel()" id="orders-cancel">Đơn chờ hủy</a></li>
                            </ul>
                        </div>
                    </div>
                    <script>
                        jQuery(document).ready(function() {
                            jQuery('ul li a').click(function() {
                                jQuery('li a').removeClass("active");
                                jQuery(this).addClass("active");
                            });
                        });
                    </script>
                    <div class="col-sm-8">
                        <div id="info-order">
                            <h2>Đơn chờ xác nhận đặt hàng</h2>
                            <br>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <th>Tên sản phầm</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Xác nhận</th>
                                </tr>
                                <?php
                                foreach ($donhang as $dh) {
                                    if ($dh['TrangThai'] == 1) {
                                        echo '
                                <tr>
                                    <td>#' . mt_rand(1, 300) . ' </td>
                                    <td>' . $dh['TenSP'] . '</td>
                                    <td>' . $dh['Size'] . '</td>
                                    <td>' . $dh['SoLuong'] . '</td>
                                    <td>' . $dh['ThanhTien'] . '$</td>
                                    <td>
                                       <a href="donhang.php?Id=' . $dh['Id'] . '" class="btn-"><img src="https://cdn-icons-png.flaticon.com/512/711/711239.png" width="20px" /></a>
                                       <a href="donhang.php?IdX=' . $dh['Id'] . '" class="btn-"><img src="https://cdn-icons-png.flaticon.com/512/660/660252.png" width="20px" /></a>
                                </tr>
                                ';
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div id="confirm-order">
                            <h2>Đơn đã xác nhận</h2>
                            <br>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <th>Tên sản phầm</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <?php
                                foreach ($donhang as $dh) {
                                    if ($dh['TrangThai'] == 2) {
                                        echo '
                                <tr>
                                    <td>#' . mt_rand(1, 300) . ' </td>
                                    <td>' . $dh['TenSP'] . '</td>
                                    <td>' . $dh['Size'] . '</td>
                                    <td>' . $dh['SoLuong'] . '</td>
                                    <td>' . $dh['ThanhTien'] . '</td>
                                </tr>
                                ';
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div id="cancel-order">
                            <h2>Đơn đã hủy</h2>
                            <br>
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <th>Tên sản phầm</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <?php
                                foreach ($donhang as $dh) {
                                    if ($dh['TrangThai'] == 0) {
                                        echo '
                                <tr>
                                    <td>#' . mt_rand(1, 300) . ' </td>
                                    <td>' . $dh['TenSP'] . '</td>
                                    <td>' . $dh['Size'] . '</td>
                                    <td>' . $dh['SoLuong'] . '</td>
                                    <td>' . $dh['ThanhTien'] . '</td>
                                    <td>
                                        <a href="donhang.php?IdXoa=' . $dh['Id'] . '" class="btn-"><img src="https://cdn-icons-png.flaticon.com/512/660/660252.png" width="20px" /></a>
                                    </td>
                                </tr>
                                ';
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <div id="confirm-cancel-order">
                            <h2>Đơn chờ xác nhận hủy</h2>
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Mã đơn hàng</td>
                                    <th>Tên sản phầm</th>
                                    <th>Size</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Xác nhận</th>
                                </tr>
                                <?php
                                foreach ($donhang as $dh) {
                                    if ($dh['TrangThai'] == 3) {
                                        echo '
                                <tr>
                                    <td>#' . mt_rand(1, 300) . ' </td>
                                    <td>' . $dh['TenSP'] . '</td>
                                    <td>' . $dh['Size'] . '</td>
                                    <td>' . $dh['SoLuong'] . '</td>
                                    <td>' . $dh['ThanhTien'] . '$</td>
                                    <td>
                                       <a href="donhang.php?IdX=' . $dh['Id'] . '" class="btn-"><img src="https://cdn-icons-png.flaticon.com/512/711/711239.png" width="20px" /></a>
                                       <a href="donhang.php?IdXoa=' . $dh['Id'] . '" class="btn-"><img src="https://cdn-icons-png.flaticon.com/512/660/660252.png" width="20px" /></a>
                                    </td>
                                </tr>
                                ';
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="clearfix"> </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product end here-->
<?php
require_once 'layouts/footer.php';
?>