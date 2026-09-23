<?php

$id = $_GET['id'] ?? null;

$director = Director::get_x_id($id);

if (!$director) {
    echo "Director no encontrado";
    exit;
}

?>

<h1 class="mb-5 text-center fw-bold">
    Editar Director
</h1>

<form
    action="actions/edit_director_acc.php?id=<?= $director->getId(); ?>"
    method="POST"
    enctype="multipart/form-data">

    <!-- Nombre -->
    <div class="mb-3">

        <label class="form-label">Nombre completo</label>

        <input
            type="text"
            name="nombre_completo"
            class="form-control"
            value="<?= $director->getNombreCompleto(); ?>"
            required>

    </div>

    <input type="hidden" name="id" value="<?= $director->getId() ?>">
    <!-- Biografía -->
    <div class="mb-3">

        <label class="form-label">Biografía</label>

        <textarea
            name="biografia"
            rows="6"
            class="form-control"><?= $director->getBiografia(); ?></textarea>

    </div>

    <!-- Foto actual -->
    <div class="mb-3">

        <label class="form-label">Foto actual</label><br>

        <img
            src="../assets/img/<?= $director->getFotoperfil(); ?>"
            style="width:100px;height:100px;object-fit:cover;"
            class="rounded shadow-sm">

    </div>

    <!-- Nueva foto -->
    <div class="mb-4">

        <label class="form-label">Cambiar foto (opcional)</label>

        <input
            type="file"
            name="foto"
            class="form-control"
            accept=".jpg,.jpeg,.png,.webp">

    </div>

    <button class="btn btn-warning">
        Guardar cambios
    </button>

    <a
        href="index.php?sec=admin_directores"
        class="btn btn-secondary">

        Cancelar

    </a>

</form>