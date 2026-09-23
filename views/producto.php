<?php

$id = (int) ($_GET['id'] ?? 0);

$pelicula = Pelicula::producto_x_id($id);


function renderPersona($nombre, $biografia, $foto, $carpeta = "assets/img/")
{
?>
    <div class="persona-card">

        <div class="persona-header">

            <img
                src="<?= $carpeta . htmlspecialchars($foto) ?>"
                alt="<?= htmlspecialchars($nombre) ?>"
                class="persona-foto">

            <div class="persona-info">

                <h4><?= htmlspecialchars($nombre) ?></h4>

                <p>
                    <?= htmlspecialchars(mb_strimwidth($biografia ?? '', 0, 180, '...')) ?>
                </p>

            </div>

        </div>

    </div>
<?php
}

?>

<section>

<?php if ($pelicula === null) { ?>

    <div class="sin-resultados">
        <span class="sin-resultados-icono">🎬</span>
        <p>No encontramos la película que estás buscando.</p>
    </div>

    <div class="mt-3">
        <a href="index.php?sec=catalogo" class="hero-cta" style="display:inline-flex">
            <span aria-hidden="true">←</span>
            <span>Volver al catálogo</span>
        </a>
    </div>

<?php } else { ?>

    
    <div class="producto-detalle">
        <!-- POSTER -->
        


        <div class="producto-poster">
            <img src="assets/img/<?= htmlspecialchars($pelicula->getPoster()) ?>"
                 alt="<?= htmlspecialchars($pelicula->getTitulo()) ?>">
        </div>

        <!-- INFO -->
<div class="producto-detallado">
            <h1 class="producto-titulo">
                <?= htmlspecialchars($pelicula->getTitulo()) ?>
            </h1>

            <div class="pelicula-meta mb-2">
                <span class="pelicula-anio"><?= htmlspecialchars($pelicula->getEstreno()) ?></span>
                <span class="pelicula-puntaje">⭐ <?= htmlspecialchars((string)$pelicula->getPuntaje()) ?></span>
                <span class="pelicula-anio"><?= htmlspecialchars($pelicula->duracion_formateada()) ?></span>
            </div>

             <!-- SINOPSIS -->
              <h2>Sinopsis</h2>
            <p class="pelicula-sinopsis mb-2">
                
                <?= htmlspecialchars($pelicula->getSinopsis()) ?>
            </p>

            <!-- GENEROS -->
            <div class="pelicula-generos mb-2">
                <h3 class="detalle-titulo">
                        Genero:
                    </h3>
                <?php foreach ($pelicula->getGeneros() as $genero) { ?>
                    <span class="genero-tag">
                        <?= htmlspecialchars($genero->getNombre()) ?>
                    </span>
                <?php } ?>
            </div>

            <!-- ANIMOS -->
            <div class="pelicula-generos mb-2">
                <h3 class="detalle-titulo">
                       Estado de animo:
                    </h3>
                <?php foreach ($pelicula->getAnimos() as $animo) { ?>
                    <span class="genero-tag">
                        <?= htmlspecialchars($animo->getNombre()) ?>
                    </span>
                <?php } ?>
            </div>
            <!-- PRODUCTORA -->
            <p class="text-suave mb-2">
                <strong class="text-acento">Productora:</strong>
                <?= htmlspecialchars($pelicula->getProductora()) ?>
            </p>
            </div> 
            <!-- DIRECTOR -->
            <?php if ($pelicula->getDirector()) { ?>
                <section class="mb-4">

                    <h3 class="detalle-titulo">
                        <i class="bi bi-camera-reels"></i>
                        Director
                    </h3>

                    <?php
                    renderPersona(
                        $pelicula->getDirector()->getNombreCompleto(),
                        $pelicula->getDirector()->getBiografia(),
                        $pelicula->getDirector()->getFotoPerfil(),
                        "assets/directores/"
                    );
                    ?>

                </section>
            <?php } ?>

            

           

            

            <!-- ACTORES -->
             <?php if (!empty($pelicula->getActores())) { ?>

<section class="mb-4">

    <h3 class="detalle-titulo">
        <i class="bi bi-people"></i>
        Reparto
    </h3>

    <div class="reparto-grid">

        <?php foreach ($pelicula->getActores() as $actor) { ?>

            <?php
            renderPersona(
                $actor->getNombreCompleto(),
                $actor->getBiografia(),
                $actor->getFotoPerfil(),
                "assets/actores/"
            );
            ?>

        <?php } ?>

    </div>

</section>

<?php } ?>
<!-- GUIONISTA -->
            <?php if ($pelicula->getGuionista()) { ?>
                <section class="mb-4">

                    <h3 class="detalle-titulo">
                        <i class="bi bi-pencil-square"></i>
                        Guionista
                    </h3>

                    <?php
                    renderPersona(
                        $pelicula->getGuionista()->getNombre_completo(),
                        $pelicula->getGuionista()->getBiografia(),
                        $pelicula->getGuionista()->getFoto_perfil(),
                        "assets/guionistas/"
                    );
                    ?>

                </section>
            <?php } ?>






                    

                
           <div class="prodcuto-precio">
            <!-- PRECIO -->
              <h3 class="detalle-titulo">
                        <i class="bi bi-ticket-perforated"></i>
                        Precio
                    </h3>
            <p class="producto-precio">
                <?= htmlspecialchars($pelicula->precio_formateado()) ?>
            </p>

            <!-- ACCIONES -->
            <div class="producto-acciones">

                <a href="actions/add_carrito.php?id=<?= $pelicula->getId() ?>"
   class="hero-comprar">

                   <i class="bi bi-cart"></i> Añadir al carrito

                </a>

            </div>

            <!-- VOLVER -->
            <div class="mt-3">
                <a href="index.php?sec=catalogo" class="hero-cta" style="display:inline-flex">
                    <span aria-hidden="true">←</span>
                    <span>Volver al catálogo</span>
                </a>
            </div>
            </div>
        
</div>
    
 <?php } ?>

</section>