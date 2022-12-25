<?php
require_once "../library/init.php";
if (isset($cartName)) {
    $sql = "SELECT * FROM $cartName";
    $cart = $db->fetch_assoc($sql);
    $sqlCount = "SELECT COUNT(*) FROM $cartName";
    $countCart = $db->fetch_assoc($sqlCount);
    $count = implode($countCart[0]);
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
        if ($count > 0 && count($_SESSION['cart']) > 0) {
            $i = 0;
            foreach ($_SESSION['cart'] as $sp) {
                if ($sp[0] == $id && $sp[5] == $size) {
                    //cập nhật mới số lượng
                    $sl += $sp[4];
                    // $sl += $cart['SoLuong'];
                    $fg = 1;
                    //cập nhật số lượng mới vào giỏ hàng
                    $_SESSION['cart'][$i][4] = $sl;
                    $sql = "UPDATE $cartName SET SoLuong='$sl' WHERE IdSP='$id'";
                    $db->query($sql);
                    break;
                }
                $i++;
            }
        }
        //khi số lượng ban đầu không thay đổi thì thêm mới sp vào giỏ hàng
        if ($fg == 0) {
            $sp = array($id, $img, $tensp, $gia, $sl, $size);
            array_push($_SESSION['cart'], $sp);
            $tt = $gia * $sl;
            $sql = "INSERT INTO $cartName(IdSP, TenSP, Gia, HinhAnh, Size, SoLuong, ThanhTien)
                VALUES ('$id', '$tensp', '$gia', '$img', '$size', '$sl','$tt');
        ";
            $db->query($sql);
        }

        //chuyển trang
        header('location: ../cart.php');
    }
} else {
    header('location: ../admin/login.php');
}
