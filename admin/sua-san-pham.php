<?php 
    require_once '../library/init.php';
    if(isset($_GET['Id'])) {
        $get_Id = $_GET['Id'];
        $url = 'sua-san-pham.php?Id='.$get_Id;
        $sql_get_item = "SELECT * FROM sanpham WHERE Id='$get_Id'";
        $sanpham = $db->fetch_assoc($sql_get_item)[0];
        $sql_get_theloai = "SELECT * FROM theloai";
        $theloai = $db->fetch_assoc($sql_get_theloai);
    }
    
    if (isset($_POST['Sua'])) {
        // echo 'ok';
        // Xử lý các giá trị 
        $Ten = isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
        $MoTa = isset($_POST['MoTa']) ? trim(htmlspecialchars(addslashes($_POST['MoTa']))) : '';
        $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
        $TheLoaiId = isset($_POST['TheLoaiId']) ? trim(htmlspecialchars(addslashes($_POST['TheLoaiId']))) : '';
        $Id = isset($_POST['Id']) ? trim(htmlspecialchars(addslashes($_POST['Id']))) : '';
        $url = isset($_POST['url']) ? trim(htmlspecialchars(addslashes($_POST['url']))) : '';
        if($Ten == "" || $MoTa == "" || $Gia == "" || $TheLoaiId == "") {
            echo '<script>alert("Không được để trống các trường")</script>';
            new Redirect("$url");
        } else {
            $Anh1 = (new UploadImage('Anh1'))->get_check();
            if($Anh1 == "0") {
                echo '<script>alert("Ảnh 1 bị lỗi")</script>';
                new Redirect("$url");
            } else {
                $Anh2 = (new UploadImage('Anh2'))->get_check();
                if($Anh2 == "0") {
                    unlink($Anh1);
                    echo '<script>alert("Ảnh 2 bị lỗi")</script>';
                    new Redirect("$url");
                } else {
                    $Anh3 = (new UploadImage('Anh3'))->get_check();
                    if($Anh3 == "0") {
                        unlink($Anh2);
                        echo '<script>alert("Ảnh 3 bị lỗi")</script>';
                        new Redirect("$url");
                    } else {
                        // var_dump($Anh1, $Anh2, $Anh3);
                        $sql_get_item = "SELECT * FROM sanpham WHERE Id='$Id'";
                        $sanpham = $db->fetch_assoc($sql_get_item)[0];
                        // var_dump($sanpham['Anh1']);
                        // Xóa file ảnh đã lưu trước đó ở bộ nhớ
                        unlink("../" . $sanpham['Anh1']);
                        unlink("../" .$sanpham['Anh2']);
                        unlink("../" .$sanpham['Anh3']);
                        // var_dump(unlink("../" . $sanpham['Anh1']));
                        $sql = "UPDATE sanpham 
                                SET Ten = '$Ten',
                                MoTa = '$MoTa',
                                Gia = '$Gia',
                                TheLoaiId = '$TheLoaiId',
                                Anh1 = '$Anh1',
                                Anh2 = '$Anh2',
                                Anh3 = '$Anh3' 
                                WHERE Id = '$Id';";
                        // var_dump($sql);
                        $db->query($sql);
                        new Redirect('san-pham.php');
                    }
                }
            }
        }
    }
?>

<?php 
    $title = 'Sửa sản phẩm';
    require_once 'layouts/header.php'; 
?>
    <!-- main -->
    <div class="main theloai">
        <div class="container">
            <h4 class="label label-primary">Sửa sản phẩm</h4>
            <form action="sua-san-pham.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="Ten">Tên</label>
                  <input type="text" name="Ten" class="form-control" id="Ten" value="<?php echo $sanpham['Ten'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="MoTa">Mô tả</label>
                  <textarea  class="form-control" name="MoTa" id="MoTa" required><?php echo $sanpham['MoTa'] ?></textarea>
                </div>
                <div class="form-group">
                  <label for="Gia">Giá</label>
                  <input type="text" name="Gia" class="form-control" id="Gia" value="<?php echo $sanpham['Gia'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="TheLoaiId">Thể loại</label>
                    <select class="form-control" id="TheLoaiId" name="TheLoaiId">
                    <?php 
                        for($i = 0; $i < count($theloai); $i++) {
                            if($sanpham['TheLoaiId'] == $theloai[$i]['Id']) {
                                echo '<option selected value="'.$theloai[$i]['Id'].'">'. $theloai[$i]['Ten'] .'</option>';
                            } else {
                                echo '<option value="'.$theloai[$i]['Id'].'">'. $theloai[$i]['Ten'] .'</option>';
                            }
                        }
                    ?>  
                    </select>
                </div>
                <div class="form-group">
                  <label for="Anh1">Ảnh 1</label>
                  <input type="file" name="Anh1" class="form-control" id="Anh1" required>
                </div>
                <div class="form-group">
                  <label for="Anh2">Ảnh 2</label>
                  <input type="file" name="Anh2" class="form-control" id="Anh2" required>
                </div>
                <div class="form-group">
                  <label for="Anh3">Ảnh 3</label>
                  <input type="file" name="Anh3" class="form-control" id="Anh3" required>
                </div>
                <input type="hidden" name="Id" value="<?php echo $sanpham['Id'] ?>">
                <input type="hidden" name="url" value="<?php echo $url ?>">
                <button type="submit" class="btn btn-default" name="Sua">Sửa</button>
              </form>
        </div>
    </div>
    <!-- //main -->
<?php 
    require_once 'layouts/footer.php'; 
?>