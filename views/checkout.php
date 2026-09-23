<?php
require_once "functions/autoload.php";
$carrito = $_SESSION['carrito'] ?? [];

$total = 0;
?>

<h1>Checkout</h1>

<?php if (empty($carrito)) { ?>

    <p>No hay productos en el carrito.</p>
    <a href="index.php?sec=carrito">Volver</a>

<?php } else { ?>

    <ul>
        <?php foreach ($carrito as $id => $cantidad):

            $pelicula = Pelicula::producto_x_id($id);
            if (!$pelicula) continue;

            $subtotal = $pelicula->getPrecio() * $cantidad;
            $total += $subtotal;
        ?>

            <li>
                <?= htmlspecialchars($pelicula->getTitulo()) ?> |
                <?= $cantidad ?> |
                $<?= number_format($subtotal, 2, ",", ".") ?>
            </li>

        <?php endforeach; ?>
    </ul>

    <h3>Total: $<?= number_format($total, 2, ",", ".") ?></h3>

    <a href="actions/finalizar_compra.php" class="hero-cta">
    Confirmar pago
</a>

    <a href="index.php?sec=carrito">Volver al carrito</a>

<?php } ?>