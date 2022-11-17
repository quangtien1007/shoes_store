<?php 
    require_once 'library/init.php';
    if(isset($_GET['Id'])) {
        $get_Id = $_GET['Id'];
        $url = 'edit-booking.php?Id='.$get_Id;
        $sql_get_item = "SELECT * FROM donhang WHERE Id='$get_Id'";
        $donhang = $db->fetch_assoc($sql_get_item)[0];
        $sql_get_theloai = "SELECT * FROM theloai";
        $theloai = $db->fetch_assoc($sql_get_theloai);
    }
    
    if (isset($_POST['Edit'])) {
        // echo 'ok';
        // Xử lý các giá trị 
        $Id = isset($_POST['Id']) ? trim(htmlspecialchars(addslashes($_POST['Id']))) : '';
        $Id_DonHang = isset($_POST['Id_DonHang']) ? trim(htmlspecialchars(addslashes($_POST['Id_DonHang']))) : '';
        $TenSP = isset($_POST['TenSP']) ? trim(htmlspecialchars(addslashes($_POST['TenSP']))) : '';
        $DiaChi = isset($_POST['DiaChi']) ? trim(htmlspecialchars(addslashes($_POST['DiaChi']))) : '';
        $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
        $TenKH = isset($_POST['TenKH']) ? trim(htmlspecialchars(addslashes($_POST['TenKH']))) : '';
        $GhiChu = isset($_POST['GhiChu']) ? trim(htmlspecialchars(addslashes($_POST['GhiChu']))) : '';
        // if($TenSP == "" )|| $DiaChi == "" || $Gia == "" || $TenKH == "")  {
        //     echo '<script>alert("Không được để trống các trường")</script>';
        // }
        if($TenSP == "" )
             echo '<script>alert("Không được để trống tên sản phẩm")</script>';
        else if($TenKH == "" )
             echo '<script>alert("Không được để trống tên KH")</script>';
        else if($Id_DonHang == "" )
             echo '<script>alert("Không được để trống tên IDDH")</script>';
        else if($GhiChu == "" )
             echo '<script>alert("Không được để trống tên sghi chú")</script>';    
        else if($Gia == "" )
             echo '<script>alert("Không được để trống tên giá")</script>'; 
        else if($DiaChi == "" )
             echo '<script>alert("Không được để trống tên dia chi")</script>'; 
        else if($Id == "" )
             echo '<script>alert("Không được để trống Id")</script>'; 
        else{
            $sql = "UPDATE donhang SET Id_DonHang='$Id_DonHang',TenKH='$TenKH',TenSP='$TenSP',DiaChi='$DiaChi',Gia='$Gia',GhiChu='$GhiChu' WHERE Id='$Id'";
                        // $sql = "UPDATE donhang 
                        //         SET Id_DonHang = '$Id_DonHang',
                        //         TenKH = '$TenKH',
                        //         TenSP = '$TenSP',
                        //         DiaChi = '$DiaChi',
                        //         Gia = '$Gia',
                        //         GhiChu = '$GhiChu',
                        //         WHERE Id = '$Id';";
                        $db->query($sql);
                        new Redirect('list-booking.php');
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
            <h4 class="edit-booking" style="font-size: 30px; text-align: center;">Sửa thông tin đơn hàng</h4>
            <form action="edit-booking.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Id" class="form-control" id="Id" value="<?php echo $donhang['Id'] ?>">
            <div class="form-group">
            <input type="hidden" name="Id_DonHang" class="form-control" id="Id_DonHang" value="<?php echo $donhang['Id_DonHang'] ?>">
            </div>
            <div class="form-group">
            <label for="TenKH">Tên khách hàng</label>
            <input type="text" name="TenKH" class="form-control" id="TenKH" value="<?php echo $donhang['TenKH'] ?>" />
            </div>
            <div class="form-group">
            <label for="TenSP">Tên sản phẩm</label>
            <input type="text" class="form-control" name="TenSP" id="TenSP" readonly="readonly" value="<?php echo $donhang['TenSP'] ?>" />
            </div>
            <div class="form-group">
            <label for="Gia">Giá</label>
            <input type="text" name="Gia" class="form-control" id="Gia" readonly="readonly" value="<?php echo $donhang['Gia'] ?>"/>
            </div>
            <div class="form-group">
            <label for="DiaChi">Địa chỉ</label>
            <input type="text" name="DiaChi" class="form-control" id="DiaChi" value="<?php echo $donhang['DiaChi'] ?>"required>
            </div>
            <div class="form-group">
            <label for="GhiChu">Ghi chú</label>
            <input type="text" name="GhiChu" class="form-control" id="GhiChu" value="<?php echo $donhang['GhiChu'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success" name="Edit">Cập nhật</button>
        </form>
        </div>
    </div>
    <!-- //main -->
    <div class="clearfix">
        <br>
    </div>
<?php 
    require_once 'layouts/footer.php'; 
?>