<?php
session_start();
ob_start();
if (isset($_SESSION['cart'])) {
    if (isset($_GET['id'])) {
        array_splice($_SESSION['cart'], $_GET['id'], 1);
    } else {
        unset($_SESSION['cart']);
    }
    if (count($_SESSION['cart']) > 0) header('location: list-cart.php');
    else header('location: index.php');
} 

// if (isset($_SESSION['cart'])) {
//     unset($_SESSION['cart']);
// }
