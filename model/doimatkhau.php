<?php
require_once('../library/init.php');
$sql = "SELECT Password, Email FROM account WHERE Id='$id'";
$account = $db->fetch_assoc($sql);
if (isset($_POST['DoiMatKhau'])) {
    $oldPass = md5($_POST['oldPass']);
    $newPass = md5($_POST['newPass']);
    $confirmNewPass = md5($_POST['confirmNewPass']);
    $Email = isset($_POST['Email']) ? trim(htmlspecialchars(addslashes($_POST['Email']))) : '';
    if ($Email != $account[0]['Email']) {
        echo '<script>alert("Email không đúng! Vui lòng nhập lại")</script>';
        new Redirect('../nguoidung.php');
    } else if ($oldPass != $account[0]['Password']) {
        echo '<script>alert("Mật khẩu cũ không đúng! Vui lòng nhập lại")</script>';
        new Redirect('../nguoidung.php');
    } else if ($newPass != $confirmNewPass) {
        echo '<script>alert("Mật khẩu xác nhận không đúng! Vui lòng nhập lại ")</script>';
        new Redirect('../nguoidung.php');
    } else {
        $sql = "UPDATE account SET Password='$newPass' WHERE Id='$id'";
        $db->query($sql);
        echo '<script>alert("Đã đổi mật khẩu thành công!!! ")</script>';
        new Redirect('../nguoidung.php');
    }
}
