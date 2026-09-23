<?php

$id = $_GET['id'] ?? null;

$pelicula = Pelicula::get_por_id($id);

if (!$pelicula) {
    echo "Película no encontrada";
    exit;
}

?>

<h1>Eliminar Película</h1>

<p>¿Seguro que querés eliminar: <strong><?= $pelicula->getTitulo() ?></strong>?</p>

<a href="actions/delete_pelicula_acc.php?id=<?= $pelicula->getId() ?>"
   class="btn btn-danger">
   Sí, eliminar
</a>

<a href="index.php?sec=admin_pelicula"
   class="btn btn-secondary">
   Cancelar
</a>