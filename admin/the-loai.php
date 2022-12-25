<?php
$title = 'Thể loại';
require_once 'layouts/header.php';

?>
<!-- main -->
<br><br><br><br>
<div class="main theloai">
    <div class="container">
        <br>
        <h2>Thể loại</h2>
        <br>
        <!-- <a href="them-the-loai.php" class="btn-cart">Thêm thể loại</a> -->
        <a id="buttonthem" class="btn-cart">Thêm thể loại</a>
        <br>
        <div id="formthem">
            <form method="post" class="form-inline" action="../model/xltheloai.php">
                <input type="hidden" name="action" value="them">
                <input type="text" name="Ten" placeholder="Nhập tên thể loại">
                <input type="submit" height="20px" name="Them" value="Thêm" class="btn-book">
            </form>
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
        <br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Thể loại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="body-table-the-loai">
                <?php
                $sql_get_list = "SELECT * FROM theloai ORDER BY Id ASC";
                if ($db->num_rows($sql_get_list)) {
                    foreach ($db->fetch_assoc($sql_get_list) as $key => $theloai) {
                        if (isset($_GET['Id'])) {
                            $idsua = $_GET['Id'];
                            if ($theloai['Id'] == $idsua) {
                ?>
                                <form method="POST" action="../model/xltheloai.php">
                                    <tr Id="<?php $theloai['Id']; ?>">
                                        <td>1</td>
                                        <td>
                                            <input type="hidden" name="Id" value="<?php echo $theloai["Id"]; ?>" />
                                            <input type="text" name="Ten" class="form-control" value="<?php echo $theloai["Ten"]; ?>" />
                                            <input type="hidden" name="action" value="capnhat" />
                                        </td>
                                        <td><input type="submit" name="Sua" class="btn-cart" value="Cập nhật" /></td>
                                    </tr>
                                </form>
                <?php
                            }
                        } else {
                            echo
                            '
                              <tr Id="' . $theloai["Id"] . '" >
                                  <td>' . ($key + 1) . '</td>
                                  <td>' . $theloai["Ten"] . '</td>
                                  <td>
                                      <a id="btn-sua" class="btn-book" href="the-loai.php?Id=' . $theloai["Id"] . '">Sửa</a>
                                      <a class="btn-book delete" Id="' . $theloai["Id"] . '" href="xltheloai.php?IdXoa=' . $theloai["Id"] . '">Xóa</a>
                                  </td>
                              </tr>
                              ';
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#formsua").hide();
                $("#btn-sua").click(function() {
                    $("#formthem").toggle(500);
                    $("#buttonthem").hide();
                });
            });
        </script>
    </div>
</div>
<!-- //main -->
<?php
require_once 'layouts/footer.php';
?>