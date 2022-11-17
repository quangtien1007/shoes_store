<?php 
    $title = 'Sản phẩm';
    require_once 'layouts/header.php'; 
?>
    <!-- main -->
    <div class="main sanpham">
        <div class="container">
            <h4 class="label label-primary">Sản phẩm</h4>
            <a href="them-san-pham.php" class="mb-1 btn btn-info">Thêm Sản phẩm</a>
            <div class="form-group">
                  <input type="text" name="noidung" class="form-control" id="noidung" placeholder="Tìm sản phẩm">
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>MoTa</th>
                    <th>Gia</th>
                    <th>Ảnh</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody class="body-table-san-pham">
                <?php
                      $sql_get_list = "SELECT * FROM sanpham ORDER BY Id ASC";
                      if($db->num_rows($sql_get_list)) {
                          foreach ($db->fetch_assoc($sql_get_list) as $key => $sanpham) {
                              echo 
                              '
                              <tr Id="'. $sanpham["Id"] .'" >
                                  <td>'. ($key + 1) .'</td>
                                  <td>'. $sanpham["Ten"] .'</td>
                                  <td>'. $sanpham["MoTa"] .'</td>
                                  <td>'. $sanpham["Gia"] .'</td>
                                  <td>
                                    <img width="120px" height="100px" src="../'. $sanpham["Anh1"] .'">
                                    <img width="120px" height="100px" src="../'. $sanpham["Anh2"] .'">
                                    <img width="120px" height="100px" src="../'. $sanpham["Anh3"] .'">
                                  </td>
                                  <th>
                                      <a class="btn btn-info" href="sua-san-pham.php?Id='.$sanpham["Id"].'">Sửa</a>
                                      <a class="btn btn-danger delete" Id="'. $sanpham["Id"] .'" data-href="xoa-san-pham.php?Id='.$sanpham["Id"].'">Xóa</a>
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