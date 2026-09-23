<?php

$id = $_GET['id'] ?? null;

$pelicula = Pelicula::get_por_id($id);

if (!$pelicula) {
    echo "Película no encontrada";
    exit;
}

$directores = Director::listado_completo();
$guionistas = Guionista::listado_completo();
$actores     = Actor::listado_completo();
$generos     = Genero::listado_completo();
$animos      = Animo::listado_completo();

$actores_sel = $pelicula->getActoresIds();
$generos_sel = $pelicula->getGenerosIds();
$animos_sel  = $pelicula->getAnimosIds();

?>

<div class="container p-5">

    <h1 class="mb-4 text-center fw-bold">Editar Película</h1>

    <form action="actions/edit_pelicula_acc.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $pelicula->getId() ?>">

        <!-- TÍTULO -->
        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control"
                   value="<?= htmlspecialchars($pelicula->getTitulo()) ?>">
        </div>

        <!-- DURACIÓN -->
        <div class="mb-3">
            <label>Duración (minutos)</label>
            <input type="number" name="duracion" class="form-control"
                   value="<?= $pelicula->getDuracion() ?>">
        </div>

        <!-- PUNTAJE -->
        <div class="mb-3">
            <label>Puntaje</label>
            <input type="number" step="0.1" name="puntaje" class="form-control"
                   value="<?= $pelicula->getPuntaje() ?>">
        </div>

        <!-- ESTRENO -->
        <div class="mb-3">
            <label>Estreno</label>
            <input type="date" name="estreno" class="form-control"
                   value="<?= $pelicula->getEstreno() ?>">
        </div>

        <!-- PRODUCTORA -->
        <div class="mb-3">
            <label>Productora</label>
            <input type="text" name="productora" class="form-control"
                   value="<?= htmlspecialchars($pelicula->getProductora()) ?>">
        </div>

        <!-- SINOPSIS -->
        <div class="mb-3">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" rows="4"><?= htmlspecialchars($pelicula->getSinopsis()) ?></textarea>
        </div>

        <!-- POSTER -->
        <div class="mb-3">
            <label>Poster (dejar vacío para mantener el actual)</label>
            <input type="file" name="poster" class="form-control">
            <small>Actual: <?= $pelicula->getPoster() ?></small>
        </div>

        <!-- PRECIO -->
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control"
                   value="<?= $pelicula->getPrecio() ?>">
        </div>

        <hr>

        <!-- DIRECTOR -->
        <div class="mb-3">
            <label>Director</label>
            <select name="director_id" class="form-control">
                <?php foreach ($directores as $D) { ?>
                    <option value="<?= $D->getId() ?>"
                        <?= $pelicula->getDirector()->getId() == $D->getId() ? 'selected' : '' ?>>
                        <?= $D->getNombreCompleto() ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- GUIONISTA -->
        <div class="mb-3">
            <label>Guionista</label>
            <select name="guionista_id" class="form-control">
                <?php foreach ($guionistas as $G) { ?>
                    <option value="<?= $G->getId() ?>"
                        <?= $pelicula->getGuionista()->getId() == $G->getId() ? 'selected' : '' ?>>
                        <?= $G->getNombre_completo() ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- ACTORES -->
        <div class="mb-3">
            <label>Actores</label>
            <?php foreach ($actores as $A) { ?>
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="actores[]"
                           value="<?= $A->getId() ?>"
                           <?= in_array($A->getId(), $actores_sel) ? 'checked' : '' ?>>

                    <label class="form-check-label">
                        <?= $A->getNombreCompleto() ?>
                    </label>
                </div>
            <?php } ?>
        </div>

        <!-- GÉNEROS -->
        <div class="mb-3">
            <label>Géneros</label>
            <?php foreach ($generos as $G) { ?>
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="generos[]"
                           value="<?= $G->getId() ?>"
                           <?= in_array($G->getId(), $generos_sel) ? 'checked' : '' ?>>

                    <label class="form-check-label">
                        <?= $G->getNombre() ?>
                    </label>
                </div>
            <?php } ?>
        </div>

        <!-- ANIMOS -->
        <div class="mb-3">
            <label>Estados de ánimo</label>
            <?php foreach ($animos as $A) { ?>
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="animos[]"
                           value="<?= $A->getId() ?>"
                           <?= in_array($A->getId(), $animos_sel) ? 'checked' : '' ?>>

                    <label class="form-check-label">
                        <?= $A->getNombre() ?>
                    </label>
                </div>
            <?php } ?>
        </div>

        <button class="btn btn-primary w-100 mt-3">
            Guardar cambios
        </button>

    </form>

</div>