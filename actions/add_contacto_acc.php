<?php

require_once "../functions/autoload.php";

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$asunto = trim($_POST['asunto'] ?? '');
$mensaje = trim($_POST['mensaje'] ?? '');

if (
    empty($nombre) ||
    empty($email) ||
    empty($asunto) ||
    empty($mensaje)
) {

    Alerta::add_alerta(
        "danger",
        "Debe completar todos los campos."
    );

    header("Location: ../index.php?sec=contacto");
    exit;
}

Contacto::crear(
    $nombre,
    $email,
    $asunto,
    $mensaje
);

Alerta::add_alerta(
    "success",
    "¡Mensaje enviado correctamente!"
);

header("Location: ../index.php?sec=contacto");
exit;