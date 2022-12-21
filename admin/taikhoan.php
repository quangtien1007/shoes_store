<?php
$title = 'Quản lý tài khoản';
require_once 'layouts/header.php';
?>
<!-- main -->
<br><br><br><br>
<div class="main theloai">
    <div class="container">
        <br>
        <h2>Quản lý tài khoản</h2>
        <br>
        <!-- <a href="them-the-loai.php" class="btn-cart">Thêm tài khoản</a> -->
        <div>
            <a id="buttonthem" class="btn-cart">Thêm tài khoản</a>
        </div>
        <div id="formthem">
            <form method="post" action="xltaikhoan.php" class="form-inline">
                <input type="text" name="Email" placeholder="Nhập Email">
                <input type="text" name="Password" placeholder="Nhập password">
                <input type="number" name="Loai" placeholder="Nhập loại tài khoản">
                <input type="submit" name="Them" value="Thêm" class="btn-book">
            </form>
            <div>
                <i>Loại tài khoản <b>1: Admin, 2: Khách, 3: Nhân viên</b></i>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#formthem").hide();
                $("#buttonthem").click(function() {
                    $("#formthem").toggle(500);
                    $("#buttonthem").hide();
                });
            });
        </script>
        <br><br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Loại tài khoản</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody class="body-table-the-loai">
                <?php
                $sql_get_list = "SELECT * FROM account ORDER BY Id ASC";
                if ($db->num_rows($sql_get_list)) {
                    foreach ($db->fetch_assoc($sql_get_list) as $key => $taikhoan) {
                        if (isset($_GET['Id'])) {
                            $idsua = $_GET['Id'];
                            if ($taikhoan['Id'] == $idsua) { ?>
                                <form method="POST" action="xltaikhoan.php">
                                    <tr Id="<?php $taikhoan['Id']; ?>">
                                        <td>1</td>
                                        <td>
                                            <input type="hidden" name="Id" value="<?php echo $taikhoan["Id"]; ?>" />
                                            <?php ?>
                                            <input type="text" name="Loai" class="form-control" value="<?php echo $taikhoan["LoaiTK"]; ?>" />
                                        </td>
                                        <td><input type="text" class="form-control" readonly value="<?php echo $taikhoan["Password"]; ?>"></td>
                                        <td>
                                            <input type="text" name="Email" class="form-control" value="<?php echo $taikhoan["Email"]; ?>" />
                                        </td>
                                        <td><input type="submit" name="Sua" class="btn-cart" value="Cập nhật" /></td>
                                    </tr>
                                </form>
                                <div>
                                    <i>Loại tài khoản <b>1: Admin, 2: Khách, 3: Nhân viên</b></i>
                                </div>
                <?php
                            }
                        } else {
                            echo
                            '
                              <tr Id="' . $taikhoan["Id"] . '" >
                                  <td>' . ($key + 1) . '</td>
                                  <td>' . $taikhoan["Email"] . '</td>
                                  <td>' . $taikhoan["Password"] . '</td>';
                            if ($taikhoan['LoaiTK'] == 1) {
                                echo '<td>Admin</td>';
                            }
                            if ($taikhoan['LoaiTK'] == 2) {
                                echo '<td>Khách</td>';
                            }
                            if ($taikhoan['LoaiTK'] == 3) {
                                echo '<td>Nhân viên</td>';
                            }
                            echo '
                                  <td>
                                      <a class="btn-book" href="taikhoan.php?Id=' . $taikhoan["Id"] . '">Sửa</a>
                                      <a class="btn-book delete" name="Xoa" href="xltaikhoan.php?IdXoa=' . $taikhoan["Id"] . '">Xóa</a>
                                  </td>
                              </tr>
                              ';
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <script>
            function myFunction() {
                let text = "Press a button!\nEither OK or Cancel.";
                if (confirm(text) == true) {
                    text = "You pressed OK!";
                } else {
                    text = "You canceled!";
                }
                document.getElementById("demo").innerHTML = text;
            }
        </script>
    </div>
</div>
<!-- //main -->
<?php
require_once 'layouts/footer.php';
?>