<?php

class Genero
{

    private int $id;
    private string $nombre;

    /**
     * Devuelve un género por ID
     *
     * @param int $id
     * @return ?Genero
     */
    public static function get_x_id(int $id): ?Genero
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM generos WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch();

        return $result ?: null;
    }

    /**
     * Devuelve el listado completo de géneros
     *
     * @return Genero[]
     */
    public static function listado_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM generos ORDER BY nombre";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll();
    }

    /**
 * Inserta un nuevo género
 */
public static function insert(string $nombre)
{
    $conexion = Conexion::getConexion();

    $query = "INSERT INTO generos (nombre)
              VALUES (:nombre)";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([
        'nombre' => $nombre
    ]);
}

/**
 * Elimina un género
 */
public function delete()
{
    $conexion = Conexion::getConexion();

    $query = "DELETE FROM generos WHERE id = ?";

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