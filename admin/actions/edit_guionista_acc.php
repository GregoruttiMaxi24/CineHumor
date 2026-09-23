<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'];

$guionista = Guionista::get_x_id($id);

$nombre = $_POST['nombre_completo'];
$biografia = $_POST['biografia'];

$foto = $guionista->getFoto_perfil();

if (!empty($_FILES['foto']['name'])) {

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    move_uploaded_file($tmp, "../../assets/guionistas/" . $foto);
}

$guionista->edit($nombre, $biografia, $foto);

header("Location: ../index.php?sec=admin_guionistas");
exit;