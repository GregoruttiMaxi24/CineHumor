<h1 class="mb-5 text-center fw-bold">
    Agregar Actor
</h1>

<form action="actions/add_actor_acc.php"
      method="POST"
      enctype="multipart/form-data">

    <!-- Nombre -->
    <div class="mb-3">
        <label class="form-label">
            Nombre completo
        </label>

        <input
            type="text"
            name="nombre_completo"
            class="form-control"
            required>
    </div>

    <!-- Biografía -->
    <div class="mb-3">
        <label class="form-label">
            Biografía
        </label>

        <textarea
            name="biografia"
            rows="6"
            class="form-control"></textarea>
    </div>

    <!-- Foto -->
    <div class="mb-4">
        <label class="form-label">
            Foto
        </label>

        <input
            type="file"
            name="foto"
            class="form-control"
            accept=".jpg,.jpeg,.png,.webp"
            required>
    </div>

    <button
        class="btn btn-success">
        Agregar Actor
    </button>

    <a
        href="index.php?sec=admin_actor"
        class="btn btn-secondary">

        Cancelar

    </a>

</form>