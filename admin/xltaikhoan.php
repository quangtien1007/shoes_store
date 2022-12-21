<?php
require_once '../library/init.php';
if (isset($_POST['Them'])) {
    // $Id = isset($_POST['Id']) ? trim(htmlspecialchars(addslashes($_POST['Id']))) : '';
    $Email = isset($_POST['Email']) ? trim(htmlspecialchars(addslashes($_POST['Email']))) : '';
    $Loai = isset($_POST['Loai']) ? trim(htmlspecialchars(addslashes($_POST['Loai']))) : '';
    $Password = isset($_POST['Password']) ? trim(htmlspecialchars(addslashes($_POST['Password']))) : '';
    if ($Email == "") {
        echo '<script>alert("Không được để trống")</script>';
    } else {
        $sql = "INSERT INTO account (LoaiTK, Password, Email) VALUES ('$Loai','$Password','$Email')";
        $db->query($sql);
        echo '<script>alert("Đã thêm tài khoản thành công")</script>';
        new Redirect("taikhoan.php");
    }
}
if (isset($_POST['Sua'])) {
    // Xử lý các giá trị 
    $Id = isset($_POST['Id']) ? trim(htmlspecialchars(addslashes($_POST['Id']))) : '';
    $Email = isset($_POST['Email']) ? trim(htmlspecialchars(addslashes($_POST['Email']))) : '';
    $Loai = isset($_POST['Loai']) ? trim(htmlspecialchars(addslashes($_POST['Loai']))) : '';
    if ($Email == "") {
        echo '<script>alert("Không được để trống")</script>';
    } else {
        $sql = "UPDATE account
                    SET LoaiTK = '$Loai', Email='$Email' WHERE Id = $Id ;";
        $db->query($sql);
        echo '<script>alert("Đã sửa tài khoản")</script>';
        new Redirect("taikhoan.php");
    }
}
if (isset($_GET['IdXoa'])) {
    // Xử lý các giá trị 
    $Id = $_GET['IdXoa'];
    $sql = "DELETE FROM account WHERE Id='$Id'";
    $db->query($sql);
    echo '<script>alert("Đã xóa tài khoản")</script>';
    new Redirect("taikhoan.php");
}
