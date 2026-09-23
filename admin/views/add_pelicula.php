<?php
$directores = Director::listado_completo();
$guionistas = Guionista::listado_completo();
$actores    = Actor::listado_completo();
$generos    = Genero::listado_completo();
$animos     = Animo::listado_completo();
?>

<div class="container p-5">

    <h1 class="mb-4 text-center fw-bold">Agregar Película</h1>

    <form action="actions/add_pelicula_acc.php" method="POST" enctype="multipart/form-data">

        <!-- TÍTULO -->
        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <!-- DURACIÓN -->
        <div class="mb-3">
            <label>Duración (minutos)</label>
            <input type="number" name="duracion" class="form-control" required>
        </div>

        <!-- PUNTAJE -->
        <div class="mb-3">
            <label>Puntaje</label>
            <input type="number" step="0.1" name="puntaje" class="form-control" required>
        </div>

        <!-- ESTRENO -->
        <div class="mb-3">
            <label>Fecha de estreno</label>
            <input type="date" name="estreno" class="form-control" required>
        </div>

        <!-- PRODUCTORA -->
        <div class="mb-3">
            <label>Productora</label>
            <input type="text" name="productora" class="form-control" required>
        </div>

        <!-- SINOPSIS -->
        <div class="mb-3">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" rows="4"></textarea>
        </div>

        <!-- POSTER -->
        <div class="mb-3">
            <label>Poster</label>
            <input type="file" name="poster" class="form-control">
        </div>

        <!-- PRECIO -->
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="form-control" required>
        </div>

        <hr>

        <!-- DIRECTOR -->
        <div class="mb-3">
            <label>Director</label>
            <select name="director_id" class="form-control" required>
                <?php foreach ($directores as $D) { ?>
                    <option value="<?= $D->getId() ?>">
                        <?= $D->getNombreCompleto() ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- GUIONISTA -->
        <div class="mb-3">
            <label>Guionista</label>
            <select name="guionista_id" class="form-control" required>
                <?php foreach ($guionistas as $G) { ?>
                    <option value="<?= $G->getId() ?>">
                        <?= $G->getNombre_completo() ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <!-- ACTORES -->
        <label>Actores</label>

<div class="mb-3">
<?php foreach ($actores as $A) { ?>
    
    <div class="form-check">
        <input class="form-check-input"
               type="checkbox"
               name="actores[]"
               value="<?= $A->getId() ?>">

        <label class="form-check-label">
            <?= $A->getNombreCompleto() ?>
        </label>
    </div>

<?php } ?>
</div>

        <!-- GENEROS -->
        <label>Géneros</label>

<div class="mb-3">
<?php foreach ($generos as $G) { ?>

    <div class="form-check">
        <input class="form-check-input"
               type="checkbox"
               name="generos[]"
               value="<?= $G->getId() ?>">

        <label class="form-check-label">
            <?= $G->getNombre() ?>
        </label>
    </div>

<?php } ?>
</div>

        <!-- ÁNIMOS -->
        <label>Estados de ánimo</label>

<div class="mb-3">
<?php foreach ($animos as $A) { ?>

    <div class="form-check">
        <input class="form-check-input"
               type="checkbox"
               name="animos[]"
               value="<?= $A->getId() ?>">

        <label class="form-check-label">
            <?= $A->getNombre() ?>
        </label>
    </div>

<?php } ?>
</div>

        <button class="btn btn-success w-100 mt-3">
            Guardar película
        </button>
        
    </form>
<a
        href="index.php?sec=admin_pelicula"
        class="btn btn-secondary">

        Cancelar

    </a>
</div>