<?php
require_once('../library/init.php');
if (isset($_POST['Them'])) {
    // echo 'ok';
    // Xử lý các giá trị 
    $Ten = isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
    if ($Ten == "") {
        echo '<script>alert("Không được để trống tên")</script>';
    } else {
        $sql = "INSERT INTO theloai (Ten)
            VALUES ('$Ten');";
        $db->query($sql);
        new Redirect('the-loai.php');
    }
}
if (isset($_GET['Id'])) {
    $get_Id = $_GET['Id'];
    $url = 'sua-the-loai.php?Id=' . $get_Id;
    $sql_get_item = "SELECT * FROM theloai WHERE Id='$get_Id'";
    $theloai = $db->fetch_assoc($sql_get_item)[0];
}
if (isset($_POST['Sua'])) {
    // Xử lý các giá trị 
    $Ten = isset($_POST['Ten']) ? trim(htmlspecialchars(addslashes($_POST['Ten']))) : '';
    $Id = isset($_POST['Id']) ? trim(htmlspecialchars(addslashes($_POST['Id']))) : '';
    $url = isset($_POST['url']) ? trim(htmlspecialchars(addslashes($_POST['url']))) : '';
    if ($Ten == "") {
        echo '<script>alert("Không được để trống")</script>';
        new Redirect("$url");
    } else {
        $sql = "UPDATE theloai
                    SET Ten = '$Ten'
                    WHERE Id = '$Id';";
        $db->query($sql);
        new Redirect("the-loai.php");
    }
}
if (isset($_GET['IdXoa'])) {
    $Id = $_GET['IdXoa'];
    $sql = "DELETE FROM theloai WHERE Id='$Id'";
    $db->query($sql);
    new Redirect("the-loai.php");
    echo '<script>alert("Đã xóa thể loại")</script>';
}
