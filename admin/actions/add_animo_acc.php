<?php

require_once "../../functions/autoload.php";

$nombre = $_POST['nombre'];

Animo::insert($nombre);

header("Location: ../index.php?sec=admin_animo");
exit;