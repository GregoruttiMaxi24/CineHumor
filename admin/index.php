<?php

require_once "../functions/autoload.php";

$vista = Vista::validar_vista($_GET['sec'] ?? 'dashboard');

$userData = $_SESSION['loggedIn'] ?? false;

Autenticacion::verify($vista->getRestringida());

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Admin | <?= $vista->getTitulo() ?>
    </title>
    <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>

<!-- Navbar Mobile -->

<nav class="navbar navbar-dark bg-dark d-lg-none">

    <div class="container-fluid">

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMobile">

            <span class="navbar-toggler-icon"></span>

        </button>

        <span class="navbar-brand mb-0">
            🎬 CineHumor Admin
        </span>

    </div>

</nav>


<div class="admin-layout">

    <!-- Sidebar Escritorio -->

    <aside class="admin-sidebar d-none d-lg-flex">

        <?php require "includes/sidebar.php"; ?>

    </aside>


    <!-- Sidebar Mobile -->

    <div
        class="offcanvas offcanvas-start text-bg-dark"
        tabindex="-1"
        id="sidebarMobile">

        <div class="offcanvas-header border-bottom">

    <h5 class="offcanvas-title">
        🎬 CineHumor
    </h5>

    <button
        type="button"
        class="btn-close btn-close-white"
        data-bs-dismiss="offcanvas">
    </button>

</div>

<div class="offcanvas-body p-0">

    <?php require "includes/sidebar.php"; ?>

</div>

    </div>


    <main class="admin-main">

        <?php require_once "views/{$vista->getNombre()}.php"; ?>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>