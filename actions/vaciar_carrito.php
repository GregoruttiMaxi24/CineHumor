<?php

require_once "../functions/autoload.php";

unset($_SESSION['carrito']);

Alerta::add_alerta(
    "success",
    "Carrito vaciado correctamente."
);

header("Location: ../index.php?sec=carrito");
exit;