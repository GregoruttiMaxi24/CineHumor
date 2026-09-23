<?php

$id = $_GET['id'] ?? 0;

$mensaje = Contacto::contacto_x_id($id);

?>

<h1><?= htmlspecialchars($mensaje->getAsunto()) ?></h1>

<p>

<strong>Nombre:</strong>

<?= htmlspecialchars($mensaje->getNombre()) ?>

</p>

<p>

<strong>Email:</strong>

<?= htmlspecialchars($mensaje->getEmail()) ?>

</p>

<p>

<strong>Fecha:</strong>

<?= htmlspecialchars($mensaje->getFecha()) ?>

</p>

<hr>

<p>

<?= nl2br(htmlspecialchars($mensaje->getMensaje())) ?>

</p>

<a
href="index.php?sec=admin_contacto"
class="btn btn-secondary">

Volver

</a>