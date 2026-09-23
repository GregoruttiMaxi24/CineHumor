-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2026 a las 19:17:20
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cinehumor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(150) NOT NULL,
  `biografia` text DEFAULT NULL,
  `foto_perfil` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `nombre_completo`, `biografia`, `foto_perfil`) VALUES
(1, 'Leonardo DiCaprio', 'Leonardo Wilhelm DiCaprio (pronunciado /diˈkaːprjo/; Los Ángeles, 11 de noviembre de 1974) es un actor y productor de cine estadounidense.[1] Es ganador de numerosos premios, entre los que destacan un Óscar al mejor actor y un premio BAFTA al mejor actor por su actuación en El renacido (2015); dos Globos de Oro al mejor actor de drama por sus actuaciones en El aviador (2004) y El renacido; y un Globo de Oro al mejor actor de comedia o musical por El lobo de Wall Street (2013). Adicionalmente, ha ganado el premio del Sindicato de Actores, el Oso de Plata y un Premio Chlotrudis.[2] Hasta 2019, sus películas habían recaudado aproximadamente 7200 millones de dólares, y ha estado ocho veces en la lista de los actores mejor pagados del año', 'dicaprio.webp'),
(3, 'Tom Hardy', 'Tom Hardy (Londres, 1977) es un aclamado actor y productor británico, reconocido por su versatilidad y su intensa presencia física y actoral. Tras superar problemas de adicción en su juventud, debutó en 2001 en la miniserie *Hermanos de sangre* y en la película *Black Hawk derribado*. \r\n\r\nAlcanzó la fama mundial por su camaleónica transformación en *Bronson* (2008) y por sus colaboraciones con Christopher Nolan, especialmente como el villano Bane en *El caballero oscuro: La leyenda renace* (2012). Entre sus papeles más icónicos destacan *Mad Max: Furia en la carretera* (2015), su nominación al Óscar por *El renacido* (2015) y su protagónico en la saga *Venom*. En televisión, ha brillado en series como *Peaky Blinders* y *Taboo*.', 'hardy.webp'),
(4, 'Morgan Freeman', 'Morgan Porterfield Freeman Jr.​, conocido como Morgan Freeman, es un actor y documentalista estadounidense, ganador del premio Óscar al mejor actor de reparto en 2005 por la película Million Dollar Baby.', 'freeman.webp'),
(5, 'Brad Pitt', 'William Bradley Pitt, conocido como Brad Pitt, es un actor, modelo y productor de cine estadounidense. Por su trabajo interpretativo ha sido nominado cuatro veces a los Premios Óscar, alzándose con la estatuilla como mejor actor de reparto por su actuación en Once Upon a Time in Hollywood​.', 'brad.jpg'),
(6, 'Matthew McConaughey', 'Matthew McConaughey es un aclamado actor y productor estadounidense, nacido el 4 de noviembre de 1969 en Uvalde, Texas. Ganador del premio Óscar, es reconocido por su versatilidad, habiendo transitado desde exitosas comedias románticas aclamadas en los años 2000 hasta obtener el reconocimiento de la crítica con profundos dramas y éxitos de taquilla', 'mcconaughey.webp'),
(7, 'Jessica Chastain', 'Jessica Michelle Chastain, conocida como Jessica Chastain, es una actriz y productora de cine estadounidense. En su carrera ha recibido varios premios y nominaciones: entre ellos, un Premio Óscar, un Globo de Oro y tres Premios SAG. Es fundadora de la productora de cine y televisión Freckle Films creada en 2016.', 'chastain.jpg'),
(8, 'Kate Winslet', 'Kate Elizabeth Winslet es una actriz británica de cine, televisión y teatro. Ha trabajado mayoritariamente en películas independientes, sobre todo en dramas de época, y suele interpretar personajes complejos.', 'winslet.jpg'),
(9, 'Cillian Murphy', 'Cillian Murphy es un actor, actor de voz, músico y productor irlandés. Comenzó a mostrar interés por la música desde temprana edad y con diez años ya había compuesto varias canciones. Tras culminar la secundaria, fundó con su hermano la banda The Sons of Mr.', 'murphy.jpg'),
(10, 'Christoph Waltz', 'Christoph Waltz es un actor austriaco-alemán nacionalizado estadounidense, ​​​ que obtuvo reconocimiento internacional por sus interpretaciones de villanos en el cine', 'waltz.jpg'),
(11, 'Jamie Foxx', 'ric Marlon Bishop (Terrell, Texas; 13 de diciembre de 1967), más conocido como Jamie Foxx, es un actor, comediante, productor discográfico y cantante de R&B estadounidense. Foxx se hizo muy conocido por su interpretación de Ray Charles en la película biográfica Ray de 2004, por la que ganó un Premio Óscar, un Globo de Oro, un BAFTA y un Premio del Sindicato de Actores como Mejor Actor, siendo uno de los pocos actores afroamericanos en ganar los premios principales en la industria cinematográfica. Ese mismo año, fue nominado al Óscar al Mejor Actor de Reparto por su papel en la película policial Collateral. Desde la primavera de 2017, Foxx se ha desempeñado como anfitrión y productor ejecutivo del programa de juegos de FOX, Beat Shazam. Interpretando al personaje de \"Electro\" en The Amazing Spider-Man 2: Rise of Electro en 2014 y en Spider-Man: No Way Home del 2021, donde compartió créditos con Willem Dafoe y Alfred Molina.', 'foxx.jpg'),
(12, 'Walton Goggins', 'Walton Sanders Goggins Jr. es un actor estadounidense, principalmente conocido por su papel protagonista en la serie original de FX Networks The Shield, interpretando al detective Shane Vendrell y como el renegado Chris Mannix en la película de Quentin Tarantino The Hateful Eight', 'goggins.webp'),
(13, 'Robert De Niro', 'Robert De Niro (nacido el 17 de agosto de 1943 en Manhattan) es uno de los actores más aclamados de la historia del cine. Famoso por su método de inmersión total, ha ganado dos premios Óscar por sus legendarios papeles en El padrino: Parte II (1974) y Toro salvaje (1980).', 'deniro.jpg'),
(15, 'Christian Bale', 'Christian Charles Philip Bale es un actor británico-estadounidense.ganador de dos Globos de Oro, dos premios del SAG y un Óscar. Se le considera uno de los actores del estilo de método más importantes de su generación, debido a su intensidad y a las transformaciones drásticas de su cuerpo en diversos papeles', 'blae.jpg'),
(16, 'Joaquin Phoenix', 'Joaquin Rafael Phoenix (nacido como Joaquín Rafael Bottom; Río Piedras, San Juan; 28 de octubre de 1974) es un actor y músico estadounidense, ganador de un Óscar y nominado en cuatro ocasiones a la estatuilla, ganador de dos Globos de Oro, un SAG, un BAFTA, dos Critics Choice Awards, de la Copa Volpi en el Festival Internacional de Cine de Venecia y del premio a Mejor Actor en el Festival de Cannes. Es hermano del actor River Phoenix, y de las actrices Rain, Summer y Liberty Phoenix.', 'phoenix.jpg'),
(17, 'Ryan Gosling', 'Ryan Thomas Gosling es un actor y músico canadiense. También ha incursionado en la dirección y producción cinematográfica.', 'gosling.jpg'),
(18, 'Harrison Ford', 'Harrison Ford es un actor, productor de cine, y actor de voz estadounidense de cine y televisión. Es recordado por haber interpretado el personaje de Indiana Jones en la saga homónima y por haber interpretado al personaje de Han Solo en la saga de ciencia ficción Star Wars.', 'ford.webp'),
(19, 'Edward Norton', 'Edward Harrison Norton es un actor, guionista, director y productor de cine estadounidense.​​ Ha ganado un Globo de Oro y ha sido nominado en cuatro ocasiones al Óscar.', 'norton.jpg'),
(20, 'Brad Renfro', 'Brad Barron Renfro fue un actor y músico estadounidense. Debutó en 1994 en la película El cliente. Actuó en 21 películas, algunos cortos y en un episodio de televisión durante toda su carrera. La última parte de su carrera se vio ensombrecida por abuso de sustancias y otros problemas personales. ', 'renfro.webp'),
(21, 'Russell Crowe', 'Russell Ira Crowe (Wellington, 7 de abril de 1964) es un actor, director, productor de cine y músico neozelandés. Crowe captó la atención internacional por su papel como el general romano Máximo Décimo Meridio en la histórica película épica Gladiator (2000)', 'crowe.jpg'),
(22, 'Anne Hathaway', 'Anne Jacqueline Hathaway es una actriz estadounidense que también se ha desempeñado de manera eventual como productora y modelo. Figura entre las actrices mejores remuneradas de la industria desde 2015', 'hathaway.jpg'),
(23, 'Amy Adams', 'Amy Lou Adams es una actriz estadounidense, conocida por sus actuaciones tanto cómicas como dramáticas. Ha aparecido en tres ocasiones en los rankings anuales de las actrices mejor pagadas del mundo', 'adams.webp'),
(24, 'Jeremy Renner', 'Jeremy Lee Renner es un actor, actor de voz, productor y músico estadounidense. Inició su carrera como actor en 1995 con apariciones en varios proyectos de su universidad y posteriormente como protagonista de filmes independientes, entre ellos Dahmer, en el que su actuación recibió buenos comentarios.', 'renner.jpg'),
(25, 'Matt Damon', 'Matthew Paige Damon, conocido simplemente como Matt Damon, es un actor, guionista y productor estadounidense. Desde temprana edad se destacó en sus estudios y comenzó a mostrar interés por la actuación durante la secundaria gracias a sus maestros.', 'damon.jpg'),
(26, 'Ben Affleck', 'Benjamin Géza Affleck-Boldt, conocido simplemente como Ben Affleck, es un actor, director, productor y guionista estadounidense.', 'affleck.jpg'),
(27, 'Hugh Jackman', 'Hugh Michael Jackman es un actor, cantante y productor de cine australobritánico.​​Su papel más reconocido es Wolverine en la serie de películas de X-Men y en Deadpool & Wolverine del Universo cinematográfico de Marvel en 2024', 'jackman.jpg'),
(28, 'Scarlett Johansson', 'Scarlett Ingrid Johansson es una actriz estadounidense que también se ha desempeñado de manera eventual como cantante, productora, modelo y directora. En 2025, la recaudación de sus películas como protagonista la convirtió en la estrella de cine más taquillera de la historia hasta entonces', 'scarlett.jpg'),
(29, 'Emma Stone', 'Emily Jean Stone, ​ más conocida como Emma Stone, es una actriz, actriz de voz y productora de cine y televisión estadounidense. Ha recibido numerosos premios, entre ellos dos Óscar, dos BAFTA, tres SAG y dos Globos de Oro a mejor actriz.​ Adicionalmente ha ganado la Copa Volpi.​', 'stone.jpg'),
(30, 'Margot Robbie', 'Margot Elise Robbie es una actriz y productora australiana. Desde temprana edad, comenzó a trabajar para poder ayudar a su familia tras el abandono de su padre, hasta que decidió mudarse a Melbourne para seguir una carrera como actriz.', 'robbie.webp'),
(31, 'Jake Gyllenhaal', 'Jacob Benjamin Gyllenhaal es un actor estadounidense. Comenzó a actuar a la edad de once años, cuando participó en City Slickers, estrenada en 1991', 'gyllenhaal.jpg'),
(32, 'Willem Dafoe', 'William James Dafoe es un actor estadounidense con nacionalidad italiana. Conocido por sus diversos papeles en el cine, ha recibido varios galardones, incluida la Copa Volpi al Mejor Actor, así como nominaciones a cuatro Premios de la Academia, un Premio BAFTA y cuatro Premios Globo de Oro.', 'dafoe.jpg'),
(33, 'Keanu Reeves', 'Keanu Charles Reeves es un actor y músico canadiense.​Su trayectoria cinematográfica abarca más de cuatro décadas y ha recibido diversos reconocimientos por su trabajo en el cine.', 'reeves.jpg'),
(34, 'Laurence Fishburne', 'Laurence John Fishburne III, conocido como Laurence Fishburne, es un actor de cine estadounidense. Destaca principalmente por su rol como Morfeo en la película de ciencia ficción The Matrix y sus secuelas.', 'fishburne.webp'),
(35, 'Tom Hanks', 'Thomas Jeffrey Hanks es un actor, guionista, productor de cine y director de cine estadounidense.​ Es de los intérpretes más reconocidos de Hollywood. Varias de sus películas, sean dramas o comedias, han recibido el reconocimiento internacional.', 'hanks.jpg'),
(36, 'Song Kang-ho', 'Song Kang-ho es un actor surcoreano.​ Se graduó de la Universidad Busan Kyungsang con una licenciatura en radiodifusión, pero comenzó su carrera en grupos de teatro sin preparación profesional como actor. Hizo su debut en 1991 en la obra Dongseung', 'song.webp'),
(37, 'Miles Teller', 'Miles Alexander Teller ​ es un actor estadounidense. Desde joven, mostró interés por la música y el baloncesto, pero finalmente decidió enfocarse en la actuación y se graduó de Bellas artes en la Tisch School of the Arts, perteneciente a la Universidad de Nueva York.', 'teller.jpg'),
(38, 'J. K. Simmons', 'Jonathan Kimble Simmons ​ es un actor estadounidense. Considerado uno de los actores de personajes masculinos más eminentes de su generación, ​​su carrera abarca más de cinco décadas de cine y teatro. Simmons ha recibido varios galardones, incluido un Premio Óscar, un Premio BAFTA y un Globo de Oro.', 'simmons.jpg'),
(39, 'Robert Pattinson', 'Robert Douglas Thomas Pattinson es un actor, modelo, productor y cantante británico. Inició su carrera durante su adolescencia como modelo de varias marcas infantiles, pero tras la llegada de su pubertad comenzó a tener problemas para obtener nuevos empleos, por lo que decidió dedicarse a la actuación.​​', 'pattinson.jpg'),
(40, 'Colin Farrell', 'Colin James Farrell ​ es un actor irlandés. Protagonista de éxitos de taquilla y películas independientes desde la década de 2000, ha recibido varios premios y nominaciones, incluidos dos Globos de Oro y una nominación a un Premio de la Academia.', 'farrell.jpg'),
(41, 'Keir Dullea', 'Keir Dullea es un actor estadounidense de cine y teatro ganador de un Globo de Oro en 1964. Es más conocido por su papel como el astronauta David Bowman en los filmes clásicos de ciencia ficción 2001: Odisea del espacio, dirigida por Stanley Kubrick en 1968, y 2010: Odisea Dos, de 1984, del director Peter Hyams.', 'dullea.jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `total`) VALUES
(1, '2026-06-28 13:43:21', 8.99),
(2, '2026-06-28 14:00:43', 8.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_detalle`
--

CREATE TABLE `compra_detalle` (
  `id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `pelicula_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra_detalle`
--

INSERT INTO `compra_detalle` (`id`, `compra_id`, `pelicula_id`, `cantidad`, `precio`) VALUES
(1, 1, 8, 1, 8.99),
(2, 2, 8, 1, 8.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `asunto` varchar(150) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directores`
--

CREATE TABLE `directores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `biografia` text DEFAULT NULL,
  `foto_perfil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `directores`
--

INSERT INTO `directores` (`id`, `nombre_completo`, `biografia`, `foto_perfil`) VALUES
(1, 'Christopher Nolan', 'Christopher Edward Nolan es un director de cine, guionista, productor y editor británicoestadounidense. Desarrolló un interés por el cine desde una edad temprana. Después de estudiar literatura inglesa en el University College de Londres, debutó en el largometraje con Following.', 'nolan.webp'),
(2, 'Quentin Tarantino', 'Quentin Tarantino (Knoxville, Tennessee, 27 de marzo de 1963) es uno de los directores, guionistas y productores más influyentes del cine contemporáneo. Famoso por sus guiones llenos de diálogos afilados, violencia estilizada y referencias a la cultura pop, su obra ha revolucionado la industria cinematográfica.', 'tarantino.webp'),
(3, 'Steven Spielberg', 'Steven Allan Spielberg es un director, guionista y productor de cine estadounidense.​ Se le considera uno de los pioneros de la era del Nuevo Hollywood y es también uno de los directores más reconocidos y populares de la industria cinematográfica mundial.​En sus películas, ha tratado temas y géneros muy diversos.', 'spielberg.webp'),
(4, 'James Cameron', 'James Francis Cameron es un director, guionista, productor de cine, editor de cine, filántropo y explorador marino canadiense.​​Empezó en la industria del cine como técnico en efectos especiales y después fue guionista y director de la película de acción y ciencia ficción The Terminator.', 'cameron.webp'),
(7, 'Martin Scorsese', 'Martin Charles Scorsese (Nueva York, 17 de noviembre de 1942) es un director, guionista, actor y productor de cine estadounidense. Con una trayectoria que abarca más de cincuenta años, las películas de Scorsese abordan temáticas relacionadas con el catolicismo, la identidad italoestadounidense o la criminalidad, caracterizándose por su violencia, uso del lenguaje vulgar, estar ambientadas en la ciudad de Nueva York y la inclusión de canciones pop, rock y clásicas en la banda sonora. El origen italiano y católico de su familia, su infancia en Little Italy y su afición por el cine italiano y estadounidense de las décadas de 1940 y 1950 influyeron en su obra como cineasta', 'scorsese.webp'),
(9, 'David Fincher', 'David Andrew Leo Fincher (Denver, 28 de agosto de 1962) es un director y productor estadounidense de cine, televisión y vídeos musicales. Fue nominado para el Óscar a mejor director por El curioso caso de Benjamin Button (2008), La red social (2010) y por Mank (2020).\r\n\r\nTambién es conocido por haber dirigido la película de terror y ciencia ficción Alien³ (1992) en su debut como director y los thrillers psicológicos Seven (1995), Fight Club (1999), Perdida (2014), Zodiac (2007) y The Girl with the Dragon Tattoo (2011), entre otras, además de tener un papel decisivo en la creación de las series de televisión House of Cards y Mindhunter, ambas de Netflix.\r\n\r\nSus películas Zodiac y La red social están incluidas en el ranking de la BBC Las 100 mejores películas del siglo XXI.[3', 'fincher.webp'),
(10, 'Ridley Scott', 'Ridley Scott (South Shields, Inglaterra, 30 de noviembre de 1937) es un director de cine, productor y guionista británico. Su amplia filmografía va desde su despegue comercial con la película de terror y ciencia ficción Alien (1979), hasta otros trabajos como el filme distópico neo-noir Blade Runner (1982), la road movie Thelma y Louise (1991), el péplum y drama histórico ganador del Óscar a la mejor película Gladiator (2000) y el film de ciencia ficción The Martian (2015).', 'scott.jpg'),
(11, 'Denis Villeneuve', 'Denis Villeneuve es un director de cine, productor y guionista canadiense. Fue nominado a un premio Óscar en la categoría de mejor dirección por su película La llegada, y ha ganado tres premios Genie como mejor director por sus largometrajes Maelström, Polytechnique e Incendies.', 'villeneuve.webp'),
(12, 'Frank Darabont', 'Frank Darabont (nacido el 28 de enero de 1959) es un aclamado director, guionista y productor estadounidense nacido en Francia. Es mundialmente famoso por escribir y dirigir adaptaciones cinematográficas clásicas de Stephen King, como Sueño de libertad (The Shawshank Redemption) y La milla verde, además de crear la exitosa serie de televisión The Walking Dead.', 'darabont.webp'),
(13, 'Bong Joon-ho', 'Bong Joon-ho es un director de cine y guionista surcoreano. Entre sus trabajos cinematográficos figuran Memorias de un asesino, la película de monstruos The Host, la película de ciencia ficción Snowpiercer y la ganadora del Óscar a Mejor Película, Parásitos.', 'bong.jpg'),
(14, 'Damien Chazelle', 'Damien Sayre Chazelle es un director, guionista y productor de cine estadounidense y francés. Dirigió y escribió Whiplash y La La Land, estrenadas en 2014 y 2016, así como First Man en 2018 y Babylon en 2022.', 'chazelle.webp'),
(15, 'Lana Wachowski', 'Lilly Wachowski (Chicago, Illinois; 21 de junio de 1965) y Lana Wachowski (Chicago, Illinois; 29 de diciembre de 1967), conocidas como las hermanas Wachowski, son dos directoras de cine, guionistas y productoras estadounidenses, creadoras de la saga Matrix. Ambas son mujeres transgénero', 'wachowski.jpg'),
(16, 'Lilly Wachowski', 'Lilly Wachowski (Chicago, Illinois; 21 de junio de 1965) y Lana Wachowski (Chicago, Illinois; 29 de diciembre de 1967), conocidas como las hermanas Wachowski, son dos directoras de cine, guionistas y productoras estadounidenses, creadoras de la saga Matrix. Ambas son mujeres transgénero.', 'lilly.jfif'),
(17, 'Peter Jackson', 'Peter Robert Jackson (Wellington, 31 de octubre de 1961) es un director, guionista y productor de cine neozelandés, conocido especialmente por dirigir, producir y coescribir la trilogía cinematográfica de El Señor de los Anillos: La Comunidad del Anillo (2001), Las dos torres (2002) y El retorno del Rey (2003); así como su precuela, la trilogía de El hobbit: Un viaje inesperado (2012), La desolación de Smaug (2013) y La batalla de los Cinco Ejércitos (2014). Es ganador de tres premios Óscar, un Globo de Oro y tres BAFTA, entre otros galardones. En 2013 fue nombrado miembro de la prestigiosa Orden de Nueva Zelanda', 'jackson.webp'),
(18, 'Todd Phillips', 'Todd Phillips es un director, productor, guionista y actor estadounidense.​​ Ha dirigido películas como Road Trip, Old School, Starsky & Hutch, The Hangover, Due Date, The Hangover Part II, The Hangover Part III y produjo Proyecto X.', 'phillips.jpg'),
(19, 'Stanley Kubrick', 'Stanley Kubrick fue un director de cine, guionista, productor y fotógrafo estadounidense nacionalizado británico. Considerado por muchos como uno de los cineastas más influyentes del siglo XX, destacó tanto por su precisión técnica como por la notable estilización y la profunda carga simbólica de sus películas', 'stanley.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_animo`
--

CREATE TABLE `estados_animo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados_animo`
--

INSERT INTO `estados_animo` (`id`, `nombre`) VALUES
(15, 'Aventurero'),
(9, 'Curioso'),
(3, 'Enojado'),
(12, 'Esperanzado'),
(1, 'Feliz'),
(16, 'Inspirado'),
(7, 'Motivado'),
(5, 'Nostálgico'),
(13, 'Reflexivo'),
(8, 'Relajado'),
(10, 'Romántico'),
(14, 'Sorprendido'),
(11, 'Tenso'),
(4, 'Triste');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(7, 'Acción'),
(16, 'Animación'),
(12, 'Aventura'),
(14, 'Bélico'),
(18, 'Biografía'),
(5, 'Ciencia Ficcion'),
(2, 'Comedia'),
(13, 'Crimen'),
(19, 'Documental'),
(3, 'Drama'),
(20, 'Familiar'),
(11, 'Fantasía'),
(15, 'Histórico'),
(10, 'Misterio'),
(17, 'Musical'),
(6, 'Romance'),
(9, 'Suspenso'),
(4, 'Terror'),
(8, 'Thriller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guionistas`
--

CREATE TABLE `guionistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `biografia` text DEFAULT NULL,
  `foto_perfil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guionistas`
--

INSERT INTO `guionistas` (`id`, `nombre_completo`, `biografia`, `foto_perfil`) VALUES
(1, 'Christopher Nolan', 'También director y guionista. ', 'nolan.webp'),
(2, 'Quentin Tarantino', 'Escribe todos sus filmes.', 'tarantino.webp'),
(3, 'James Cameron', 'Guionista de ciencia ficción épica.', 'cameron.webp'),
(4, 'Jonathan Nolan', 'Jonathan David Nolan es un guionista, productor y director británico-estadounidense, así como también colaborador habitual de su hermano Christopher Nolan. Su cuento Memento Mori fue utilizado por su hermano como base para el guion de la película aclamada por la crítica Memento.​', 'jonathan.webp'),
(5, 'Jim Uhls', 'Jim Uhls (nacido el 25 de marzo de 1957) es un destacado guionista y productor estadounidense, reconocido mundialmente por adaptar la aclamada novela de Chuck Palahniuk para la película de culto Fight Club (1999).', 'uhls.jpg'),
(6, 'David Franzoni', 'David Harold Franzoni es un guionista y productor de cine estadounidense. Concibió la historia, coescribió y coprodujo la película Gladiator del 2000, por la que fue nominado al Premio de la Academia al Mejor Guión Original y ganó el Premio de la Academia a la Mejor Película. ', 'franzoni.jpg'),
(7, 'Andrew Kevin Walker', 'Andrew Kevin Walker es un guionista estadounidense. Es conocido por haber escrito Seven, por la que obtuvo una nominación al Premio BAFTA al Mejor Guion Original, así como varias otras películas, entre ellas 8mm, Sleepy Hollow y muchas reescrituras de guiones no acreditadas.', 'walker.jpg'),
(8, 'Hampton Fancher', 'Hampton Lansden Fancher es un guionista, actor y director estadounidense, conocido principalmente por escribir las películas de ciencia ficción neo-noir Blade Runner y su secuela Blade Runner 2049.​ Por Blade Runner logró el Hugo a la mejor presentación dramática.', 'fancher.webp'),
(9, 'Eric Heisserer', 'Eric Andrew Heisserer es un cineasta, escritor de cómics, escritor de televisión y productor de televisión estadounidense. Su guión para la película La llegada le valió una nominación al Mejor Guión Adaptado en la 89ª edición de los Premios de la Academia en 2016', 'heisserer.jpg'),
(10, 'Terence Winter', 'Terence Winter ​ es un guionista y productor de cine y televisión estadounidense, ganador del premio Emmy. Es el creador, escritor y productor ejecutivo de la serie de HBO, Boardwalk Empire.', 'winter.jpg'),
(11, 'Scott Silver', 'Scott Silver (Worcester (Massachusetts), 30 de noviembre de 1964) es un guionista y director de cine estadounidense.\r\nSilver es conocido por su dirección en Johns y Escuadrón oculto (The Mod Squad), y su trabajo como guionista en películas como 8 Millas (8 Mile), The Fighter, por el que fue nominado al Premio Oscar al mejor guion original,[6] y Joker, por el que fue nominado al Premio Oscar al mejor guion adaptado, junto a Todd Phillips. También escribió el script del personaje de Spawn, titulado King Spawn', 'silver.jpg'),
(12, 'Matt Reeves', 'Matt Reeves (Rockville Centre, Nueva York; 27 de abril de 1966) es un destacado director, guionista y productor de cine y televisión estadounidense. Es ampliamente reconocido por su capacidad para dirigir éxitos taquilleros combinando el cine de superhéroes, la ciencia ficción y el suspenso, además de haber creado el Universo cinematográfico de Batman.', 'reeves.jpg'),
(13, 'Bong Joon-ho', 'Bong Joon-ho es un director de cine y guionista surcoreano. Entre sus trabajos cinematográficos figuran Memorias de un asesino, la película de monstruos The Host, la película de ciencia ficción Snowpiercer y la ganadora del Óscar a Mejor Película, Parásitos.', 'bong.jpg'),
(14, 'Damien Chazelle', 'Damien Sayre Chazelle es un director, guionista y productor de cine estadounidense y francés. Dirigió y escribió Whiplash y La La Land, estrenadas en 2014 y 2016, así como First Man en 2018 y Babylon en 2022.', 'chazelle.webp'),
(15, 'Lilly Wachowski', 'Lilly Wachowski (Chicago, Illinois; 21 de junio de 1965) y Lana Wachowski (Chicago, Illinois; 29 de diciembre de 1967), conocidas como las hermanas Wachowski, son dos directoras de cine, guionistas y productoras estadounidenses, creadoras de la saga Matrix. Ambas son mujeres transgénero.', 'lilly.jfif'),
(16, 'Lana Wachowski', 'Lilly Wachowski (Chicago, Illinois; 21 de junio de 1965) y Lana Wachowski (Chicago, Illinois; 29 de diciembre de 1967), conocidas como las hermanas Wachowski, son dos directoras de cine, guionistas y productoras estadounidenses, creadoras de la saga Matrix. Ambas son mujeres transgénero.[', 'wachowski.jpg'),
(17, 'Peter Jackson', 'Peter Robert Jackson (Wellington, 31 de octubre de 1961) es un director, guionista y productor de cine neozelandés, conocido especialmente por dirigir, producir y coescribir la trilogía cinematográfica de El Señor de los Anillos: La Comunidad del Anillo (2001), Las dos torres (2002) y El retorno del Rey (2003); así como su precuela, la trilogía de El hobbit: Un viaje inesperado (2012), La desolación de Smaug (2013) y La batalla de los Cinco Ejércitos (2014). Es ganador de tres premios Óscar, un Globo de Oro y tres BAFTA, entre otros galardones. En 2013 fue nombrado miembro de la prestigiosa Orden de Nueva Zelanda', 'jackson.webp'),
(18, 'Frank Darabont', 'Frank Árpád Darabont (registrado al nacer como Ferenc Árpád Darabont; Montbéliard, Doubs, Francia, 28 de enero de 1959) es un director de cine, productor y guionista estadounidense de origen húngaro.', 'darabont.webp'),
(19, 'Stanley Kubrick', 'Stanley Kubrick fue un director de cine, guionista, productor y fotógrafo estadounidense nacionalizado británico. Considerado por muchos como uno de los cineastas más influyentes del siglo XX, destacó tanto por su precisión técnica como por la notable estilización y la profunda carga simbólica de sus películas', 'stanley.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `director_id` int(10) UNSIGNED NOT NULL,
  `guionista_id` int(10) UNSIGNED NOT NULL,
  `duracion` smallint(6) NOT NULL,
  `puntaje` decimal(3,1) NOT NULL,
  `estreno` date NOT NULL,
  `productora` varchar(256) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `poster` varchar(256) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `director_id`, `guionista_id`, `duracion`, `puntaje`, `estreno`, `productora`, `sinopsis`, `poster`, `precio`) VALUES
(1, 'El origen', 1, 1, 148, 9.0, '2010-07-16', 'Warner Bros', 'Dom Cobb (Leonardo DiCaprio) es un hábil ladrón de secretos corporativos mediante el uso de tecnología de sueños. Desesperado por limpiar su nombre y volver con sus hijos, acepta un último y peligroso trabajo: plantar una idea en el subconsciente de un magnate en lugar de robarla', '1782600156_origen.jpg', 9.99),
(2, 'Django sin cadenas', 2, 2, 165, 8.5, '2012-12-25', 'Columbia Pictures', 'Django sin cadenas (dirigida por Quentin Tarantino) narra la historia de Django, un esclavo liberado por el cazarrecompensas King Schultz. Juntos se asocian para cazar criminales y salvar a la esposa de Django, Broomhilda, quien se encuentra atrapada en la brutal plantación de Calvin Candie.', '1782602701_django.jpg', 8.99),
(3, 'Titanic', 4, 3, 195, 9.2, '1997-12-19', '20th Century Fox', 'Una joven de la alta sociedad abandona a su arrogante pretendiente por un artista humilde en el trasatlántico que se hundió durante su viaje inaugural.\r\n', '1782600227_titanic.jpg', 7.99),
(4, 'Interstellar', 1, 1, 170, 9.2, '2014-11-07', 'Paramount Pictures', 'Gracias a un descubrimiento, un grupo de científicos y exploradores, encabezados por Cooper, se embarcan en un viaje espacial para encontrar un lugar con las condiciones necesarias para reemplazar a la Tierra y comenzar una nueva vida allí.', 'interstellar.jpg', 10.99),
(7, '2001: A Space Odyssey', 19, 19, 142, 7.8, '1962-01-01', '	Metro-Goldwyn-Mayer', '2001: Una odisea del espacio narra la evolución de la humanidad, guiada por misteriosos monolitos alienígenas. La historia comienza en la prehistoria con primates que descubren el artefacto y aprenden a usar herramientas. En el futuro, un descubrimiento lunar desencadena una misión a Júpiter, donde la tripulación se enfrenta a HAL 9000, una superinteligencia artificial rebelde.', '2001.jpg', 8.99),
(8, 'Sueños de libertad', 12, 18, 142, 9.3, '1994-09-23', 'Castle Rock Entertainment', 'Un hombre condenado injustamente por asesinato encuentra amistad y esperanza mientras cumple una larga condena en prisión.', 'shawshank.jpg', 8.99),
(9, 'El club de la pelea', 9, 5, 139, 8.8, '1995-10-15', '20th Century Fox', 'Un oficinista insatisfecho conoce a un vendedor carismático y juntos fundan un club clandestino que cambiará sus vidas.', 'fightclub.webp', 9.99),
(10, 'Matrix', 15, 16, 136, 8.7, '1999-03-31', 'Warner Bros.', 'Un programador descubre que la realidad que conoce es una simulación creada por máquinas y deberá luchar por la libertad de la humanidad.', '1782623075_matrix.webp', 9.99),
(11, 'Milagros inesperados', 12, 18, 189, 8.6, '1992-12-10', 'Warner Bros.', 'La llegada de un prisionero con poderes sobrenaturales transforma la vida de los guardias de un corredor de la muerte.', 'greenmile.jpg', 8.99),
(12, 'Gladiador', 10, 6, 155, 8.5, '2000-05-05', 'DreamWorks Pictures', 'Un general romano traicionado busca vengar la muerte de su familia enfrentándose al emperador en la arena de los gladiadores.', '1782625591_gladiador.jfif', 9.99),
(13, 'El gran truco', 1, 4, 130, 8.5, '2006-10-20', 'Warner Bros.', 'Dos ilusionistas rivales llevan su obsesión por superar al otro hasta consecuencias impredecibles.', 'prestige.jpg', 10.99),
(14, 'se7en', 9, 7, 127, 8.6, '1995-09-22', 'New Line Cinema', 'Dos detectives investigan una serie de asesinatos inspirados en los siete pecados capitales', 'se7en.jpg', 9.99),
(15, 'Blade Runner 2049', 11, 8, 164, 8.0, '2017-10-06', 'Warner Bros.', 'Un nuevo blade runner descubre un secreto que podría cambiar el futuro de la humanidad y de los replicantes.', 'blade.webp', 11.99),
(16, 'La llegada', 11, 9, 116, 7.9, '2016-11-11', 'Paramount Pictures', 'Una lingüista intenta comunicarse con visitantes extraterrestres para evitar un conflicto mundial.', 'arrival.jpg', 10.99),
(17, 'El lobo de Wall Street', 7, 10, 180, 8.2, '2013-12-25', 'Paramount Pictures', 'La historia del ascenso y los excesos del corredor de bolsa Jordan Belfort en Wall Street.', 'wolf.jpg', 10.99),
(18, 'Guasón', 18, 11, 122, 8.4, '2019-10-04', 'Warner Bros.', 'Un comediante fracasado, aislado por la sociedad, inicia un descenso hacia la locura que dará origen al mayor villano de Gotham.', '1782625808_guason.jpg', 11.99),
(19, 'The Batman', 10, 12, 176, 7.8, '2022-03-04', 'Warner Bros.', 'Batman investiga una serie de asesinatos cometidos por un misterioso criminal mientras descubre una red de corrupción en Gotham.', 'thebatman.jpg', 12.99),
(20, 'Parásitos', 13, 13, 132, 8.5, '2019-05-30', 'CJ Entertainment', 'Dos familias de clases sociales opuestas cruzan sus destinos en una historia llena de tensión, humor y crítica social.', 'parasite.jpg', 10.99),
(21, 'Whiplash', 14, 14, 107, 8.5, '2014-10-10', 'Sony Pictures Classics', 'Un joven baterista busca convertirse en uno de los mejores músicos bajo la exigente tutela de un profesor despiadado.', 'whiplash.jpg', 9.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_x_actor`
--

CREATE TABLE `pelicula_x_actor` (
  `pelicula_id` int(10) UNSIGNED NOT NULL,
  `actor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula_x_actor`
--

INSERT INTO `pelicula_x_actor` (`pelicula_id`, `actor_id`) VALUES
(1, 1),
(1, 3),
(1, 9),
(2, 1),
(2, 10),
(2, 11),
(2, 12),
(3, 1),
(3, 8),
(4, 6),
(4, 7),
(7, 41),
(8, 4),
(8, 20),
(9, 5),
(9, 19),
(10, 33),
(10, 34),
(11, 35),
(12, 21),
(13, 15),
(13, 27),
(13, 28),
(14, 4),
(14, 5),
(15, 17),
(15, 18),
(16, 23),
(16, 24),
(17, 1),
(17, 6),
(17, 30),
(18, 13),
(18, 16),
(19, 39),
(19, 40),
(20, 36),
(21, 37),
(21, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_x_animo`
--

CREATE TABLE `pelicula_x_animo` (
  `pelicula_id` int(10) UNSIGNED NOT NULL,
  `animo_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula_x_animo`
--

INSERT INTO `pelicula_x_animo` (`pelicula_id`, `animo_id`) VALUES
(1, 5),
(2, 3),
(3, 4),
(4, 5),
(7, 5),
(8, 1),
(8, 12),
(9, 3),
(9, 14),
(10, 9),
(10, 14),
(11, 9),
(12, 4),
(12, 7),
(12, 16),
(13, 9),
(13, 14),
(14, 11),
(15, 5),
(16, 13),
(17, 1),
(17, 9),
(18, 4),
(19, 11),
(20, 14),
(21, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula_x_genero`
--

CREATE TABLE `pelicula_x_genero` (
  `pelicula_id` int(10) UNSIGNED NOT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula_x_genero`
--

INSERT INTO `pelicula_x_genero` (`pelicula_id`, `genero_id`) VALUES
(1, 5),
(2, 3),
(3, 3),
(3, 6),
(4, 3),
(4, 5),
(7, 3),
(7, 5),
(8, 3),
(8, 9),
(9, 3),
(9, 8),
(10, 5),
(10, 7),
(11, 3),
(11, 10),
(12, 3),
(12, 7),
(13, 3),
(13, 10),
(14, 8),
(14, 9),
(15, 5),
(16, 3),
(16, 5),
(17, 2),
(17, 3),
(18, 3),
(19, 7),
(20, 3),
(20, 9),
(21, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','admin','usuario','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `rol`) VALUES
(1, 'admin@cine.com', 'admin', 'Administrador', '$2y$10$JBEDtfzODq7dcwnzseTaLuTENP7G3MHAX/z5b.8rxfTqErD1SUSyq', 'superadmin'),
(2, 'user1@cine.com', 'juanp', 'Juan Perez', '$2y$10$JBEDtfzODq7dcwnzseTaLuTENP7G3MHAX/z5b.8rxfTqErD1SUSyq', 'usuario'),
(3, 'user2@cine.com', 'mariaa', 'Maria Lopez', '$2y$10$JBEDtfzODq7dcwnzseTaLuTENP7G3MHAX/z5b.8rxfTqErD1SUSyq', 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistas`
--

CREATE TABLE `vistas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `activa` tinyint(4) NOT NULL,
  `restringida` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vistas`
--

INSERT INTO `vistas` (`id`, `nombre`, `titulo`, `activa`, `restringida`) VALUES
(6, 'home', 'Inicio', 1, 0),
(7, 'catalogo', 'Catálogo de películas', 1, 0),
(8, 'recomendador', 'Recomendador', 1, 0),
(9, 'alumno', 'Alumno', 1, 0),
(10, 'login', 'Iniciar sesión', 1, 0),
(11, '403', 'Acceso denegado', 1, 0),
(12, '404', 'No encontrado', 1, 0),
(13, 'producto', 'Detalle de película', 1, 0),
(14, 'dashboard', 'Panel principal', 1, 1),
(15, 'admin_pelicula', 'Gestión de Películas', 1, 1),
(16, 'admin_actor', 'Gestión de Actores', 1, 1),
(17, 'admin_director', 'Gestión de Directores', 1, 1),
(18, 'admin_guionistas', 'Gestión de Guionistas', 1, 1),
(19, 'admin_genero', 'Gestión de Géneros', 1, 1),
(20, 'admin_animo', 'Gestión de Estados de Ánimo', 1, 1),
(21, 'add_pelicula', 'Agregar Película', 1, 1),
(22, 'edit_pelicula', 'Editar Película', 1, 1),
(23, 'delete_pelicula', 'Eliminar Película', 1, 1),
(24, 'add_actor', 'Agregar Actor', 1, 1),
(25, 'edit_actor', 'Editar Actor', 1, 1),
(26, 'delete_actor', 'Eliminar Actor', 1, 1),
(27, 'add_director', 'Agregar Director', 1, 1),
(28, 'edit_director', 'Editar Director', 1, 1),
(29, 'delete_director', 'Eliminar Director', 1, 1),
(30, 'add_guionista', 'Agregar Guionista', 1, 1),
(31, 'edit_guionista', 'Editar Guionista', 1, 1),
(32, 'delete_guionista', 'Eliminar Guionista', 1, 1),
(33, 'add_genero', 'Agregar Género', 1, 1),
(34, 'delete_genero', 'Eliminar Género', 1, 1),
(35, 'add_animo', 'Agregar Estado de Ánimo', 1, 1),
(36, 'delete_animo', 'Eliminar Estado de Ánimo', 1, 1),
(37, 'admin_peliculas', 'Admin Películas', 1, 1),
(38, 'contacto', 'Contacto', 1, 0),
(39, 'admin_contacto', 'Mensajes de contacto', 1, 1),
(40, 'ver_contacto', 'Ver mensaje', 1, 1),
(41, 'carrito', 'Mi carrito', 1, 0),
(42, 'checkout', 'Checkout', 1, 1),
(43, 'gracias', 'Compra realizada', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra_detalle`
--
ALTER TABLE `compra_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `directores`
--
ALTER TABLE `directores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_animo`
--
ALTER TABLE `estados_animo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `guionistas`
--
ALTER TABLE `guionistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peliculas_director_fk` (`director_id`),
  ADD KEY `peliculas_guionista_fk` (`guionista_id`);

--
-- Indices de la tabla `pelicula_x_actor`
--
ALTER TABLE `pelicula_x_actor`
  ADD PRIMARY KEY (`pelicula_id`,`actor_id`),
  ADD KEY `pelicula_x_actor_actor_fk` (`actor_id`);

--
-- Indices de la tabla `pelicula_x_animo`
--
ALTER TABLE `pelicula_x_animo`
  ADD PRIMARY KEY (`pelicula_id`,`animo_id`),
  ADD KEY `animo_id` (`animo_id`);

--
-- Indices de la tabla `pelicula_x_genero`
--
ALTER TABLE `pelicula_x_genero`
  ADD PRIMARY KEY (`pelicula_id`,`genero_id`),
  ADD KEY `genero_id` (`genero_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vistas`
--
ALTER TABLE `vistas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra_detalle`
--
ALTER TABLE `compra_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `directores`
--
ALTER TABLE `directores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `estados_animo`
--
ALTER TABLE `estados_animo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `guionistas`
--
ALTER TABLE `guionistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vistas`
--
ALTER TABLE `vistas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_director_fk` FOREIGN KEY (`director_id`) REFERENCES `directores` (`id`),
  ADD CONSTRAINT `peliculas_guionista_fk` FOREIGN KEY (`guionista_id`) REFERENCES `guionistas` (`id`);

--
-- Filtros para la tabla `pelicula_x_actor`
--
ALTER TABLE `pelicula_x_actor`
  ADD CONSTRAINT `pelicula_x_actor_actor_fk` FOREIGN KEY (`actor_id`) REFERENCES `actores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pelicula_x_actor_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_x_actor_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pelicula_x_animo`
--
ALTER TABLE `pelicula_x_animo`
  ADD CONSTRAINT `pelicula_x_animo_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_x_animo_ibfk_2` FOREIGN KEY (`animo_id`) REFERENCES `estados_animo` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pelicula_x_genero`
--
ALTER TABLE `pelicula_x_genero`
  ADD CONSTRAINT `pelicula_x_genero_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelicula_x_genero_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
