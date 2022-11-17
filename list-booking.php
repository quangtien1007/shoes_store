<?php
require_once 'library/init.php';
$title = 'Danh sách đơn hàng';
$user = "SELECT * FROM brand WHERE Id = '$get_Id'";
if ($db->num_rows($user)) {
    $username = $db->fetch_assoc($user)[0]['HoVaTen'];
}
require_once 'layouts/header.php';
?>
<!-- main -->
<div class="main booking">
    <div class="container">
        <h4 class="label label-primary">Đơn hàng của bạn</h4>
        <h3 class="label label-info">Tai khoan <?php echo $username; ?></h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Tên khách hàng</th>
                    <th>Giá</th>
                    <th>Địa chỉ</th>
                    <th>Ghi chú</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="body-table-san-pham">
                <?php
                $sql_get_list = "SELECT * FROM donhang ORDER BY Id ASC";
                if ($db->num_rows($sql_get_list)) {
                    foreach ($db->fetch_assoc($sql_get_list) as $key => $donhang) {
                        echo
                        '
                              <tr Id="' . $donhang["Id"] . '" >
                                  <td>' . ($key + 1) . '</td>
                                  <td>' . $donhang["TenSP"] . '</td>
                                  <td>' . $donhang["TenKH"] . '</td>
                                  <td>' . $donhang["Gia"] . '</td>
                                  <td>' . $donhang["DiaChi"] . '</td>
                                  <td>' . $donhang["GhiChu"] . '</td>
                                  <th>
                                      <a class="btn btn-info" href="edit-booking.php?Id=' . $donhang["Id"] . '">Sửa</a> 
                                      <a class="btn btn-danger delete" Id="' . $donhang["Id"] . '"href="delete-booking.php?Id=' . $donhang["Id"] . '">Xóa</a>
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
require_once 'layouts/footer.php';
?>