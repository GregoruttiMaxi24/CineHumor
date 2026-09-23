<?php

$generos = Genero::listado_completo();

?>

<div class="container py-5">

    <h1 class="text-center mb-5 fw-bold">
        Administración de Géneros
    </h1>

    <div class="admin-table-container">
    <div class="table-responsive">
    <table class="table admin-table align-middle">

        <thead>

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th width="200">Acciones</th>
        </tr>

        </thead>

        <tbody>

        <?php foreach ($generos as $G) { ?>

            <tr>

                <td><?= $G->getId(); ?></td>

                <td><?= $G->getNombre(); ?></td>

                <td>

                    <a href="index.php?sec=edit_genero&id=<?= $G->getId(); ?>"
                       class="btn btn-warning btn-sm d-block mb-1">
                        Editar
                    </a>

                    <a href="index.php?sec=delete_genero&id=<?= $G->getId(); ?>"
                       class="btn btn-danger btn-sm d-block">
                        Eliminar
                    </a>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>
    </div>
    </div>

    <a href="index.php?sec=add_genero"
       class="btn btn-primary">
        Agregar Género
    </a>

</div>