<?php
require_once 'library/init.php';
$title = 'Thông tin khách hàng';
if (isset($_SESSION['id_kh'])) {
    $ID = $_SESSION['id_kh'];
    $sql = "SELECT * FROM $cartName";
    $sql1 = "SELECT COUNT(*) FROM $cartName";
    $cart = $db->fetch_assoc($sql);
    $countcart = implode($db->fetch_assoc($sql1)[0]);
}
if (isset($_SESSION['email'])) {
    $_SESSION['email'] = $email;
    $sql = "SELECT * FROM account WHERE Email='$email'";
    $sql1 = "SELECT COUNT(*) FROM account WHERE Email='$email'";
    $user = $db->fetch_assoc($sql)[0];
    $count = implode($db->fetch_assoc($sql1)[0]);
    if (isset($_POST['Diachi'])) {
        $Ten =  isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
        $DiaChi =  isset($_POST['DiaChi']) ? trim(htmlspecialchars(addslashes($_POST['DiaChi']))) : '';
        $SDT =  isset($_POST['SDT']) ? trim(htmlspecialchars(addslashes($_POST['SDT']))) : '';
        if ($Ten == "" || $DiaChi == "" || $SDT == "") {
            echo '<script>alert("Không được để trống!!!")</script>';
        } else {
            $sql = "UPDATE account SET HoVaTen='$Ten',DiaChi='$DiaChi',SDT='$SDT' WHERE Email='$email'";
            $db->query($sql);
        }
    }
}
