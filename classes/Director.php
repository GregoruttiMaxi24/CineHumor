<?php

class Director
{
    private int $id;
    private string $nombre_completo;
    private string $biografia;
    private string $foto_perfil;

    /* =========================
        GET POR ID
    ========================= */

    public static function get_x_id(int $id): ?Director
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM directores WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        return $PDOStatement->fetch() ?: null;
    }

    /* alias para consistencia */
    public static function get_por_id(int $id): ?Director
    {
        return self::get_x_id($id);
    }

    /* =========================
        LISTADO
    ========================= */

    public static function listado_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM directores ORDER BY nombre_completo";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll();
    }

    /* =========================
        INSERT
    ========================= */

    public static function insert(array $data)
{
    $conexion = Conexion::getConexion();

    $query = "INSERT INTO directores
    (nombre_completo, biografia, foto_perfil)
    VALUES
    (:nombre, :bio, :foto)";

    $stmt = $conexion->prepare($query);

    $stmt->execute([
        'nombre' => $data['nombre_completo'],
        'bio'    => $data['biografia'],
        'foto'   => $data['foto_perfil']
    ]);

    return $conexion->lastInsertId();
}

    /* =========================
        EDIT
    ========================= */

    public function edit(array $data)
    {
        $conexion = Conexion::getConexion();

        $query = "UPDATE directores SET
            nombre_completo = :nombre,
            biografia = :bio,
            foto_perfil = :foto
        WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->execute([
            'nombre' => $data['nombre_completo'],
            'bio'    => $data['biografia'],
            'foto'   => $data['foto_perfil'],
            'id'     => $this->id
        ]);
    }

    /* =========================
        DELETE
    ========================= */

    public function delete()
{
    $conexion = Conexion::getConexion();

    $query = "DELETE FROM directores WHERE id = :id";

    $stmt = $conexion->prepare($query);

    $stmt->execute([
        'id' => $this->id
    ]);
}
    /* =========================
        GETTERS
    ========================= */

    public function getId()
    {
        return $this->id;
    }

    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }

    public function getBiografia()
    {
        return $this->biografia;
    }

    public function getFotoPerfil()
    {
        return $this->foto_perfil;
    }
}