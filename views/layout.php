<?php
/** @var Vista $vista */
/** @var array|false $userData */
$archivoVista = __DIR__ . "/" . $vista->getNombre() . ".php";
$userData = $_SESSION['loggedIn'] ?? false;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $vista->getTitulo() ?> | CineHumor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<header class="site-header">

    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a href="index.php?sec=home" class="navbar-brand site-logo">
                <span class="logo-icono">🎬</span>
                <span class="logo-texto">
                    Cine<span>Humor</span>
                </span>
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#menuPrincipal"
                aria-controls="menuPrincipal"
                aria-expanded="false"
                aria-label="Abrir menú">

                ☰

            </button>

            <div class="collapse navbar-collapse justify-content-end" id="menuPrincipal">

                <div class="navbar-nav">

                    <a class="nav-link" href="index.php?sec=home">Home</a>

                    <a class="nav-link" href="index.php?sec=catalogo">Catálogo</a>

                    <a class="nav-link" href="index.php?sec=recomendador">Recomendador</a>
                    <a class="nav-link" href="index.php?sec=carrito">Carrito</a>
                    <a class="nav-link" href="index.php?sec=contacto">Contacto</a>
                    <a class="nav-link" href="index.php?sec=alumno">Alumno</a>
                    <?php if ($userData && in_array($userData['rol'], ['admin', 'superadmin'])) { ?>
                    <a class="nav-link" href="admin/index.php?sec=dashboard">Panel</a>
                     <?php } ?>

                    <?php if ($userData): ?>

                        <span class="nav-link">
                            👤 <?= htmlspecialchars($userData['nombre_completo']) ?>
                        </span>

                        <a class="nav-link" href="index.php?sec=logout">
                            Cerrar sesión
                        </a>

                    <?php else: ?>

                        <a class="nav-link" href="index.php?sec=login">
                            Iniciar sesión
                        </a>

                    <?php endif; ?>

                    
                </div>

            </div>

        </div>

    </nav>

</header>

<main class="site-main">

    <?= Alerta::get_alertas() ?>

    <?php
    if (file_exists($archivoVista)) {
        require $archivoVista;
    } else {
        require __DIR__ . "/404.php";
    }
    ?>

</main>

<footer class="site-footer">
    <div class="footer-inner">
        <p class="footer-texto">
            CineHumor © 2026
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>