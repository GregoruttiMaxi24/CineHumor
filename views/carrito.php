<?php

$items = $_SESSION['carrito'] ?? [];
$total = 0;

?>

<section>

    <div class="seccion-titulo">
        <h1>Mi carrito</h1>
        <p>Revisá las películas seleccionadas.</p>
    </div>

    <?php if (empty($items)) { ?>

        <div class="sin-resultados">
            <span class="sin-resultados-icono">🛒</span>
            <p>Tu carrito está vacío.</p>
        </div>

    <?php } else { ?>

        <div class="peliculas-grid">

            <?php foreach ($items as $id => $cantidad):

                $pelicula = Pelicula::producto_x_id($id);

                if (!$pelicula) continue;

                $subtotal = $pelicula->getPrecio() * $cantidad;
                $total += $subtotal;
            ?>

                <article class="pelicula-card">

                    <div class="pelicula-poster">
                        <img src="assets/img/<?= htmlspecialchars($pelicula->getPoster()) ?>"
                             alt="<?= htmlspecialchars($pelicula->getTitulo()) ?>">
                    </div>

                    <div class="pelicula-body">

                        <h3><?= htmlspecialchars($pelicula->getTitulo()) ?></h3>

                        <p>
                            <strong>Cantidad:</strong>
                            <?= $cantidad ?>
                        </p>

                        <p>
                            <strong>Precio:</strong>
                            <?= htmlspecialchars($pelicula->precio_formateado()) ?>
                        </p>

                        <p>
                            <strong>Subtotal:</strong>
                            $<?= number_format($subtotal, 2, ",", ".") ?>
                        </p>

                        <a href="actions/delete_carrito.php?id=<?= $id ?>" class="btn-eliminar">❌ Quitar</a>
                    </div>

                </article>

            <?php endforeach; ?>

        </div>

        <div class="mt-4">

            <h2>Total: $<?= number_format($total,2,",",".") ?></h2>
            <a href="index.php?sec=checkout" class="hero-cta">
    <i class="bi bi-cash"></i> Pagar
</a>
        <a href="actions/vaciar_carrito.php" class="hero-vaciar">Vaciar carrito</a>
        </div>

    <?php } ?>
    
</section>