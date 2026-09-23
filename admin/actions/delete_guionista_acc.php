<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? null;

$guionista = Guionista::get_x_id($id);

if (!$guionista) {
    header("Location: ../index.php?sec=admin_guionista");
    exit;
}

$peliculas = Pelicula::catalogo_x_director($id);

if (count($peliculas) > 0) {

    
    // Si tiene películas asociadas, no se elimina
    header("Location: ../index.php?sec=admin_directores&error=director_en_uso");
    exit;
} 
$guionista->delete();

header("Location: ../index.php?sec=admin_guionistas&msg=guionista_eliminado");
exit;