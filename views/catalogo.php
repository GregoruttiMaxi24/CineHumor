<?php

$busqueda = trim($_GET['busqueda'] ?? '');

if ($busqueda !== '') {
    $peliculas = Pelicula::buscar($busqueda);
} else {
    $peliculas = Pelicula::catalogo_completo();
}

?>

<section>

    <div class="seccion-titulo">
        <h1>Catálogo de Películas</h1>
        <h2>Explorá todas las películas disponibles</h2>
    </div>

    <form class="catalogo-buscador" method="GET" action="index.php">
        <input type="hidden" name="sec" value="catalogo">

        <input
            type="text"
            name="busqueda"
            class="form-input"
            placeholder="Buscar por título, director o actor..."
            value="<?= htmlspecialchars($busqueda) ?>">

        <button type="submit" class="filtro-btn">Buscar</button>

        <?php if ($busqueda !== '') { ?>
            <a href="index.php?sec=catalogo" class="filtro-btn">Limpiar</a>
        <?php } ?>
    </form>

    <?php if ($busqueda !== '') { ?>
        <p class="text-suave mb-2">
            Resultados para "<strong class="text-acento"><?= htmlspecialchars($busqueda) ?></strong>"
        </p>
    <?php } ?>

    <?php if (empty($peliculas)) { ?>

        <div class="sin-resultados">
            <span class="sin-resultados-icono">🎬</span>
            <p>No hay películas disponibles en este momento.</p>
        </div>

    <?php } else { ?>

        <div class="peliculas-grid">

            <?php foreach ($peliculas as $pelicula) { ?>

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
                            <?= htmlspecialchars($pelicula->sinopsis_reducida(25)) ?>
                        </p>

                        <div class="pelicula-generos">

                            <?php foreach ($pelicula->getGeneros() as $genero) { ?>
                                <span class="tag-genero">
                                    <?= htmlspecialchars($genero->getNombre()) ?>
                                </span>
                            <?php } ?>

                        </div>

                        <div class="pelicula-animo">

                            <?php foreach ($pelicula->getAnimos() as $animo) { ?>
                                <span class="tag-animo">
                                    <?= htmlspecialchars($animo->getNombre()) ?>
                                </span>
                            <?php } ?>

                        </div>

                        <a href="index.php?sec=producto&id=<?= $pelicula->getId() ?>" class="btn-ver-mas">
                            Ver más
                        </a>

                    </div>

                </article>

            <?php } ?>

        </div>

    <?php } ?>

</section>
