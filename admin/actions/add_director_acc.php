<?php

require_once "../../functions/autoload.php";

/* =========================
   DATOS
========================= */

$nombre = $_POST['nombre_completo'];
$biografia = $_POST['biografia'];

/* =========================
   FOTO
========================= */

$foto = $_FILES['foto']['name'];
$tmp  = $_FILES['foto']['tmp_name'];

move_uploaded_file(
    $tmp,
    "../../assets/directores/" . $foto
);

/* =========================
   INSERT (CORREGIDO)
========================= */

Director::insert([
    'nombre_completo' => $nombre,
    'biografia'       => $biografia,
    'foto_perfil'     => $foto
]);

/* =========================
   REDIRECCIÓN
========================= */

header("Location: ../index.php?sec=admin_director");
exit;