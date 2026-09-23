<?php

require_once "../../functions/autoload.php";

$id = $_POST['id'] ?? null;

if (!$id) {
    header("Location: ../index.php?sec=admin_director");
    exit;
}

$director = Director::get_x_id((int)$id);

if ($director) {

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "../../assets/directores/" . $foto);

    $director->edit([
        'nombre_completo' => $_POST['nombre_completo'],
        'biografia'       => $_POST['biografia'],
        'foto_perfil'     => $foto
    ]);
}

header("Location: ../index.php?sec=admin_director");
exit;