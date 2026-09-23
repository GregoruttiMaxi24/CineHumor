<?php

class Actor
{
    private int $id;
    private string $nombre_completo;
    private string $biografia;
    private ?string $foto_perfil = null;

    /**
     * Devuelve el listado de actores que participan en alguna película
     *
     * @return array
     */
    public static function listado_menu(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT DISTINCT actores.id, actores.nombre_completo
                  FROM actores
                  JOIN pelicula_x_actor
                  ON actores.id = pelicula_x_actor.actor_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll();
    }

    /**
     * Devuelve todos los actores
     *
     * @return Actor[]
     */
    public static function listado_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM actores";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll();
    }

    /**
     * Inserta un actor
     */
    public static function insert(array $data)
{
    $conexion = Conexion::getConexion();

    $query = "INSERT INTO actores
    (nombre_completo,biografia,foto_perfil)
    VALUES
    (:nombre,:bio,:foto)";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([

        'nombre'=>$data['nombre_completo'],
        'bio'=>$data['biografia'],
        'foto'=>$data['foto_perfil']

    ]);

    return $conexion->lastInsertId();
}

    /**
     * Editar actor
     */
   public function edit(array $data)
{
    $conexion = Conexion::getConexion();

    $query = "UPDATE actores SET

        nombre_completo=:nombre,
        biografia=:bio,
        foto_perfil=:foto

        WHERE id=:id";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([

        'nombre'=>$data['nombre_completo'],
        'bio'=>$data['biografia'],
        'foto'=>$data['foto_perfil'],
        'id'=>$this->id

    ]);
}

    /**
     * Eliminar actor
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();

        $query = "DELETE FROM actores WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Buscar por ID
     */
    public static function get_x_id(int $id): ?Actor
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM actores WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        return $PDOStatement->fetch() ?: null;
    }

    /**
     * Devuelve el nombre del actor
     */
    public function getTitulo(): string
    {
        return $this->nombre_completo;
    }

    public static function get_por_id(int $id): ?Actor
{
    return self::get_x_id($id);
}
    // GETTERS Y SETTERS

    public function getId()
    {
        return $this->id;
    }

    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }

    public function setNombreCompleto($nombre)
    {
        $this->nombre_completo = $nombre;
        return $this;
    }

    public function getBiografia()
    {
        return $this->biografia;
    }

    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;
        return $this;
    }

    public function getFotoPerfil()
    {
        return $this->foto_perfil;
    }

    public function setFotoPerfil($foto)
    {
        $this->foto_perfil = $foto;
        return $this;
    }

  
}