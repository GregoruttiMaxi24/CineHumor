<?php

require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? null;

$animo = Animo::get_x_id($id);

if ($animo) {
    $animo->delete();
}

header("Location: ../index.php?sec=admin_animo");
exit;