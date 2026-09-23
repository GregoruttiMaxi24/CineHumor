<?php

$actores = Actor::listado_completo();

?>

<div class="container py-4">

    <h1 class="text-center mb-5 fw-bold">
        Administración de Actores
    </h1>
    <div class="admin-table-container">
    <div class="table-responsive">  
    <table class="table admin-table align-middle">

        <thead>

        <tr>

            <th width="90">Foto</th>
            <th>Nombre</th>
            <th>Biografia</th>
            <th  class="text-center" width="170">Acciones</th>

        </tr>

        </thead>

        <tbody>

        <?php foreach($actores as $A){ ?>

            <tr>

                <td>

                    <img
    src="../assets/actores/<?= htmlspecialchars($A->getFotoPerfil()) ?>"
    alt="<?= htmlspecialchars($A->getNombreCompleto()) ?>"
    class="rounded shadow-sm"
    style="width:70px;height:90px;object-fit:cover;">
                </td>

                <td>

                    <?= $A->getNombreCompleto(); ?>

                </td>

                <td>
<?= mb_strimwidth($A->getBiografia(), 0, 120, "..."); ?>

                </td>

              

                <td>

                     <div class="d-grid gap-2">

        <a
            href="index.php?sec=edit_actor&id=<?= $A->getId(); ?>"
            class="btn btn-warning btn-sm">

            Editar

        </a>

        <a
            href="index.php?sec=delete_actor&id=<?= $A->getId(); ?>"
            class="btn btn-danger btn-sm">

            Eliminar

        </a>

    </div>

                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>
</div>
</div>
    <a
        href="index.php?sec=add_actor"
        class="btn btn-primary">

        Agregar Actor

    </a>

</div>