<?php

require_once "../../functions/autoload.php";

$nombre = $_POST['nombre'];

Genero::insert($nombre);

header("Location: ../index.php?sec=admin_genero");
exit;