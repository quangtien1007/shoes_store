<?php
session_start();
unset($_SESSION["id_kh"]);
unset($_SESSION["cart"]);
header('location: ../index.php');
