<?php

require_once "../../functions/autoload.php";

$nombre = $_POST['nombre_completo'];
$biografia = $_POST['biografia'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, "../../assets/guionistas/" . $foto);

Guionista::insert($nombre, $biografia, $foto);

header("Location: ../index.php?sec=admin_guionistas");
exit;