<?php

$guionistas = Guionista::listado_completo();

?>

<div class="container py-5">

    <h1 class="text-center mb-5 fw-bold">
        Administración de Guionistas
    </h1>

    <div class="admin-table-container">
    <div class="table-responsive">
    <table class="table admin-table align-middle">

        <thead>

        <tr>
            <th width="90">Foto</th>
            <th>Nombre</th>
            <th>Biografía</th>
            <th width="170">Acciones</th>
        </tr>

        </thead>

        <tbody>

        <?php foreach ($guionistas as $G) { ?>

            <tr>

                <!-- FOTO -->
                <td>
                    <img
                        src="../assets/guionistas/<?= $G->getFoto_perfil(); ?>"
                        style="width:60px;height:60px;object-fit:cover;"
                        class="rounded shadow-sm"
                    >
                </td>

                <!-- NOMBRE -->
                <td>
                    <?= $G->getNombre_completo(); ?>
                </td>

                <!-- BIO -->
                <td>
                    <?= substr($G->getBiografia(), 0, 80); ?>...
                </td>

                <!-- ACCIONES -->
                <td>

                    <a href="index.php?sec=edit_guionista&id=<?= $G->getId(); ?>"
                       class="btn btn-warning btn-sm d-block mb-1">
                        Editar
                    </a>

                    <a href="index.php?sec=delete_guionista&id=<?= $G->getId(); ?>"
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

    <a href="index.php?sec=add_guionista"
       class="btn btn-primary">
        Agregar Guionista
    </a>

</div>