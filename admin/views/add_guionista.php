<h1 class="mb-5 text-center fw-bold">Agregar Guionista</h1>

<form action="actions/add_guionista_acc.php"
      method="POST"
      enctype="multipart/form-data">

    <input type="text"
           name="nombre_completo"
           class="form-control mb-3"
           placeholder="Nombre completo"
           required>

    <textarea name="biografia"
              class="form-control mb-3"
              rows="6"
              placeholder="Biografía"></textarea>

    <input type="file"
           name="foto"
           class="form-control mb-3"
           required>

    <button class="btn btn-success">Guardar</button>

</form>
<a
        href="index.php?sec=admin_guionistas"
        class="btn btn-secondary">

        Cancelar

    </a>