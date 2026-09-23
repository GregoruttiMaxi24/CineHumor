<?php

$generos = Genero::listado_completo();
$animos  = Animo::listado_completo();
$actores = Actor::listado_completo();

$generoID   = !empty($_GET['genero'])   ? (int) $_GET['genero']   : null;
$animoID    = !empty($_GET['animo'])    ? (int) $_GET['animo']    : null;
$actorID    = !empty($_GET['actor'])    ? (int) $_GET['actor']    : null;
$seBusco = isset($_GET['buscar']);

$resultados = [];

if ($seBusco) {
    $resultados = Recomendador::recomendar($generoID, $animoID, $actorID);

    // Solo nos interesan las películas con alguna coincidencia
    $resultados = array_filter($resultados, fn($r) => $r['score'] > 0);
}

?>

<section aria-labelledby="recomendar-titulo">

    <div class="seccion-titulo">
        <h1 id="recomendar-titulo">Obtené tu recomendación</h1>
        <p>Elegí un género y/o un estado de ánimo y te sugerimos películas acordes.</p>
    </div>

    <form class="form-recomendacion mb-3" method="GET" action="index.php">
        <input type="hidden" name="sec" value="recomendador">

        <div class="form-grupo">
            <label class="form-label" for="genero">Género</label>
            <select id="genero" name="genero" class="form-select">
                <option value="">-- Cualquier género --</option>
                <?php foreach ($generos as $genero) { ?>
                    <option value="<?= $genero->getId() ?>"
                        <?= $generoID === $genero->getId() ? 'selected' : '' ?>>
                        <?= htmlspecialchars($genero->getNombre()) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-grupo">
            <label class="form-label" for="animo">¿Cómo te sentís?</label>
            <select id="animo" name="animo" class="form-select">
                <option value="">-- Cualquier estado de ánimo --</option>
                <?php foreach ($animos as $animo) { ?>
                    <option value="<?= $animo->getId() ?>"
                        <?= $animoID === $animo->getId() ? 'selected' : '' ?>>
                        <?= htmlspecialchars($animo->getNombre()) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="form-grupo">
            <label class="form-label" for="actor">¿Qué actor o actriz preferís?</label>
            <select id="actor" name="actor" class="form-select">
                <option value="">-- Cualquier actor o actriz de tu gusto --</option>
                <?php foreach ($actores as $actor) { ?>
                    <option value="<?= $actor->getId() ?>"
                        <?= $actorID === $actor->getId() ? 'selected' : '' ?>>
                        <?= htmlspecialchars($actor->getNombreCompleto()) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <button type="submit" name="buscar" value="1" class="form-btn">
            <span aria-hidden="true">🎬</span>
            <span>Buscar mi película</span>
        </button>
    </form>

    <?php if ($seBusco) { ?>

        <?php if (empty($resultados)) { ?>

            <div class="sin-resultados">
                <span class="sin-resultados-icono">🎭</span>
                <h3>No encontramos películas para esa combinación</h3>
                <p>Probá con otro género o estado de ánimo.</p>
            </div>

        <?php } else { ?>

            <div class="peliculas-grid">
                <?php foreach ($resultados as $resultado) {
                    $pelicula = $resultado['pelicula'];
                ?>
                    <article class="pelicula-card fade-in-up">

                        <div class="pelicula-poster">
                            <img src="assets/img/<?= htmlspecialchars($pelicula->getPoster()) ?>"
                                 alt="<?= htmlspecialchars($pelicula->getTitulo()) ?>">
                        </div>

                        <div class="pelicula-body">

                            <h3 class="pelicula-titulo">
                                <?= htmlspecialchars($pelicula->getTitulo()) ?>
                            </h3>

                            <div class="pelicula-meta">
                                <span class="pelicula-anio">
                                    <?= htmlspecialchars($pelicula->getEstreno()) ?>
                                </span>
                                <span class="pelicula-puntaje">
                                    ⭐ <?= htmlspecialchars((string) $pelicula->getPuntaje()) ?>
                                </span>
                            </div>

                            <p class="pelicula-director">
                                Dirigida por
                                <?= htmlspecialchars($pelicula->getDirector()?->getNombreCompleto() ?? "Sin director") ?>
                            </p>

                            <p class="pelicula-sinopsis">
                                <?= htmlspecialchars($pelicula->sinopsis_reducida(20)) ?>
                            </p>

                            <a href="index.php?sec=producto&id=<?= $pelicula->getId() ?>" class="btn-ver-mas">
                                Ver más
                            </a>

                        </div>

                    </article>
                <?php } ?>
            </div>

        <?php } ?>

    <?php } ?>

</section>
