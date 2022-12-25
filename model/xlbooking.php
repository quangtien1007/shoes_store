<?php
require_once('../library/init.php');
if (isset($_POST['Booking'])) {
    $ID_KH = $_SESSION['id_kh'];
    // Xử lý các giá trị 
    $TrangThai = 1;
    $VanChuyen = 1;
    $NgayDat = $date_current;
    $Id_DonHang = isset($_POST['Id_DonHang']) ? trim(htmlspecialchars(addslashes($_POST['Id_DonHang']))) : '';
    $TenSP = isset($_POST['TenSP']) ? trim(htmlspecialchars(addslashes($_POST['TenSP']))) : '';
    $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
    $TenKH = isset($_POST['TenKH']) ? trim(htmlspecialchars(addslashes($_POST['TenKH']))) : '';
    $ThanhTien = isset($_POST['ThanhTien']) ? trim(htmlspecialchars(addslashes($_POST['ThanhTien']))) : '';
    $Size = isset($_POST['Size']) ? trim(htmlspecialchars(addslashes($_POST['Size']))) : '';
    $SoLuong = isset($_POST['SoLuong']) ? trim(htmlspecialchars(addslashes($_POST['SoLuong']))) : '';
    $HinhAnh = isset($_POST['HinhAnh']) ? trim(htmlspecialchars(addslashes($_POST['HinhAnh']))) : '';
    $DiaChi = isset($_POST['DiaChi']) ? trim(htmlspecialchars(addslashes($_POST['DiaChi']))) : '';
    $GhiChu = isset($_POST['GhiChu']) ? trim(htmlspecialchars(addslashes($_POST['GhiChu']))) : '';
    if ($TenSP == "" || $DiaChi == "" || $Gia == "" || $TenKH == "") {
        echo '<script>alert("Không được để trống các trường")</script>';
    } else {
        $sql1 = "INSERT INTO $cartName (IdSP,TenSP ,Gia, HinhAnh, Size, SoLuong, ThanhTien)
    VALUES ('$Id_DonHang','$TenSP','$Gia','$HinhAnh', '$Size','$SoLuong','$ThanhTien');";
        $db->query($sql1);
        $sql = "INSERT INTO `donhang` (`Id_SanPham`, `Id_KhachHang`,`TenKH`, `TenSP`,`Size`, `SoLuong`, `DiaChi`, `Gia`, `ThanhTien`,`GhiChu`,`TrangThai`,`VanChuyen`,`NgayDat`,`HinhAnh`)
    VALUES ('$Id_DonHang','$ID_KH','$TenKH','$TenSP', '$Size','$SoLuong','$DiaChi', '$Gia','$ThanhTien','$GhiChu','$TrangThai','$VanChuyen','$NgayDat','$HinhAnh');";
        $db->query($sql);
        $sqlUpdateSL = "UPDATE sanpham SET SoLuongTon = SoLuongTon - '$SoLuong' WHERE Id='$Id_DonHang'";
        $db->query($sqlUpdateSL);
        new Redirect("../orders.php");
    }
}

if (isset($_POST['Edit'])) {
    // echo 'ok';
    // Xử lý các giá trị 
    $Id = isset($_POST['Id']) ? trim(htmlspecialchars(addslashes($_POST['Id']))) : '';
    $Id_DonHang = isset($_POST['Id_DonHang']) ? trim(htmlspecialchars(addslashes($_POST['Id_DonHang']))) : '';
    $TenSP = isset($_POST['TenSP']) ? trim(htmlspecialchars(addslashes($_POST['TenSP']))) : '';
    $DiaChi = isset($_POST['DiaChi']) ? trim(htmlspecialchars(addslashes($_POST['DiaChi']))) : '';
    $GhiChu = isset($_POST['GhiChu']) ? trim(htmlspecialchars(addslashes($_POST['GhiChu']))) : '';
    $SoLuong = isset($_POST['SoLuong']) ? trim(htmlspecialchars(addslashes($_POST['SoLuong']))) : '';;
    $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
    $Size = isset($_POST['Size']) ? trim(htmlspecialchars(addslashes($_POST['Size']))) : '';
    $GhiChu = isset($_POST['GhiChu']) ? trim(htmlspecialchars(addslashes($_POST['GhiChu']))) : '';
    //$cartName1 = isset($_POST['cartName']) ? trim(htmlspecialchars(addslashes($_POST['cartName']))) : '';
    if ($SoLuong == "")
        echo '<script>alert("Không được để trống tên số lượng")</script>';
    else if ($Size == "")
        echo '<script>alert("Không được để trống tên size")</script>';
    else if ($DiaChi == "")
        echo '<script>alert("Không được để trống tên địa chỉ")</script>';
    else if ($GhiChu == "")
        echo '<script>alert("Không được để trống ghi chú")</script>';
    else {
        //$updateCart = "UPDATE $cartName1 SET Size='$Size', DiaChi='$DiaChi', SoLuong='$SoLuong' WHERE Id = '$Id'";
        $updateDonhang = "UPDATE donhang SET Size='$Size', SoLuong='$SoLuong', DiaChi='$DiaChi', GhiChu='$GhiChu' WHERE Id = $Id";
        //$db->query($updateCart);
        $db->query($updateDonhang);
        new Redirect('../orders.php');
    }
}
