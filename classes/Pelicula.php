<?php

class Pelicula
{

    /* ===========================
            PROPIEDADES
    =========================== */

    private int $id;

    private Director $director;
    private Guionista $guionista;

    private array $actores;
    private array $generos;
    private array $animos;

    private string $titulo;
    private int $duracion;
    private float $puntaje;
    private string $estreno;
    private string $productora;
    private string $sinopsis;
    private string $poster;
    private float $precio;

    /**
     * Campos simples de la tabla peliculas.
     */
    private static $createValues = [
        "id",
        "titulo",
        "duracion",
        "puntaje",
        "estreno",
        "productora",
        "sinopsis",
        "poster",
        "precio"
    ];

    /* ===========================
            CREATE PELICULA
    =========================== */

    /**
     * Crea una instancia completa de Pelicula.
     */
    private static function createPelicula($peliculaData): Pelicula
    {

        $pelicula = new self();

        foreach (self::$createValues as $value) {
            $pelicula->{$value} = $peliculaData[$value];
        }

        /* Director */

        $pelicula->director = Director::get_x_id(
            $peliculaData["director_id"]
        );

        /* Guionista */

        $pelicula->guionista = Guionista::get_x_id(
            $peliculaData["guionista_id"]
        );

        /* Actores */

        $actorIds = !empty($peliculaData["actores"])
            ? explode(",", $peliculaData["actores"])
            : [];

        $actores = [];

        foreach ($actorIds as $id) {

            $actor = Actor::get_x_id($id);

            if ($actor != null) {
                $actores[] = $actor;
            }
        }

        $pelicula->actores = $actores;

        /* Géneros */

        $generoIds = !empty($peliculaData["generos"])
            ? explode(",", $peliculaData["generos"])
            : [];

        $generos = [];

        foreach ($generoIds as $id) {

            $genero = Genero::get_x_id($id);

            if ($genero != null) {
                $generos[] = $genero;
            }
        }

        $pelicula->generos = $generos;

        /* Estados de ánimo */

        $animoIds = !empty($peliculaData["animos"])
            ? explode(",", $peliculaData["animos"])
            : [];

        $animos = [];

        foreach ($animoIds as $id) {

            $animo = Animo::get_x_id($id);

            if ($animo != null) {
                $animos[] = $animo;
            }
        }

        $pelicula->animos = $animos;

        return $pelicula;
    }

    /* ===========================
        CATALOGO COMPLETO
    =========================== */

    /**
     * Devuelve todas las películas.
     *
     * @return Pelicula[]
     */
    public static function catalogo_completo(): array
    {

        $conexion = Conexion::getConexion();

        $query = "SELECT peliculas.*,

                GROUP_CONCAT(DISTINCT pelicula_x_actor.actor_id) AS actores,

                GROUP_CONCAT(DISTINCT pelicula_x_genero.genero_id) AS generos,

                GROUP_CONCAT(DISTINCT pelicula_x_animo.animo_id) AS animos

                FROM peliculas

                LEFT JOIN pelicula_x_actor
                ON peliculas.id = pelicula_x_actor.pelicula_id

                LEFT JOIN pelicula_x_genero
                ON peliculas.id = pelicula_x_genero.pelicula_id

                LEFT JOIN pelicula_x_animo
                ON peliculas.id = pelicula_x_animo.pelicula_id

                GROUP BY peliculas.id

                ORDER BY peliculas.puntaje DESC, peliculas.titulo ASC";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute();

        $catalogo = [];

        while ($result = $PDOStatement->fetch()) {

            $catalogo[] = self::createPelicula($result);
        }

        return $catalogo;
    }

    /* ===========================
        PRODUCTO POR ID
    =========================== */

    /**
     * Devuelve una película por su ID.
     */
    public static function producto_x_id(int $id): ?Pelicula
    {

        $conexion = Conexion::getConexion();

        $query = "SELECT peliculas.*,

                GROUP_CONCAT(DISTINCT pelicula_x_actor.actor_id) AS actores,

                GROUP_CONCAT(DISTINCT pelicula_x_genero.genero_id) AS generos,

                GROUP_CONCAT(DISTINCT pelicula_x_animo.animo_id) AS animos

                FROM peliculas

                LEFT JOIN pelicula_x_actor
                ON peliculas.id = pelicula_x_actor.pelicula_id

                LEFT JOIN pelicula_x_genero
                ON peliculas.id = pelicula_x_genero.pelicula_id

                LEFT JOIN pelicula_x_animo
                ON peliculas.id = pelicula_x_animo.pelicula_id

                WHERE peliculas.id = ?

                GROUP BY peliculas.id";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute([$id]);

        $resultado = $PDOStatement->fetch();

        if (!$resultado) {
            return null;
        }

        return self::createPelicula($resultado);
    }
            /**
     * Devuelve todas las películas de un director.
     *
     * @param int $directorID
     * @return Pelicula[]
     */
    
    public static function catalogo_x_director(int $directorID): array
    {

        $conexion = Conexion::getConexion();

        $query = "SELECT peliculas.*,

                GROUP_CONCAT(DISTINCT pelicula_x_actor.actor_id) AS actores,

                GROUP_CONCAT(DISTINCT pelicula_x_genero.genero_id) AS generos,

                GROUP_CONCAT(DISTINCT pelicula_x_animo.animo_id) AS animos

                FROM peliculas

                LEFT JOIN pelicula_x_actor
                    ON peliculas.id = pelicula_x_actor.pelicula_id

                LEFT JOIN pelicula_x_genero
                    ON peliculas.id = pelicula_x_genero.pelicula_id

                LEFT JOIN pelicula_x_animo
                    ON peliculas.id = pelicula_x_animo.pelicula_id

                WHERE peliculas.director_id = ?

                GROUP BY peliculas.id

                ORDER BY peliculas.titulo";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute([$directorID]);

        $catalogo = [];

        while ($resultado = $PDOStatement->fetch()) {

            $catalogo[] = self::createPelicula($resultado);

        }

        return $catalogo;

    }

    /**
     * Devuelve todas las películas de un guionista.
     *
     * @param int $guionistaID
     * @return Pelicula[]
     */
    public static function catalogo_x_guionista(int $guionistaID): array
    {

        $conexion = Conexion::getConexion();

        $query = "SELECT peliculas.*,

                GROUP_CONCAT(DISTINCT pelicula_x_actor.actor_id) AS actores,

                GROUP_CONCAT(DISTINCT pelicula_x_genero.genero_id) AS generos,

                GROUP_CONCAT(DISTINCT pelicula_x_animo.animo_id) AS animos

                FROM peliculas

                LEFT JOIN pelicula_x_actor
                    ON peliculas.id = pelicula_x_actor.pelicula_id

                LEFT JOIN pelicula_x_genero
                    ON peliculas.id = pelicula_x_genero.pelicula_id

                LEFT JOIN pelicula_x_animo
                    ON peliculas.id = pelicula_x_animo.pelicula_id

                WHERE peliculas.guionista_id = ?

                GROUP BY peliculas.id

                ORDER BY peliculas.titulo";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute([$guionistaID]);

        $catalogo = [];

        while ($resultado = $PDOStatement->fetch()) {

            $catalogo[] = self::createPelicula($resultado);

        }

        return $catalogo;

    }

    /**
     * Devuelve todas las películas de un género.
     *
     * @param int $generoID
     * @return Pelicula[]
     */
    public static function catalogo_x_genero(int $generoID): array
    {

        $conexion = Conexion::getConexion();

        $query = "SELECT peliculas.*,

                GROUP_CONCAT(DISTINCT pelicula_x_actor.actor_id) AS actores,

                GROUP_CONCAT(DISTINCT pelicula_x_genero.genero_id) AS generos,

                GROUP_CONCAT(DISTINCT pelicula_x_animo.animo_id) AS animos

                FROM peliculas

                INNER JOIN pelicula_x_genero
                    ON peliculas.id = pelicula_x_genero.pelicula_id

                LEFT JOIN pelicula_x_actor
                    ON peliculas.id = pelicula_x_actor.pelicula_id

                LEFT JOIN pelicula_x_animo
                    ON peliculas.id = pelicula_x_animo.pelicula_id

                WHERE pelicula_x_genero.genero_id = ?

                GROUP BY peliculas.id

                ORDER BY peliculas.titulo";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute([$generoID]);

        $catalogo = [];

        while ($resultado = $PDOStatement->fetch()) {

            $catalogo[] = self::createPelicula($resultado);

        }

        return $catalogo;

    }

    /**
     * Devuelve todas las películas asociadas a un estado de ánimo.
     *
     * @param int $animoID
     * @return Pelicula[]
     */
    public static function catalogo_x_animo(int $animoID): array
    {

        $conexion = Conexion::getConexion();

        $query = "SELECT peliculas.*,

                GROUP_CONCAT(DISTINCT pelicula_x_actor.actor_id) AS actores,

                GROUP_CONCAT(DISTINCT pelicula_x_genero.genero_id) AS generos,

                GROUP_CONCAT(DISTINCT pelicula_x_animo.animo_id) AS animos

                FROM peliculas

                INNER JOIN pelicula_x_animo
                    ON peliculas.id = pelicula_x_animo.pelicula_id

                LEFT JOIN pelicula_x_actor
                    ON peliculas.id = pelicula_x_actor.pelicula_id

                LEFT JOIN pelicula_x_genero
                    ON peliculas.id = pelicula_x_genero.pelicula_id

                WHERE pelicula_x_animo.animo_id = ?

                GROUP BY peliculas.id

                ORDER BY peliculas.titulo";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute([$animoID]);

        $catalogo = [];

        while ($resultado = $PDOStatement->fetch()) {

            $catalogo[] = self::createPelicula($resultado);

        }

        return $catalogo;

    }

    /**
     * Busca películas cuyo título, sinopsis, director o actores
     * coincidan (parcialmente) con el texto buscado.
     *
     * @param string $texto Texto a buscar
     * @return Pelicula[]
     */
    public static function buscar(string $texto): array
    {

        $conexion = Conexion::getConexion();

        $query = "SELECT DISTINCT peliculas.*,

                GROUP_CONCAT(DISTINCT pelicula_x_actor.actor_id) AS actores,

                GROUP_CONCAT(DISTINCT pelicula_x_genero.genero_id) AS generos,

                GROUP_CONCAT(DISTINCT pelicula_x_animo.animo_id) AS animos

                FROM peliculas

                LEFT JOIN pelicula_x_actor
                    ON peliculas.id = pelicula_x_actor.pelicula_id

                LEFT JOIN pelicula_x_genero
                    ON peliculas.id = pelicula_x_genero.pelicula_id

                LEFT JOIN pelicula_x_animo
                    ON peliculas.id = pelicula_x_animo.pelicula_id

                LEFT JOIN directores
                    ON peliculas.director_id = directores.id

                LEFT JOIN actores
                    ON pelicula_x_actor.actor_id = actores.id

                WHERE peliculas.titulo LIKE :texto
                    OR peliculas.sinopsis LIKE :texto
                    OR directores.nombre_completo LIKE :texto
                    OR actores.nombre_completo LIKE :texto

                GROUP BY peliculas.id

                ORDER BY peliculas.puntaje DESC, peliculas.titulo ASC";

        $PDOStatement = $conexion->prepare($query);

        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);

        $PDOStatement->execute([

            'texto' => '%' . $texto . '%'

        ]);

        $catalogo = [];

        while ($resultado = $PDOStatement->fetch()) {

            $catalogo[] = self::createPelicula($resultado);

        }

        return $catalogo;

    }

    /**
 * Inserta una nueva película
 *
 * @return int ID de la película creada
 */
public static function insert(array $data): int
{
    $conexion = Conexion::getConexion();

    $query = "INSERT INTO peliculas
    (
        titulo,
        director_id,
        guionista_id,
        duracion,
        puntaje,
        estreno,
        productora,
        sinopsis,
        poster,
        precio
    )
    VALUES
    (
        :titulo,
        :director,
        :guionista,
        :duracion,
        :puntaje,
        :estreno,
        :productora,
        :sinopsis,
        :poster,
        :precio
    )";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([
        'titulo' => $data['titulo'],
        'director' => $data['director_id'],
        'guionista' => $data['guionista_id'],
        'duracion' => $data['duracion'],
        'puntaje' => $data['puntaje'],
        'estreno' => $data['estreno'],
        'productora' => $data['productora'],
        'sinopsis' => $data['sinopsis'],
        'poster' => $data['poster'],
        'precio' => $data['precio']
    ]);

    return $conexion->lastInsertId();
}
/**
 * Edita la película actual
 */
public function edit(

    string $titulo,
    int $director_id,
    int $guionista_id,
    int $duracion,
    float $puntaje,
    string $estreno,
    string $productora,
    string $sinopsis,
    string $poster,
    float $precio

)
{

    $conexion = Conexion::getConexion();

    $query = "UPDATE peliculas SET

        titulo = :titulo,
        director_id = :director,
        guionista_id = :guionista,
        duracion = :duracion,
        puntaje = :puntaje,
        estreno = :estreno,
        productora = :productora,
        sinopsis = :sinopsis,
        poster = :poster,
        precio = :precio

        WHERE id = :id";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([

        'titulo'=>$titulo,
        'director'=>$director_id,
        'guionista'=>$guionista_id,
        'duracion'=>$duracion,
        'puntaje'=>$puntaje,
        'estreno'=>$estreno,
        'productora'=>$productora,
        'sinopsis'=>$sinopsis,
        'poster'=>$poster,
        'precio'=>$precio,
        'id'=>$this->id

    ]);

}
public static function get_por_id(int $id): ?Pelicula
{
    return self::producto_x_id($id);
}
/**
 * Elimina la película
 */
public function delete()
{

    $conexion = Conexion::getConexion();

    $query = "DELETE FROM peliculas WHERE id = ?";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([$this->id]);

}

/**
 * Agrega un actor
 */
public static function add_actor(int $pelicula_id, int $actor_id)
{
    $conexion = Conexion::getConexion();

    $query = "INSERT INTO pelicula_x_actor
              (pelicula_id, actor_id)
              VALUES (:pelicula, :actor)";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([
        'pelicula' => $pelicula_id,
        'actor' => $actor_id
    ]);
}
/**
 * Vaciar actores
 */
public function clear_actores()
{

    $conexion = Conexion::getConexion();

    $query = "DELETE FROM pelicula_x_actor
    WHERE pelicula_id = :pelicula";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([

        'pelicula'=>$this->id

    ]);

}
/**
 * Agregar genero
 */
public static function add_genero(int $pelicula_id,int $genero_id)
{

    $conexion = Conexion::getConexion();

    $query = "INSERT INTO pelicula_x_genero
(pelicula_id, genero_id)
VALUES (:pelicula, :genero)";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([

        'pelicula'=>$pelicula_id,
        'genero'=>$genero_id

    ]);

}
/**
 * Vaciar generos
 */
public function clear_generos()
{

    $conexion = Conexion::getConexion();

    $query = "DELETE FROM pelicula_x_genero
    WHERE pelicula_id = :pelicula";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([

        'pelicula'=>$this->id

    ]);

}
/**
 * agregar estado de animo
 */
public static function add_animo(int $pelicula_id,int $animo_id)
{

    $conexion = Conexion::getConexion();

    $query = "INSERT INTO pelicula_x_animo
(pelicula_id, animo_id)
VALUES (:pelicula, :animo)";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([

        'pelicula'=>$pelicula_id,
        'animo'=>$animo_id

    ]);

}
/**
 * vaciar estado de animo
 */
public function clear_animos()
{

    $conexion = Conexion::getConexion();

    $query = "DELETE FROM pelicula_x_animo
    WHERE pelicula_id = :pelicula";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->execute([

        'pelicula'=>$this->id

    ]);
    }

    /**
 * Devuelve el nombre completo de la película.
 *
 * Ejemplo:
 * Interestelar (2014) • 2h 49 min
 */
public function nombre_completo(): string
{
    return $this->titulo .
        " (" . $this->estreno . ")" .
        " • " . $this->duracion_formateada();
}


/**
 * Devuelve el precio formateado.
 *
 * Ejemplo:
 * $12.500,00
 */
public function precio_formateado(): string
{
    return "$" . number_format($this->precio, 2, ",", ".");
}


/**
 * Devuelve la duración en formato legible.
 *
 * Ejemplo:
 * 169 -> 2h 49 min
 */
public function duracion_formateada(): string
{
    $horas = floor($this->duracion / 60);
    $minutos = $this->duracion % 60;

    if ($horas > 0) {
        return $horas . "h " . $minutos . " min";
    }

    return $minutos . " min";
}


/**
 * Devuelve una versión reducida de la sinopsis.
 *
 * @param int $cantidad Cantidad máxima de palabras.
 */
public function sinopsis_reducida(int $cantidad = 20): string
{
    $texto = $this->sinopsis;

    $array = explode(" ", $texto);

    if (count($array) <= $cantidad) {
        return $texto;
    }

    array_splice($array, $cantidad);

    return implode(" ", $array) . "...";
}


/**
 * Devuelve un array con los IDs de los actores.
 */
public function getActoresIds(): array
{
    $resultado = [];

    foreach ($this->actores as $actor) {
        $resultado[] = intval($actor->getId());
    }

    return $resultado;
}


/**
 * Devuelve un array con los IDs de los géneros.
 */
public function getGenerosIds(): array
{
    $resultado = [];

    foreach ($this->generos as $genero) {
        $resultado[] = intval($genero->getId());
    }

    return $resultado;
}


/**
 * Devuelve un array con los IDs de los estados de ánimo.
 */
public function getAnimosIds(): array
{
    $resultado = [];

    foreach ($this->animos as $animo) {
        $resultado[] = intval($animo->getId());
    }

    return $resultado;
}

public function getId()
{
    return $this->id;
}

public function getTitulo()
{
    return $this->titulo;
}

public function getDirector()
{
    return $this->director;
}

public function getGuionista()
{
    return $this->guionista;
}

public function getActores()
{
    return $this->actores;
}

public function getGeneros()
{
    return $this->generos;
}

public function getAnimos()
{
    return $this->animos;
}

public function getDuracion()
{
    return $this->duracion;
}

public function getPuntaje()
{
    return $this->puntaje;
}

public function getEstreno()
{
    return $this->estreno;
}

public function getProductora()
{
    return $this->productora;
}

public function getSinopsis()
{
    return $this->sinopsis;
}

public function getPoster()
{
    return $this->poster;
}

public function getPrecio()
{
    return $this->precio;
}

public function setId($id)
{
    $this->id = $id;

    return $this;
}

public function setTitulo($titulo)
{
    $this->titulo = $titulo;

    return $this;
}

public function setDirector($director)
{
    $this->director = $director;

    return $this;
}

public function setGuionista($guionista)
{
    $this->guionista = $guionista;

    return $this;
}

public function setActores($actores)
{
    $this->actores = $actores;

    return $this;
}

public function setGeneros($generos)
{
    $this->generos = $generos;

    return $this;
}

public function setAnimos($animos)
{
    $this->animos = $animos;

    return $this;
}

public function setDuracion($duracion)
{
    $this->duracion = $duracion;

    return $this;
}

public function setPuntaje($puntaje)
{
    $this->puntaje = $puntaje;

    return $this;
}

public function setEstreno($estreno)
{
    $this->estreno = $estreno;

    return $this;
}

public function setProductora($productora)
{
    $this->productora = $productora;

    return $this;
}

public function setSinopsis($sinopsis)
{
    $this->sinopsis = $sinopsis;

    return $this;
}

public function setPoster($poster)
{
    $this->poster = $poster;

    return $this;
}

public function setPrecio($precio)
{
    $this->precio = $precio;

    return $this;
}
    }