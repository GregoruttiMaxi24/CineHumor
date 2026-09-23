<?php

$id = $_GET['id'] ?? null;

$animo = Animo::get_x_id($id);

if (!$animo) {
    echo "Estado de ánimo no encontrado";
    exit;
}

?>

<h1 class="text-center mb-4">Eliminar Estado de Ánimo</h1>

<p class="text-center">
    ¿Seguro que querés eliminar: <strong><?= $animo->getNombre(); ?></strong>?
</p>

<div class="text-center">

    <a href="actions/delete_animo_acc.php?id=<?= $animo->getId(); ?>"
       class="btn btn-danger">
        Sí, eliminar
    </a>

    <a href="index.php?sec=admin_animo"
       class="btn btn-secondary">
        Cancelar
    </a>

</div>