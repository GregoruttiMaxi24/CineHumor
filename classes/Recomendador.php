<?php

class Recomendador
{
   public static function recomendar(
    ?int $generoID = null,
    ?int $animoID = null,
    ?int $actorID = null
): array {

        $peliculas = Pelicula::catalogo_completo();
        $resultados = [];

        foreach ($peliculas as $pelicula) {

            $score = 0;

            /* =========================
               FILTRO POR ACTOR
            ========================== */
            if ($actorID !== null) {

    foreach ($pelicula->getActores() as $actor) {

        if ($actor->getId() === $actorID) {
            $score += 50;
            break;
        }

    }

}

            /* =========================
               FILTRO POR GÉNERO
            ========================== */
            if ($generoID !== null) {
                foreach ($pelicula->getGeneros() as $genero) {
                    if ($genero->getId() === $generoID) {
                        $score += 40;
                        break;
                    }
                }
            }

            /* =========================
               FILTRO POR ÁNIMO
            ========================== */
            if ($animoID !== null) {
                foreach ($pelicula->getAnimos() as $animo) {
                    if ($animo->getId() === $animoID) {
                        $score += 30;
                        break;
                    }
                }
            }

            $resultados[] = [
                "pelicula" => $pelicula,
                "score" => $score
            ];
        }

        usort($resultados, function ($a, $b) {
            return $b["score"] <=> $a["score"];
        });

        return $resultados;
    }
}