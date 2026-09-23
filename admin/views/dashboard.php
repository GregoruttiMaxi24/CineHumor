<?php

$totalPeliculas   = count(Pelicula::catalogo_completo());
$totalActores     = count(Actor::listado_completo());
$totalDirectores  = count(Director::listado_completo());
$totalGuionistas  = count(Guionista::listado_completo());
$totalGeneros     = count(Genero::listado_completo());
$totalAnimos      = count(Animo::listado_completo());

?>

<div class="dashboard-header">

    <div>

        <h1 class="fw-bold mb-1">
            Dashboard
        </h1>

        <p class="text-secondary mb-0">
            Bienvenido al panel de administración de <strong>CineHumor</strong>.
            Desde aquí podés administrar todo el contenido del sitio.
        </p>

    </div>

    <div class="dashboard-date">

        <?= date("d/m/Y"); ?>

    </div>

</div>


    <div class="row g-4">

        <div class="col-xl-4 col-md-6">

            <a href="index.php?sec=admin_pelicula" class="text-decoration-none">

                <div class="dashboard-card">

                    <div class="dashboard-icon">

    <i class="bi bi-film"></i>

</div>

                    <div>

                        <h5>Películas</h5>

                        <h2><?= $totalPeliculas ?></h2>

                    </div>

                </div>

            </a>

        </div>


        <div class="col-xl-4 col-md-6">

            <a href="index.php?sec=admin_actor" class="text-decoration-none">

                <div class="dashboard-card">

                    <div class="dashboard-icon">
                       <i class="bi bi-people"></i>
                    </div>

                    <div>

                        <h5>Actores</h5>

                        <h2><?= $totalActores ?></h2>

                    </div>

                </div>

            </a>

        </div>


        <div class="col-xl-4 col-md-6">

            <a href="index.php?sec=admin_director" class="text-decoration-none">

                <div class="dashboard-card">

                    <div class="dashboard-icon">
                        <i class="bi bi-camera-reels"></i>
                    </div>

                    <div>

                        <h5>Directores</h5>

                        <h2><?= $totalDirectores ?></h2>

                    </div>

                </div>

            </a>

        </div>


        <div class="col-xl-4 col-md-6">

            <a href="index.php?sec=admin_guionistas" class="text-decoration-none">

                <div class="dashboard-card">

                    <div class="dashboard-icon">
                        <i class="bi bi-pencil"></i>
                    </div>

                    <div>

                        <h5>Guionistas</h5>

                        <h2><?= $totalGuionistas ?></h2>

                    </div>

                </div>

            </a>

        </div>


        <div class="col-xl-4 col-md-6">

            <a href="index.php?sec=admin_genero" class="text-decoration-none">

                <div class="dashboard-card">

                    <div class="dashboard-icon">
                        <i class="bi bi-tags"></i>
                    </div>

                    <div>

                        <h5>Géneros</h5>

                        <h2><?= $totalGeneros ?></h2>

                    </div>

                </div>

            </a>

        </div>


        <div class="col-xl-4 col-md-6">

            <a href="index.php?sec=admin_animo" class="text-decoration-none">

                <div class="dashboard-card">

                    <div class="dashboard-icon">
                        <i class="bi bi-emoji-smile"></i>
                    </div>

                    <div>

                        <h5>Estados de ánimo</h5>

                        <h2><?= $totalAnimos ?></h2>

                    </div>

                </div>

            </a>

        </div>

    </div>
<div class="mt-5">

    <h3 class="fw-bold mb-4">
        <i class="bi bi-lightning"></i> Accesos rápidos
    </h3>

    <div class="row g-4">

        <div class="col-xl-3 col-md-6">

            <a href="index.php?sec=add_pelicula" class="text-decoration-none">

                <div class="quick-card">

                   <div class="quick-icon">

    <i class="bi bi-plus-circle"></i>

</div>

                    <h5>
                        Nueva Película
                    </h5>

                </div>

            </a>

        </div>

        <div class="col-xl-3 col-md-6">

            <a href="index.php?sec=add_actor" class="text-decoration-none">

                <div class="quick-card">

                    <div class="quick-icon">

    <i class="bi bi-plus-circle"></i>

</div>

                    <h5>
                        Nuevo Actor
                    </h5>

                </div>

            </a>

        </div>

        <div class="col-xl-3 col-md-6">

            <a href="index.php?sec=add_director" class="text-decoration-none">

                <div class="quick-card">

                    <div class="quick-icon">

    <i class="bi bi-plus-circle"></i>

</div>

                    <h5>
                        Nuevo Director
                    </h5>

                </div>

            </a>

        </div>

        <div class="col-xl-3 col-md-6">

            <a href="index.php?sec=add_guionista" class="text-decoration-none">

                <div class="quick-card">

                    <div class="quick-icon">

    <i class="bi bi-plus-circle"></i>

</div>

                    <h5>
                        Nuevo Guionista
                    </h5>

                </div>

            </a>

        </div>

    </div>

</div>
</div>