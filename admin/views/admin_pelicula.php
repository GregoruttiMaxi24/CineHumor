<?PHP
$peliculas = Pelicula::catalogo_completo();
?>

<div class="admin-wrapper">

    <h1 class="admin-title">
        Administración de Películas
    </h1>

    <div class="admin-table-container">

        <div class="table-responsive">
            <table class="table admin-table">
                        <thead>
                            <tr>
                                <th scope="col" width="80">Poster</th>
                                <th scope="col">Título</th>
                                <th scope="col">Actor/es</th>
                                <th scope="col">Director</th>
                                <th scope="col">Guionista</th>
                                <th scope="col">Géneros</th>
                                <th scope="col">Estado de animo</th>
                                <th scope="col">Duración</th>
                                <th scope="col">Puntuacion</th>
                                <th scope="col">Estreno</th>
                                <th scope="col">Productora</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?PHP foreach ($peliculas as $P) { ?>
                                <tr>
                                     <td class="text-center align-middle">
                                    <img src="../assets/img/<?= htmlspecialchars($P->getPoster()) ?>"
     class="admin-poster"
     alt="<?= htmlspecialchars($P->getTitulo()) ?>">


                                    </td>

                                    <!-- TITULO -->
                                    <td><?= $P->getTitulo()?></td>

                                    <!-- ACTOR -->
                                    <td>
                                        <?PHP foreach ($P->getActores() as $G) { ?>
                                            <span class="badge bg-secondary mb-1">
                                                <?= $G->getNombreCompleto() ?>
                                            </span>
                                        <?PHP } ?>
                                    </td>
                                    <!-- DIRECTOR -->
                                    <td><?= $P->getDirector()->getNombreCompleto() ?></td>
                                     <!-- GUIONISTA -->
                                    <td><?= $P->getGuionista()->getNombre_completo() ?></td>

                                    <!-- Actores-->

                                
                                    <!-- GENEROS -->
                                    <td>
                                        <?PHP foreach ($P->getGeneros() as $G) { ?>
                                            <span class="badge bg-secondary mb-1">
                                                <?= $G->getNombre() ?>
                                            </span>
                                        <?PHP } ?>
                                    </td>

                                    <!--ANIMO -->
                                    <td>
                                        <?PHP foreach ($P->getAnimos() as $G) { ?>
                                            <span class="badge bg-secondary mb-1">
                                                <?= $G->getNombre() ?>
                                            </span>
                                        <?PHP } ?>
                                    </td>

                                    <!-- DURACION -->
                                    <td><?= $P->getDuracion() ?> min</td>

                                     <td><?= $P->getPuntaje() ?></td>

                                    <!-- ESTRENO -->
                                    <td><?= $P->getEstreno() ?></td>

                                   
                                    <!-- PRODUCTORA -->
                                    <td><?= $P->getProductora() ?></td>

                                    <!-- PRECIO -->
                                    <td>$<?= $P->getPrecio() ?></td>

                                    <!-- ACCIONES -->
                                    <td>
                                        <a href="index.php?sec=edit_pelicula&id=<?= $P->getId() ?>"
                                           class="btn btn-sm btn-warning d-block mb-1">
                                            Editar
                                        </a>

                                        <a href="index.php?sec=delete_pelicula&id=<?= $P->getId() ?>"
                                           class="btn btn-sm btn-danger d-block">
                                            Eliminar
                                        </a>
                                    </td>

                                </tr>
                            <?PHP } ?>
                        </tbody>
                    </table>
                </div>
                    <a href="index.php?sec=add_pelicula"
                       class="btn btn-primary mt-5">
                        Cargar nueva película
                    </a>

                </div>
            </div>
