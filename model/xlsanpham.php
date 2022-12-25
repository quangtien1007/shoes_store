<?php
require_once('../library/init.php');
if (isset($_POST['Them'])) {
    // Xử lý các giá trị 
    $Ten = isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
    $MoTa = isset($_POST['MoTa']) ? trim(htmlspecialchars(addslashes($_POST['MoTa']))) : '';
    $Gia = isset($_POST['Gia']) ? trim(htmlspecialchars(addslashes($_POST['Gia']))) : '';
    $TheLoaiId = isset($_POST['TheLoaiId']) ? trim(htmlspecialchars(addslashes($_POST['TheLoaiId']))) : '';
    $SoLuong = isset($_POST['SoLuong']) ? trim(htmlspecialchars(addslashes($_POST['SoLuong']))) : '';
    $brandID = isset($_POST['brandID']) ? trim(htmlspecialchars(addslashes($_POST['brandID']))) : '';

    if ($Ten == "" || $MoTa == "" || $Gia == "" || $SoLuong == "" || $TheLoaiId == "" || $brandID == "") {
        echo '<script>alert("Không được để trống các trường")</script>';
    } else {
        $Anh1 = (new UploadImage('Anh1'))->get_check();
        if ($Anh1 == "0") {
            echo '<script>alert("Ảnh 1 bị lỗi")</script>';
        } else {
            $Anh2 = (new UploadImage('Anh2'))->get_check();
            if ($Anh2 == "0") {
                unlink($Anh1);
                echo '<script>alert("Ảnh 2 bị lỗi")</script>';
            } else {
                $Anh3 = (new UploadImage('Anh3'))->get_check();
                if ($Anh3 == "0") {
                    unlink($Anh2);
                    echo '<script>alert("Ảnh 3 bị lỗi")</script>';
                } else {
                    $sql = "INSERT INTO sanpham (Ten,MoTa,Gia,TheLoaiId,brand_id,SoLuongTon,Anh1,Anh2,Anh3)
                        VALUES ('$Ten', '$MoTa', '$Gia', '$TheLoaiId','$brandID','$SoLuong', '$Anh1', '$Anh2', '$Anh3');";
                    $db->query($sql);
                    new Redirect('../admin/san-pham.php');
                }
            }
        }
        new Redirect('../admin/san-pham.php');
    }
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
    if ($Ten == "" || $MoTa == "" || $Gia == "" || $TheLoaiId == "") {
        echo '<script>alert("Không được để trống các trường")</script>';
        new Redirect("$url");
    } else {
        $Anh1 = (new UploadImage('Anh1'))->get_check();
        if ($Anh1 == "0") {
            echo '<script>alert("Ảnh 1 bị lỗi")</script>';
            new Redirect("$url");
        } else {
            $Anh2 = (new UploadImage('Anh2'))->get_check();
            if ($Anh2 == "0") {
                unlink($Anh1);
                echo '<script>alert("Ảnh 2 bị lỗi")</script>';
                new Redirect("$url");
            } else {
                $Anh3 = (new UploadImage('Anh3'))->get_check();
                if ($Anh3 == "0") {
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
                    unlink("../" . $sanpham['Anh2']);
                    unlink("../" . $sanpham['Anh3']);
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
                    new Redirect('../admin/san-pham.php');
                }
            }
        }
    }
}
