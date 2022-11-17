<?php 
    $title = 'Thể loại';
    require_once 'layouts/header.php'; 
?>
    <!-- main -->
    <div class="main theloai">
        <div class="container">
            <h4 class="label label-primary">Thể loại</h4>
            <a href="them-the-loai.php" class="mb-1 btn btn-info">Thêm thể loại</a>
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
                      if($db->num_rows($sql_get_list)) {
                          foreach ($db->fetch_assoc($sql_get_list) as $key => $theloai) {
                              echo 
                              '
                              <tr Id="'. $theloai["Id"] .'" >
                                  <td>'. ($key + 1) .'</td>
                                  <td>'. $theloai["Ten"] .'</td>
                                  <th>
                                      <a class="btn btn-info" href="sua-the-loai.php?Id='.$theloai["Id"].'">Sửa</a>
                                      <a class="btn btn-danger delete" Id="'. $theloai["Id"] .'" data-href="xoa-the-loai.php?Id='.$theloai["Id"].'">Xóa</a>
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