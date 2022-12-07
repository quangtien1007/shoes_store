<?php
// if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
//     $id = $_POST['id'];
//     $img = $_POST['img'];
//     $tensp = $_POST['tensp'];
//     $gia = $_POST['gia'];
//     $sl = 1;

//     //tao mang
//     $sp = array($id, $img, $tensp, $gia, $sl);

//     //ghi len session
//     if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
//     array_push($_SESSION['cart'], $sp);
//     //chuyen trang
//     header('location: list-cart.php');
session_start();
ob_start();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
    $id = $_POST['id'];
    $img = $_POST['img'];
    $tensp = $_POST['tensp'];
    $gia = $_POST['gia'];
    $sl = $_POST['amount'];
    if (isset($_POST['size'])) {
        $size = $_POST['size'];
    }
    $fg = 0;
    // tìm và so sánh sp trong giỏ hàng
    if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
        $i = 0;
        foreach ($_SESSION['cart'] as $sp) {
            if ($sp[0] == $id) {
                //cập nhật mới số lượng
                $sl += $sp[4];
                $fg = 1;
                //cập nhật số lượng mới vào giỏ hàng
                $_SESSION['cart'][$i][4] = $sl;
                break;
            }
            $i++;
        }
    }
    //khi số lượng ban đầu không thay đổi thì thêm mới sp vào giỏ hàng
    if ($fg == 0) {
        $sp = array($id, $img, $tensp, $gia, $sl, $size);
        array_push($_SESSION['cart'], $sp);
    }

    //chuyển trang
    header('location: list-cart.php');
}
