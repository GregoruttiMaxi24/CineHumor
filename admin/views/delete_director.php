<?php

$id = $_GET['id'] ?? null;

$director = Director::get_x_id($id);

if (!$director) {
    echo "Director no encontrado";
    exit;
}

?>

<h1 class="mb-4 text-center fw-bold">
    Eliminar Director
</h1>

<div class="alert alert-warning text-center">

    <p>¿Seguro que querés eliminar al director:</p>

    <h4>
        <?= $director->getNombreCompleto(); ?>
    </h4>

</div>

<div class="text-center">

    <a
        href="actions/delete_director_acc.php?id=<?= $director->getId(); ?>"
        class="btn btn-danger">

        Sí, eliminar

    </a>

    <a
        href="index.php?sec=admin_director"
        class="btn btn-secondary">

        Cancelar

    </a>

</div>