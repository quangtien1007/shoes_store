<?php
    require_once 'library/init.php';
    $Id = $_GET['Id'];
    // Tìm xem có không
    $sql_get_item = "SELECT * FROM donhang WHERE Id='$Id'";
    if($db->num_rows($sql_get_item)) {
        echo "<script>confirm('Are you sure?'); </script>";
        $sql = "DELETE FROM donhang WHERE Id='$Id'";
        $db->query($sql);
        $db->close();

        new Redirect("list-booking.php");
    }
?>