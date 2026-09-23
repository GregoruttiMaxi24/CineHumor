<?php
require_once "functions/autoload.php";
$usuario = $_SESSION['loggedIn']['nombre_completo'] ?? 'Usuario';
$compra_id = (int) ($_GET['compra'] ?? 0);

if (!$compra_id) {
    echo "No hay compra";
    exit;
}

$compra = Compra::obtener_por_id($compra_id);
$detalles = Compra::detalle_por_compra($compra_id);

$total = $compra['total'] ?? 0;
?>

<section class="ticket-container">

    <div class="ticket">

        <div class="ticket-header">
    <h1>🎬 CineHumor</h1>
    <p>Ticket de compra</p>

    <p class="ticket-user">
        Gracias <?= htmlspecialchars($usuario) ?> por tu compra 🍿
    </p>
</div>

        <div class="ticket-body">

            <p><strong>N° de compra:</strong> #<?= $compra_id ?></p>
            <p><strong>Fecha:</strong> <?= $compra['fecha'] ?></p>

            <hr>

            <h3>🎟 Películas compradas:</h3>

            <?php foreach ($detalles as $item) { ?>

                <p>
                    🎬 <?= htmlspecialchars($item['titulo']) ?>
                    | Cantidad: <?= $item['cantidad'] ?>
                    | $<?= number_format($item['precio'], 2, ",", ".") ?>
                </p>

            <?php } ?>

            <hr>

            <h3>Total: $<?= number_format($total, 2, ",", ".") ?></h3>

            <hr>

            <p class="ticket-footer">
                Gracias por tu compra 🍿
            </p>

        </div>

    </div>

    <a href="index.php?sec=catalogo" class="hero-cta">
        Volver al catálogo
    </a>

</section>