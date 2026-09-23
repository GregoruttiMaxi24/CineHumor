<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? null;

$pelicula = Pelicula::get_por_id($id);

if (!$pelicula) {
    header("Location: ../index.php?sec=admin_pelicula");
    exit;
}

/* =========================
   1. BORRAR RELACIONES
========================= */

$pelicula->clear_actores();
$pelicula->clear_generos();
$pelicula->clear_animos();

/* =========================
   2. BORRAR IMAGEN (poster)
========================= */

if ($pelicula->getPoster()) {

    $ruta = "../../assets/img/" . $pelicula->getPoster();

    if (file_exists($ruta)) {
        unlink($ruta);
    }
}

/* =========================
   3. BORRAR PELÍCULA
========================= */

$pelicula->delete();

/* =========================
   REDIRECCIÓN
========================= */

header("Location: ../index.php?sec=admin_pelicula");
exit;