<?php

require_once "../../functions/autoload.php";

/* =========================
   ID DEL ACTOR
========================= */

$id = $_GET['id'] ?? false;

$actor = Actor::get_por_id($id);

if (!$actor) {

    header("Location: ../index.php?sec=admin_actor");
    exit;

}

/* =========================
   DATOS DEL FORMULARIO
========================= */

$nombre = $_POST['nombre_completo'];
$biografia = $_POST['biografia'];

/* =========================
   FOTO
========================= */

$foto_actual = $actor->getFotoPerfil();

/* Si suben una nueva imagen */
if (!empty($_FILES['foto']['name'])) {

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "../../assets/actores/" . $foto
    );

    /* borrar la anterior */
    if ($foto_actual && file_exists("../../assets/actores/" . $foto_actual)) {
        unlink("../../assets/actores/" . $foto_actual);
    }

} else {

    /* mantener la actual */
    $foto = $foto_actual;
}

/* =========================
   UPDATE
========================= */

$actor->edit([

    'nombre_completo' => $nombre,
    'biografia' => $biografia,
    'foto_perfil' => $foto

]);

/* =========================
   REDIRECCIÓN
========================= */

header("Location: ../index.php?sec=admin_actor");
exit;