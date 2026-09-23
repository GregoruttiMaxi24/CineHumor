<?php

$directores = Director::listado_completo();

?>

<div class="container py-5">

    <h1 class="text-center mb-5 fw-bold">
        Administración de Directores
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

        <?php foreach($directores as $D){ ?>

            <tr>

                <!-- FOTO -->
                <td>
                    <img src="../assets/directores/<?= htmlspecialchars($D->getFotoPerfil()) ?>" alt="<?= htmlspecialchars($D->getNombreCompleto()) ?>" style="width: 60px; height: 90px; object-fit: cover;" class="rounded shadow-sm">

                </td>

                <!-- NOMBRE -->
                <td>

                    <?= $D->getNombreCompleto(); ?>

                </td>

                <!-- BIO -->
                <td>

                    <?= substr($D->getBiografia(), 0, 80); ?>...

                </td>

                <!-- ACCIONES -->
                <td>

                    <a
                        href="index.php?sec=edit_director&id=<?= $D->getId(); ?>"
                        class="btn btn-warning btn-sm d-block mb-1">

                        Editar

                    </a>

                    <a
                        href="index.php?sec=delete_director&id=<?= $D->getId(); ?>"
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
    <a
        href="index.php?sec=add_director"
        class="btn btn-primary">

        Agregar Director

    </a>

</div>