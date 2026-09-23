<?php

$mensajes = Contacto::listado_completo();

?>

<h1 class="mb-4">
    Mensajes de contacto
</h1>

<table class="table table-dark table-hover align-middle">

    <thead>

        <tr>

            <th>Nombre</th>

            <th>Email</th>

            <th>Asunto</th>

            <th>Fecha</th>

            <th>Acciones</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach($mensajes as $mensaje){ ?>

        <tr>

            <td><?= htmlspecialchars($mensaje->getNombre()) ?></td>

            <td><?= htmlspecialchars($mensaje->getEmail()) ?></td>

            <td><?= htmlspecialchars($mensaje->getAsunto()) ?></td>

            <td><?= htmlspecialchars($mensaje->getFecha()) ?></td>

            <td>

                <a
                    href="index.php?sec=ver_contacto&id=<?= $mensaje->getId() ?>"
                    class="btn btn-sm btn-primary">

                    Ver

                </a>

            </td>

        </tr>

    <?php } ?>

    </tbody>

</table>