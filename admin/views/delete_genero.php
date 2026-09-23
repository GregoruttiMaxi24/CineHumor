<?php

$id = $_GET['id'] ?? null;

$genero = Genero::get_x_id($id);

if (!$genero) {
    echo "Género no encontrado";
    exit;
}

?>

<h1 class="text-center mb-4">Eliminar Género</h1>

<p class="text-center">
    ¿Seguro que querés eliminar: <strong><?= $genero->getNombre(); ?></strong>?
</p>

<div class="text-center">

    <a href="actions/delete_genero_acc.php?id=<?= $genero->getId(); ?>"
       class="btn btn-danger">
        Sí, eliminar
    </a>

    <a href="index.php?sec=admin_genero"
       class="btn btn-secondary">
        Cancelar
    </a>

</div>