<section class="login-section" aria-labelledby="login-titulo">

    <div class="login-card">

        <h1 id="login-titulo" class="login-titulo">Iniciar sesión</h1>
        <p class="text-suave mb-2">Ingresá tus credenciales para acceder a tu cuenta.</p>

        <form method="POST" action="../actions/auth_login.php">

            <div class="form-grupo">
                <label class="form-label" for="usuario">Usuario</label>
                <input
                    type="text"
                    id="usuario"
                    name="usuario"
                    class="form-input"
                    placeholder="Tu nombre de usuario"
                    required
                    value="<?= htmlspecialchars($_POST['usuario'] ?? '') ?>">
            </div>

            <div class="form-grupo">
                <label class="form-label" for="password">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-input"
                    placeholder="Tu contraseña"
                    required>
            </div>

            <button type="submit" class="form-btn">
                <span aria-hidden="true">🔑</span>
                <span>Ingresar</span>
            </button>

        </form>

    </div>

</section>
