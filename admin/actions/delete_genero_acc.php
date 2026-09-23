<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? null;

$genero = Genero::get_x_id($id);

if ($genero) {
    $genero->delete();
}

header("Location: ../index.php?sec=admin_genero");
exit;