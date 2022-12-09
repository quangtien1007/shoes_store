<?php
require_once 'library/init.php';
$Id_SP = $_GET['idsp'];
$Id_Cart = $_GET['Id'];
$id = $_SESSION["id_kh"];
$sql = "SELECT Email from account where Id=$id";
$exec = $db->fetch_assoc($sql)[0];
$email = $exec["Email"];
$arr = explode("@", $email, 2);
$cartName = $arr[0] . '_cart';
// Tìm xem có không
$sql_get_item = "SELECT * FROM $cartName WHERE Id='$Id_Cart'";
if ($db->num_rows($sql_get_item)) {
    echo "<script>confirm('Are you sure?'); </script>";
    $sql = "DELETE FROM $cartName WHERE Id='$Id_Cart'";
    $db->query($sql);
    $db->close();

    new Redirect("list-booking.php");
}
