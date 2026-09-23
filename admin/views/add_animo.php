<h1 class="text-center mb-5 fw-bold">
    Agregar Estado de Ánimo
</h1>

<form action="actions/add_animo_acc.php" method="POST">

    <input type="text"
           name="nombre"
           class="form-control mb-3"
           placeholder="Nombre del estado de ánimo"
           required>

    <button class="btn btn-success">
        Guardar
    </button>

    <a href="index.php?sec=admin_animos"
       class="btn btn-secondary">
        Cancelar
    </a>

</form>