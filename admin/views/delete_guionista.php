<?php

$id = $_GET['id'] ?? null;

$guionista = Guionista::get_x_id($id);

if (!$guionista) {
    echo "Guionista no encontrado";
    exit;
}

?>

<h1 class="mb-4 text-center fw-bold">
    Eliminar Guionista
</h1>

<div class="alert alert-warning text-center">

    <p>¿Seguro que querés eliminar al guionista?</p>

    <h4>
        <?= $guionista->getNombre_completo(); ?>
    </h4>

</div>

<div class="text-center">

    <a
        href="actions/delete_guionista_acc.php?id=<?= $guionista->getId(); ?>"
        class="btn btn-danger">

        Sí, eliminar

    </a>

    <a
        href="index.php?sec=admin_guionistas"
        class="btn btn-secondary">

        Cancelar

    </a>

</div>