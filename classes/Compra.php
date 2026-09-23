<?PHP
class Compra
{
    public static function obtener_por_id(int $id)
    {
        $db = Conexion::getConexion();

        $stmt = $db->prepare("SELECT * FROM compras WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function detalle_por_compra(int $id)
    {
        $db = Conexion::getConexion();

        $stmt = $db->prepare("
            SELECT cd.*, p.titulo
            FROM compra_detalle cd
            INNER JOIN peliculas p ON p.id = cd.pelicula_id
            WHERE cd.compra_id = ?
        ");

        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}