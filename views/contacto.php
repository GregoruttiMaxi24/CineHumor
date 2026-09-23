<section aria-labelledby="contacto-titulo">

    <div class="seccion-titulo">

        <h1 id="contacto-titulo">
            Contactanos
        </h1>

        <p>
            ¿Tenés alguna consulta, sugerencia o querés recomendarnos una película?
            Completá el formulario y nos pondremos en contacto con vos.
        </p>

    </div>

    <form action="actions/add_contacto_acc.php" method="POST">

        <div class="form-grupo">

            <label class="form-label" for="nombre">
                Nombre
            </label>

            <input
                class="form-control"
                type="text"
                id="nombre"
                name="nombre"
                required>

        </div>

        <div class="form-grupo">

            <label class="form-label" for="email">
                Correo electrónico
            </label>

            <input
                class="form-control"
                type="email"
                id="email"
                name="email"
                required>

        </div>

        <div class="form-grupo">

            <label class="form-label" for="asunto">
                Asunto
            </label>

            <input
                class="form-control"
                type="text"
                id="asunto"
                name="asunto"
                required>

        </div>

        <div class="form-grupo">

            <label class="form-label" for="mensaje">
                Mensaje
            </label>

            <textarea
                class="form-control"
                id="mensaje"
                name="mensaje"
                rows="6"
                required></textarea>

        </div>

        <button class="form-btn">

            📩 Enviar mensaje

        </button>

    </form>

</section>