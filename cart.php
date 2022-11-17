<?php
$title = 'Giỏ hàng';
if (isset($_GET['Id'])) {
    $san_pham_id = $_GET['Id'];
    $the_loai_id = $_GET['Id'];
    $sql_get_list = "SELECT * FROM sanpham WHERE Id='$san_pham_id'";
    if ($db->num_rows($sql_get_list)) {
        $sanpham = $db->fetch_assoc($sql_get_list)[0];
        $title = $sanpham['Ten'];
    }
}
require_once 'layouts/header.php';
?>
<!-- main -->
<div class="main booking">
    <div class="container">
        <h4 class="label label-primary">Giỏ hàng của bạn</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody class="body-table-san-pham">
                <?php
                $sql_get_list = "SELECT * FROM cart ORDER BY Id ASC";
                if ($db->num_rows($sql_get_list)) {
                    foreach ($db->fetch_assoc($sql_get_list) as $key => $giohang) {
                        echo
                        '
                              <tr Id="' . $giohang["Id"] . '" >
                                  <td>' . ($key + 1) . '</td>
                                  <td>' . $giohang["TenSP"] . '</td>
                                  <td>' . $giohang["Gia"] . '</td>
                                  <th>
                                      <a class="btn btn-info" style ="font-size: 20px;" href="booking.php?Id=' . $sanpham["Id"] . '">Booking <i class="fa-sharp fa-solid fa-cart-arrow-down"></i></a>
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