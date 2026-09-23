<?php

$id = $_GET['id'] ?? null;

$guionista = Guionista::get_x_id($id);

if (!$guionista) {
    echo "No encontrado";
    exit;
}

?>

<h1 class="text-center mb-5">Editar Guionista</h1>

<form action="actions/edit_guionista_acc.php?id=<?= $guionista->getId(); ?>"
      method="POST"
      enctype="multipart/form-data">

    <input type="text"
           name="nombre_completo"
           value="<?= $guionista->getNombre_completo(); ?>"
           class="form-control mb-3">

    <textarea name="biografia"
              class="form-control mb-3"
              rows="6"><?= $guionista->getBiografia(); ?></textarea>

    <img src="../assets/guionistas/<?= $guionista->getFoto_perfil(); ?>"
         style="width:80px;height:80px;object-fit:cover;"
         class="mb-3 rounded">

    <input type="file"
           name="foto"
           class="form-control mb-3">

    <button class="btn btn-warning">Guardar cambios</button>

</form>