<?php
/**
 * views/alumno.php — Vista de datos del alumno.
 * 
 * Página fija con la información personal del responsable del proyecto.
 */
?>

<section aria-labelledby="alumno-titulo">
    <div class="seccion-titulo">
        <h1 id="alumno-titulo">Datos del alumno</h1>
        <p>Información del responsable del proyecto <strong>CineHumor</strong>.</p>
    </div>
 <section class="alumno-section">
    <div class="alumno-card">

        <!-- Foto del alumno (placeholder visual) -->
        <div class="alumno-foto-wrapper" aria-label="Foto del alumno">
            <img src="assets/img/yo.jpeg" alt="Foto de perfil del alumno" class="alumno-foto">
            <p class="text-suave mt-2" style="font-size:0.75rem; text-align:center">
                foto · 250px
            </p>
        </div>

        <!-- Información personal -->
        <div class="alumno-info">
            <h2>Maximo Gregorutti</h2>
            <span class="alumno-rol">Programación II · 2026</span>

            <ul class="alumno-datos" aria-label="Datos personales del alumno">
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Fecha de nacimiento:</strong>
                        <span class="dato-valor">24 de abril del 2006</span>
                    </span>
                </li>
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Email:</strong>
                        <a href="mailto:maximo.gregorutti@davinci.edu.ar" class="dato-valor">
                            maximo.gregorutti@davinci.edu.ar
                        </a>
                    </span>
                </li>
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Institución:</strong>
                        <span class="dato-valor">Da Vinci</span>
                    </span>
                </li>
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Materia:</strong>
                        <span class="dato-valor">Programación II</span>
                    </span>
                </li>
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Profesor:</strong>
                        <span class="dato-valor">Jorge Pérez</span>
                    </span>
                </li>
                <!-- Redes sociales (opcional) -->
            </ul>
        </div>
    </div>
    <div class="alumno-card">

        <!-- Foto del alumno (placeholder visual) -->
        <div class="alumno-foto-wrapper" aria-label="Foto del alumno">
            <img src="assets/img/alan.jpeg" alt="Foto de perfil del alumno" class="alumno-foto">
            <p class="text-suave mt-2" style="font-size:0.75rem; text-align:center">
                foto · 250px
            </p>
        </div>

        <!-- Información personal -->
        <div class="alumno-info">
            <h2>Alan Ortiz</h2>
            <span class="alumno-rol">Programación II · 2026</span>

            <ul class="alumno-datos" aria-label="Datos personales del alumno">
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Fecha de nacimiento:</strong>
                        <span class="dato-valor">13 de febrero del 2004</span>
                    </span>
                </li>
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Email:</strong>
                        <a href="mailto:alan.ortiz@davinci.edu.ar" class="dato-valor">
                            alan.ortiz@davinci.edu.ar
                        </a>
                    </span>
                </li>
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Institución:</strong>
                        <span class="dato-valor">Da Vinci</span>
                    </span>
                </li>
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Materia:</strong>
                        <span class="dato-valor">Programación II</span>
                    </span>
                </li>
                <li>
                    <span class="dato-icono" aria-hidden="true"></span>
                    <span>
                        <strong>Profesor:</strong>
                        <span class="dato-valor">Jorge Pérez</span>
                    </span>
                </li>
                <!-- Redes sociales (opcional) -->
            </ul>
        </div>
    </div>
</section>
    <hr class="separador">

    <!-- Descripción del proyecto -->
    <article aria-labelledby="proyecto-titulo" style="max-width: 680px;">
        <h3 id="proyecto-titulo">Sobre el proyecto</h3>
        <p class="mt-2">
            <strong>CineHumor</strong> es una aplicación web desarrollada como trabajo práctico para 
            la materia <em>Programación II</em>. Su objetivo es resolver una problemática concreta: 
            <strong>la dificultad de elegir qué película ver cuando no sabés qué tipo de historia 
            se adapta a tu estado emocional actual</strong>.
        </p>
        <p class="mt-2">
            La aplicación utiliza un sistema de recomendación basado en el estado de ánimo del usuario, 
            cruzando esa selección con un catálogo de películas clasificadas por su resonancia emocional. 
            Todo el catálogo se almacena en archivos <strong>JSON</strong> y la lógica está organizada 
            mediante <strong>clases PHP</strong> con encapsulamiento, getters y setters.
        </p>
        <p class="mt-2">
            El diseño apunta a crear una experiencia cinematográfica: oscura, elegante, y con tipografía 
            que evoca el cartel de una sala de cine independiente.
        </p>
    </article>
</section>
