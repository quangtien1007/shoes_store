<?php
require_once "../library/init.php";
// if (isset($_SESSION['cart'])) {
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //array_splice($_SESSION['cart'], $_GET['id'], 1);
    $sql = "DELETE FROM $cartName WHERE Id='$id'";
    $db->query($sql);
} else {
    unset($_SESSION['cart']);
}
if (count($_SESSION['cart']) > 0) header('location: ../cart.php');
else header('location: ../index.php');
// } 

// if (isset($_SESSION['cart'])) {
//     unset($_SESSION['cart']);
// }
