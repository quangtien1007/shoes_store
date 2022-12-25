<?php
require_once 'library/init.php';
$title = 'Thông tin khách hàng';
if (isset($_SESSION['id_kh'])) {
    $ID = $_SESSION['id_kh'];
    $sql = "SELECT * FROM donhang WHERE Id_KhachHang='$ID'";
    $sql1 = "SELECT COUNT(*) FROM donhang WHERE Id_KhachHang='$ID'";
    $cart = $db->fetch_assoc($sql);
    $countcart = $db->fetch_assoc($sql1);
}
if (isset($_SESSION['email'])) {
    $_SESSION['email'] = $email;
    $sql = "SELECT * FROM account WHERE Email='$email'";
    $sql1 = "SELECT COUNT(*) FROM account WHERE Email='$email'";
    $user = $db->fetch_assoc($sql)[0];
    $count = $db->fetch_assoc($sql1);
}
require_once 'layouts/header.php';
?>
<!--product start here-->
<br><br><br><br>
<script src="./js/app_client.js" crossorigin="anonymous"></script>
<div class="product">
    <div class="container">
        <div class="product-main">
            <div class="product-block">
                <h2 class="title-nguoidung">Tài khoản của bạn</h2>
                <div class="row-nguoidung">
                    <div class="col-sm-2">
                        <h4 style="margin-left: 10px;">Tài khoản</h4>
                        <div class="components-nguoidung list-group">
                            <br>
                            <ul>
                                <li><a class="list-group-item active" onclick="handleShowInfo()">Thông tin tài khoản</a></li>
                                <li><a class="list-group-item" onclick="handleShowDiaChi()">Địa chỉ</a></li>
                                <li><a class="list-group-item" onclick="handleShowDoiMatKhau()">Đổi mật khẩu</a></li>
                                <li><a class="list-group-item" href="cart.php">Giỏ hàng</a></li>
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
                    <div class="col-sm-1"></div>
                    <div class="col-sm-8">
                        <div id="info_nguoidung">
                            <div class="container-nguoidung">
                                <?php
                                echo '
                                <h4>Thông tin tài khoản</h4>
                                <br>
                                <p><b>' . $user['HoVaTen'] . '</b></p>
                                <p><b>' . $user['Email'] . '</b></p>
                                <p><b>' . $user['DiaChi'] . '</b></p>
                                <p><b>' . $user['SDT'] . '</b></p>
                            ';
                                ?>
                            </div>
                            <div class="container-orders">
                                <h4>Danh sách đơn hàng</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Thành tiền</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Vận chuyển</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ((implode($countcart[0]) > 0) && implode($count[0]) > 0) {
                                            foreach ($cart as $c) {
                                                if ($c['TrangThai'] == 1 && $c['VanChuyen'] == 1) {
                                                    $TrangThai = 'Đang chờ xử lý';
                                                    $VanChuyen = 'Đang chờ xử lý';
                                                } else if ($c['TrangThai'] == 2) {
                                                    $TrangThai = 'Đã xử lý';
                                                    $VanChuyen = 'Đang giao hàng';
                                                } else if ($c['TrangThai'] == 0) {
                                                    $TrangThai = 'Đã hủy';
                                                    $VanChuyen = 'Đã hủy';
                                                } else if ($c['TrangThai'] == 3) {
                                                    $TrangThai = 'Đang chờ xác nhận hủy';
                                                    $VanChuyen = 'Đang chờ xác nhận hủy';
                                                }
                                                echo
                                                '<tr>
                                            <td>#' . mt_rand(100, 300) . '</td>
                                            <td>' . $c['NgayDat'] . '</td>
                                            <td>' . $c['ThanhTien'] . '$</td>
                                            <td>' . $TrangThai . '</td>
                                            <td>' . $VanChuyen . '</td>
                                        </tr>';
                                            }
                                        } else {
                                            echo '<p><b>Ban chua co don hang nao</b></p>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="diachi_nguoidung">
                            <h3>Địa chỉ</h3><br>
                            <div class="col-sm-6 testdiachi">
                                <?php
                                echo '
                            <div class="thongtin-diachi">
                                <div class="diachi-item">
                                    <ul class="title-diachi">
                                        <li>' . $user['HoVaTen'] . ' (Địa chỉ mặc định)</li>
                                        <li class="edit-diachi"><a onclick="handleHide()" id="edit-add"><i class="fa-solid fa-pen-to-square"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6" id="info-address">
                                    <p><b>' . $user['HoVaTen'] . '</b></p>
                                    <p><b>Địa chỉ:</b></p>
                                    <p><b>Số điện thoại:</b></p>
                                </div>
                            </div>
                            <div class="sua-diachi" id="edit-address">
                                        <form action="model/diachi.php" method="post">
                                            <div class="form_edit_diachi">
                                                <input class="form-control diachi" type="text" id="" name="Ten" placeholder="Tên">
                                                <input class="form-control diachi" type="text" id="" name="DiaChi" placeholder="Địa chỉ">
                                                <input class="form-control diachi" type="text" id="" name="SDT" placeholder="Số điện thoại">
                                                <input type="submit" class="btn-book"  name="Diachi" value="Cập nhật">
                                            </div>
                                        </form>
                            </div>
                                ';
                                ?>
                                <div class="col-sm-6 " id="info-address1">
                                    <?php
                                    echo '
                                        <br>
                                        <p>' . $user['DiaChi'] . '</p>
                                        <p>' . $user['SDT'] . '</p>
                                ';
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $sql = "SELECT Password, Email FROM account WHERE Id='$id'";
                        $account = $db->fetch_assoc($sql);
                        ?>
                        <div id="doimatkhau_nguoidung">
                            <h3>Đổi mật khẩu</h3>
                            <div class="container-nguoidung ">
                                <form action="model/doimatkhau.php" method="post">
                                    <input type="text" class="form-control diachi" name="Email" placeholder="Nhập email" />
                                    <input type="password" class="form-control diachi" name="oldPass" placeholder="Nhập password cũ" />
                                    <input type="password" class="form-control diachi" name="newPass" placeholder="Nhập password mới" />
                                    <input type="password" class="form-control diachi" name="confirmNewPass" placeholder="Xác nhận password mới" />
                                    <input type="submit" class="btn-book" name="DoiMatKhau" value="Xác nhận">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
    <!--product end here-->
    <?php
    require_once 'layouts/footer.php';
    ?>