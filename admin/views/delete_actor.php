<?php

$id = $_GET['id'] ?? false;

$actor = Actor::get_por_id($id);

if (!$actor) {
    echo "<h2>Actor no encontrado</h2>";
    return;
}

?>

<div class="container py-5 text-center">

    <h1 class="mb-4 fw-bold">
        Eliminar Actor
    </h1>

    <p class="mb-5">
        ¿Seguro que querés eliminar a
        <strong><?= htmlspecialchars($actor->getNombreCompleto()) ?></strong>?
    </p>

    <a
        href="actions/delete_actor_acc.php?id=<?= $actor->getId() ?>"
        class="btn btn-danger">

        Sí, eliminar

    </a>

    <a
        href="index.php?sec=admin_actor"
        class="btn btn-secondary">

        Cancelar

    </a>

</div>