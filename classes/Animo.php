<?php

class Animo
{

    private int $id;
    private string $nombre;

    /**
     * Devuelve un estado de ánimo por ID
     *
     * @param int $id
     * @return ?Animo
     */
    public static function get_x_id(int $id): ?Animo
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM estados_animo WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?: null;
    }

    /**
 * Inserta un nuevo estado de ánimo
 */
public static function insert(string $nombre)
{
    $conexion = Conexion::getConexion();

    $query = "INSERT INTO estados_animo (nombre)
              VALUES (:nombre)";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([
        'nombre' => $nombre
    ]);
}

    /**
     * Devuelve el listado completo de estados de ánimo
     *
     * @return Animo[]
     */
    public static function listado_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM estados_animo ORDER BY nombre";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll();
    }


    /**
 * Elimina un estado de ánimo
 */
public function delete()
{
    $conexion = Conexion::getConexion();

    $query = "DELETE FROM estados_animo WHERE id = ?";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([$this->id]);
}
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}