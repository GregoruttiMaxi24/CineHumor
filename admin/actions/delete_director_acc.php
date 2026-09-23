<?php

require_once "../../functions/autoload.php";

/* =========================
   ID
========================= */

$id = $_GET['id'] ?? null;

$director = Director::get_x_id($id);

if (!$director) {
    header("Location: ../index.php?sec=admin_director");
    exit;
}

/* =========================
   CONTROL IMPORTANTE
   (evita borrar si está en uso)
========================= */

$peliculas = Pelicula::catalogo_x_director($id);

if (count($peliculas) > 0) {

    
    // Si tiene películas asociadas, no se elimina
    header("Location: ../index.php?sec=admin_directores&error=director_en_uso");
    exit;
}

/* =========================
   DELETE
========================= */

$director->delete();

/* =========================
   REDIRECCIÓN
========================= */

header("Location: ../index.php?sec=admin_director");
exit;