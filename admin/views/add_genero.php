<h1 class="text-center mb-5 fw-bold">Agregar Género</h1>

<form action="actions/add_genero_acc.php" method="POST">

    <input type="text"
           name="nombre"
           class="form-control mb-3"
           placeholder="Nombre del género"
           required>

    <button class="btn btn-success">
        Guardar
    </button>

    <a href="index.php?sec=admin_generos"
       class="btn btn-secondary">
        Cancelar
    </a>

</form>