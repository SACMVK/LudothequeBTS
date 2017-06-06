<?php

function generer_donnees_genre_jeu(int $nombreJeux) {
    $listeGenre = getAllGenreJeu();
    for ($indiceJeu = 1; $indiceJeu <= $nombreJeux; $indiceJeu++) {
        $nombreGenre = rand(0, 3);
        // stefan : la clé primaire est la somme des deux, il faut vérifier qu'elle est unique
        $listeGenreJeu [] = ["", ""];
        for ($indiceGenre = 1; $indiceGenre <= $nombreGenre; $indiceGenre++) {
            do {
                $genre = $listeGenre[rand(0, count($listeGenre) - 1)];
                $genreJeu = [$indiceJeu, $genre];
            } while (in_array($genreJeu, $listeGenreJeu));
            $listeGenreJeu [] = $genreJeu;
            echo 'INSERT INTO jeu_a_pour_genre (idPC, genre)';
            echo 'VALUES ("' . $genreJeu[0] . '", "' . $genreJeu[1] . '");';
            echo '<br>';
        }
    }
}

function getAllGenreJeu() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM genre;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $liste = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $liste [] = $ligne['genre'];
    }
    $pdo = closeConnexion();
    return $liste;
}
