<?php

$id = $_GET['id'] ?? false;

$actor = Actor::get_por_id($id);

if (!$actor) {
    echo "<h2>El actor no existe.</h2>";
    return;
}

?>

<div class="container py-5">

    <h1 class="mb-5 text-center fw-bold">
        Editar Actor
    </h1>

    <form
        action="actions/edit_actor_acc.php?id=<?= $actor->getId() ?>"
        method="POST"
        enctype="multipart/form-data">

        <!-- Nombre -->
        <div class="mb-3">

            <label class="form-label">
                Nombre completo
            </label>

            <input
                type="text"
                name="nombre_completo"
                class="form-control"
                value="<?= htmlspecialchars($actor->getNombreCompleto()) ?>"
                required>

        </div>

        <!-- Biografía -->
        <div class="mb-3">

            <label class="form-label">
                Biografía
            </label>

            <textarea
                name="biografia"
                rows="6"
                class="form-control"><?= htmlspecialchars($actor->getBiografia()) ?></textarea>

        </div>

        <!-- Imagen actual -->
        <div class="mb-3">

            <label class="form-label">
                Foto actual
            </label>

            <br>

            <img
                src="../assets/img/<?= $actor->getFotoPerfil() ?>"
                class="rounded shadow"
                style="width:150px">

        </div>

        <!-- Nueva imagen -->
        <div class="mb-4">

            <label class="form-label">
                Nueva foto (opcional)
            </label>

            <input
                type="file"
                name="foto"
                class="form-control"
                accept=".jpg,.jpeg,.png,.webp">

        </div>

        <button
            class="btn btn-success">

            Guardar cambios

        </button>

        <a
            href="index.php?sec=admin_actor"
            class="btn btn-secondary">

            Cancelar

        </a>

    </form>

</div>