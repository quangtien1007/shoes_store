<?php
    require_once '../library/init.php';
    $Id = $_GET['Id'];
    // Tìm xem có không
    $sql_get_item = "SELECT * FROM theloai WHERE Id='$Id'";
    if($db->num_rows($sql_get_item)) {
        $sql = "DELETE FROM theloai WHERE Id='$Id'";
        $db->query($sql);
        $db->close();
        new Redirect("the-loai.php");
    }
?>