<?php
require_once "../functions/autoload.php";

try {

    $carrito = $_SESSION['carrito'] ?? [];

    if (empty($carrito)) {
        header("Location: ../index.php?sec=carrito");
        exit;
    }

    $pdo = Conexion::getConexion();

    $total = 0;
    $items = [];

    foreach ($carrito as $id => $cantidad) {

        $pelicula = Pelicula::producto_x_id($id);
        if (!$pelicula) continue;

        $precio = $pelicula->getPrecio();
        $total += $precio * $cantidad;

        $items[] = [
            'id' => $id,
            'cantidad' => $cantidad,
            'precio' => $precio
        ];
    }

    $usuario_id = $_SESSION['loggedIn']['id'] ?? null;

if (!$usuario_id) {
    header("Location: ../index.php?sec=login");
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO compras (fecha, total, usuario_id)
    VALUES (NOW(), ?, ?)
");

$stmt->execute([$total, $usuario_id]);

    $compra_id = $pdo->lastInsertId();

    $stmtDetalle = $pdo->prepare("
        INSERT INTO compra_detalle (compra_id, pelicula_id, cantidad, precio)
        VALUES (?, ?, ?, ?)
    ");

    foreach ($items as $item) {
        $stmtDetalle->execute([
            $compra_id,
            $item['id'],
            $item['cantidad'],
            $item['precio']
        ]);
    }

    unset($_SESSION['carrito']);

 header("Location: ../index.php?sec=gracias&compra=$compra_id");
exit;

} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}