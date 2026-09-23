<?php


$id = $_GET['id'] ?? null;

if ($id && isset($_SESSION['carrito'][$id])) {
    unset($_SESSION['carrito'][$id]);
}

header("Location: ../index.php?sec=carrito");
exit;