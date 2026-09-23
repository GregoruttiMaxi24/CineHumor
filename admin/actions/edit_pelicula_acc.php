<?php

require_once "../../functions/autoload.php";
$id = $_POST['id'];

$pelicula = Pelicula::get_por_id($id);

if (!$pelicula) {
    header("Location: ../index.php?sec=admin_pelicula");
    exit;
}

/* =========================
   POSTER (mantener o cambiar)
========================= */

$poster = $pelicula->getPoster();

if (!empty($_FILES['poster']['name'])) {

    $poster = time() . "_" . $_FILES['poster']['name'];

    move_uploaded_file(
        $_FILES['poster']['tmp_name'],
        "../../assets/img/" . $poster
    );
}

/* =========================
   UPDATE PELICULA
========================= */

$pelicula->edit(
    $_POST['titulo'],
    $_POST['director_id'],
    $_POST['guionista_id'],
    $_POST['duracion'],
    $_POST['puntaje'],
    $_POST['estreno'],
    $_POST['productora'],
    $_POST['sinopsis'],
    $poster,
    $_POST['precio']
);

/* =========================
   RELACIONES (RESET + INSERT)
========================= */

// ACTORES
$pelicula->clear_actores();

if (!empty($_POST['actores'])) {
    foreach ($_POST['actores'] as $actor_id) {
        Pelicula::add_actor($id, $actor_id);
    }
}

// GENEROS
$pelicula->clear_generos();

if (!empty($_POST['generos'])) {
    foreach ($_POST['generos'] as $genero_id) {
        Pelicula::add_genero($id, $genero_id);
    }
}

// ANIMOS
$pelicula->clear_animos();

if (!empty($_POST['animos'])) {
    foreach ($_POST['animos'] as $animo_id) {
        Pelicula::add_animo($id, $animo_id);
    }
}

/* =========================
   REDIRECCION
========================= */

header("Location: ../index.php?sec=admin_pelicula");
exit;