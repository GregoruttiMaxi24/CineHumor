<?php

class Contacto
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $asunto;
    private string $mensaje;
    private string $fecha;

    public static function crear(
        string $nombre,
        string $email,
        string $asunto,
        string $mensaje
    ): int {

        $conexion = Conexion::getConexion();

        $query = "
            INSERT INTO contacto
            (nombre,email,asunto,mensaje)
            VALUES
            (:nombre,:email,:asunto,:mensaje)
        ";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->execute([
            "nombre" => $nombre,
            "email" => $email,
            "asunto" => $asunto,
            "mensaje" => $mensaje
        ]);

        return (int)$conexion->lastInsertId();
    }

    public static function listado_completo(): array
{
    $conexion = Conexion::getConexion();

    $query = "SELECT * FROM contacto ORDER BY fecha DESC";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->setFetchMode(
        PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
        self::class
    );

    $PDOStatement->execute();

    return $PDOStatement->fetchAll();
}
public function getId()
{
    return $this->id;
}

public function getNombre()
{
    return $this->nombre;
}

public function getEmail()
{
    return $this->email;
}

public function getAsunto()
{
    return $this->asunto;
}

public function getMensaje()
{
    return $this->mensaje;
}

public function getFecha()
{
    return $this->fecha;
}

public static function contacto_x_id(int $id): ?Contacto
{
    $conexion = Conexion::getConexion();

    $query = "SELECT * FROM contacto WHERE id = ?";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->setFetchMode(
        PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
        self::class
    );

    $PDOStatement->execute([$id]);

    return $PDOStatement->fetch() ?: null;
}
}
