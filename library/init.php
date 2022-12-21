<?php

// Require các thư viện PHP
require_once 'DB.php';
require_once 'Session.php';
require_once 'Function.php';



// Kết nối database
$db = new DB();
$db->connect();
$db->set_char('utf8');

// Thông tin chung
//$_DOMAIN = 'http://localhost/cuoiki/login.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');
$date_current = '';
$date_current = date("Y-m-d H:i:sa");

// Khởi tạo session
$session = new Session();
$session->start();

// Kiểm tra session
if ($session->get() != '') {
    $user = $session->get();
} else {
    $user = '';
}
//Kiem tra da dang nhap hay chua va lay ten bang nguoi dung
if (isset($_SESSION['id_kh'])) {
    $id = $_SESSION["id_kh"];
    $sql = "SELECT Email from account where Id=$id";
    $exec = $db->fetch_assoc($sql)[0];
    $email = $exec["Email"];
    $arr = explode("@", $email, 2);
    $cartName = $arr[0] . '_cart';
}
