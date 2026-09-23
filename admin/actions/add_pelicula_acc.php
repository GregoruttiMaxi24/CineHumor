<?php

require_once "../../functions/autoload.php";

$poster = $_FILES['poster']['name'] ?? '';

if (!empty($_FILES['poster']['tmp_name'])) {
    move_uploaded_file(
        $_FILES['poster']['tmp_name'],
        "../../assets/img/" . $poster
    );
}

$id = Pelicula::insert([
    'titulo' => $_POST['titulo'],
    'director_id' => $_POST['director_id'],
    'guionista_id' => $_POST['guionista_id'],
    'duracion' => $_POST['duracion'],
    'puntaje' => $_POST['puntaje'],
    'estreno' => $_POST['estreno'],
    'productora' => $_POST['productora'],
    'sinopsis' => $_POST['sinopsis'],
    'poster' => $poster,
    'precio' => $_POST['precio']
]);


/* RELACIONES */
if (!empty($_POST['actores'])) {
    foreach ($_POST['actores'] as $actor) {
        Pelicula::add_actor($id, $actor);
    }
}

if (!empty($_POST['generos'])) {
    foreach ($_POST['generos'] as $genero) {
        Pelicula::add_genero($id, $genero);
    }
}

if (!empty($_POST['animos'])) {
    foreach ($_POST['animos'] as $animo) {
        Pelicula::add_animo($id, $animo);
    }
}

header("Location: ../index.php?sec=admin_pelicula");
exit;
return $conexion->lastInsertId();
