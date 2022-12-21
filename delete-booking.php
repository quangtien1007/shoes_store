<?php
require_once 'library/init.php';
//$Id_DH = $_GET['IdDH'];
// $id = $_SESSION["id_kh"];
// $sql = "SELECT Email from account where Id=$id";
// $exec = $db->fetch_assoc($sql)[0];
// $email = $exec["Email"];
// $arr = explode("@", $email, 2);
// $cartName = $arr[0] . '_cart';
// Tìm xem có không
//$sql_cart = "SELECT * FROM $cartName WHERE Id='$Id_Cart'";
$Id = $_GET['Id'];
$sql_donhang = "SELECT * FROM donhang WHERE Id='$Id'";
if ($db->num_rows($sql_donhang)) {
    echo "<script>confirm('Are you sure?'); </script>";
    $sql_delete = "DELETE FROM donhang WHERE Id='$Id'";
    $db->query($sql_delete);
    $db->close();

    new Redirect("orders.php");
}
