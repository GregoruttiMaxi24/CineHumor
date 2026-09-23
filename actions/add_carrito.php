<?php

require_once "../functions/autoload.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {

    Alerta::add_alerta(
        "danger",
        "Película inválida."
    );

    header("Location: ../index.php?sec=catalogo");
    exit;
}

// Verificamos que exista
$pelicula = Pelicula::producto_x_id($id);

if (!$pelicula) {

    Alerta::add_alerta(
        "danger",
        "La película no existe."
    );

    header("Location: ../index.php?sec=catalogo");
    exit;
}

// Crear carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si ya estaba, suma uno
if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]++;
} else {
    $_SESSION['carrito'][$id] = 1;
}

Alerta::add_alerta(
    "success",
    "¡Película añadida al carrito!"
);

header("Location: ../index.php?sec=carrito");
exit;