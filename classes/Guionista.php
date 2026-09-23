<?PHP

class Guionista
{

    private int $id;
    private string $nombre_completo;
    private string $biografia;
    private string $foto_perfil;


    /**
     * Devuelve los datos de un guionista en particular
     * @param int $id El ID único del guionista 
     */
    public static function get_x_id(int $id): ?Guionista
    {
        $conexion = Conexion::getConexion();
        $query = "SELECT * FROM guionistas WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $result = $PDOStatement->fetch(); 
   
        return $result ? $result : null;
    }


     /**
     * Devuelve el listado completo de guionistas disponibles
     * 
     * @return Guionista[] Un array de objetos Guionista
     */
    public static function listado_completo(): array
{
    $conexion = Conexion::getConexion();

    $query = "SELECT * FROM guionistas";

    $stmt = $conexion->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
    $stmt->execute();

    return $stmt->fetchAll();
}

public static function insert(
    string $nombre_completo,
    string $biografia,
    string $foto_perfil
) {

    $conexion = Conexion::getConexion();

    $query = "INSERT INTO guionistas
              (nombre_completo, biografia, foto_perfil)
              VALUES
              (:nombre_completo, :biografia, :foto_perfil)";

    $stmt = $conexion->prepare($query);

    $stmt->execute([
        'nombre_completo' => $nombre_completo,
        'biografia' => $biografia,
        'foto_perfil' => $foto_perfil
    ]);
}

public function edit(
    string $nombre_completo,
    string $biografia,
    string $foto_perfil
) {

    $conexion = Conexion::getConexion();

    $query = "UPDATE guionistas
              SET nombre_completo = :nombre_completo,
                  biografia = :biografia,
                  foto_perfil = :foto_perfil
              WHERE id = :id";

    $stmt = $conexion->prepare($query);

    $stmt->execute([
        'nombre_completo' => $nombre_completo,
        'biografia' => $biografia,
        'foto_perfil' => $foto_perfil,
        'id' => $this->id
    ]);
}

public function delete()
{
    $conexion = Conexion::getConexion();

    $query = "DELETE FROM guionistas WHERE id = ?";

    $stmt = $conexion->prepare($query);
    $stmt->execute([$this->id]);
}
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre_completo
     */ 
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Set the value of nombre_completo
     *
     * @return  self
     */ 
    public function setNombre_completo($nombre_completo)
    {
        $this->nombre_completo = $nombre_completo;

        return $this;
    }

    /**
     * Get the value of biografia
     */ 
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Set the value of biografia
     *
     * @return  self
     */ 
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;

        return $this;
    }

    /**
     * Get the value of foto_perfil
     */ 
    public function getFoto_perfil()
    {
        return $this->foto_perfil;
    }

    /**
     * Set the value of foto_perfil
     *
     * @return  self
     */ 
    public function setFoto_perfil($foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;

        return $this;
    }
}