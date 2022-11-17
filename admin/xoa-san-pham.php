<?php
    require_once '../library/init.php';
    $Id = $_GET['Id'];
    // Tìm xem có không
    $sql_get_item = "SELECT * FROM sanpham WHERE Id='$Id'";
    if($db->num_rows($sql_get_item)) {
        $Anh1 = $db->fetch_assoc($sql_get_item)[0]['Anh1'];
        $Anh2 = $db->fetch_assoc($sql_get_item)[0]['Anh2'];
        $Anh3 = $db->fetch_assoc($sql_get_item)[0]['Anh3'];
        unlink($Anh1);
        unlink($Anh2);
        unlink($Anh3);
        $sql = "DELETE FROM sanpham WHERE Id='$Id'";
        $db->query($sql);
        $db->close();

        new Redirect("san-pham.php");
    }
?>