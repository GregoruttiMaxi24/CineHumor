<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? false;

$actor = Actor::get_por_id($id);

if (!$actor) {

    header("Location: ../index.php?sec=admin_actor");
    exit;

}

/* =========================
   BORRAR FOTO
========================= */

if ($actor->getFotoPerfil()) {

    $ruta = "../../assets/img/" . $actor->getFotoPerfil();

    if (file_exists($ruta)) {
        unlink($ruta);
    }
}

/* =========================
   ELIMINAR REGISTRO
========================= */

$actor->delete();

/* =========================
   REDIRECCIÓN
========================= */

header("Location: ../index.php?sec=admin_actor");
exit;