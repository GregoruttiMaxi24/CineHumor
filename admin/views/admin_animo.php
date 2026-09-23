<?php

$animos = Animo::listado_completo();

?>

<div class="container py-5">

    <h1 class="text-center mb-5 fw-bold">
        Administración de Estados de Ánimo
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

        <?php foreach ($animos as $A) { ?>

            <tr>

                <td><?= $A->getId(); ?></td>

                <td><?= $A->getNombre(); ?></td>

                <td>

                    <a href="index.php?sec=edit_animo&id=<?= $A->getId(); ?>"
                       class="btn btn-warning btn-sm d-block mb-1">
                        Editar
                    </a>

                    <a href="index.php?sec=delete_animo&id=<?= $A->getId(); ?>"
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

    <a href="index.php?sec=add_animo"
       class="btn btn-primary">
        Agregar Estado de Ánimo
    </a>

</div>