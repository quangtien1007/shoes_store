<?php
require_once 'library/init.php';
$Id_DH = $_GET['IdDH'];
$Id_Cart = $_GET['Id'];
$id = $_SESSION["id_kh"];
$sql = "SELECT Email from account where Id=$id";
$exec = $db->fetch_assoc($sql)[0];
$email = $exec["Email"];
$arr = explode("@", $email, 2);
$cartName = $arr[0] . '_cart';
// Tìm xem có không
$sql_cart = "SELECT * FROM $cartName WHERE Id='$Id_Cart'";
$sql_donhang = "SELECT * FROM $cartName WHERE Id='$Id_Cart'";
if ($db->num_rows($sql_cart) && $db->num_rows($sql_donhang)) {
    echo "<script>confirm('Are you sure?'); </script>";
    $sql_delete_cart = "DELETE FROM $cartName WHERE Id='$Id_Cart'";
    $sql_delete_donhang = "DELETE FROM $cartName WHERE Id='$Id_DH'";
    $db->query($sql_delete_cart);
    $db->query($sql_delete_donhang);
    $db->close();

    new Redirect("cart.php");
}
