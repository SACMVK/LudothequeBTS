<?php



function generer_donnees_jeu_t(int $nombreJeuxT) {
    for ($indice = 1; $indice <= $nombreJeuxT; $indice++) {

        $list['typePC'] = "Jeux de société";
        $list['anneeSortie'] = getSortie();
        $list['description'] = getTexteJeu(1);
        $nombreJoueurs = getNombreJoueurs();
        $list['nbJoueursMin'] = $nombreJoueurs[0];
        $list['nbJoueursMax'] = $nombreJoueurs[1];
        $list['nom'] = getNomJeu();
        $list['editeur'] = getEditeur();
        $list['regles'] = getTexteJeu();
        $list['difficulte'] = getDifficulte();
        $list['public'] = getPublic();
        $list['listePieces'] = getListePiece();
        $list['dureePartie'] = getDuree();

//        echo "<b>" . $list['nom'] . "</b> de " . $list['editeur'] . "<br>";
//        echo $list['typePC'] . " sorti en " . $list['anneeSortie'] . "<br>";
//        echo "Le jeu en quelques mots : ".$list['description'] . "<br>";
//        echo "De " . $list['nbJoueursMin'] . " à " . $list['nbJoueursMax'] . " joueurs<br>";
//        echo "Niveau de difficulté : " . $list['difficulte'] . "<br>";
//        echo "Destiné à : " . $list['public'] . "<br>";
//        echo "Duré moyenne de la partie : " . $list['dureePartie'] . "<br>";
//        echo "Une boite comprend les éléments suivants : " . $list['listePieces'] . "<br>";
//        echo "Enoncé sommaire des règles : " . $list['regles'] . "<br><br>";
echo "INSERT INTO produit_culturel_t (typePC, anneeSortie, description)";
echo "VALUES ('".$list['typePC']."', '".$list['anneeSortie']."', '".$list['description']."');";
echo "<br>";
echo "INSERT INTO jeu_t (idPC, nbJoueursMin, nbJoueursMax, nom, editeur, regles, difficulte, public, listePieces, dureePartie)";
echo "VALUES (".$indice.", '".$list['nbJoueursMin']."', '".$list['nbJoueursMax']."', '".$list['nom']."', '".$list['editeur']."', '".$list['regles']."', '".$list['difficulte']."', '".$list['public']."', '".$list['listePieces']."', '".$list['dureePartie']."');";
echo "<br>";   
//insert($list);
    }
}

function getDuree() {
    switch (rand(0, 2)) {
        case 0:$duree = rand(1, 3) . " heures";
            break;
        default :$duree = (rand(1, 10) * 5) . " minutes";
            break;
    }
    return $duree;
}

function getListePiece() {
    $listePieces = "";
    // stefan : plus on augmente l'intervalle, plus les chances d'avoir l'élément sont faibles
    if (rand(0, 1) == 0) {
        $listePieces .= rand(1, 20) . " pions, ";
    }
    if (rand(0, 1) == 0) {
        $listePieces .= rand(1, 2) . " plateau(x), ";
    }
    if (rand(0, 1) == 0) {
        $listePieces .= rand(1, 3) . " dé(s), ";
    }
    if (rand(0, 2) == 0) {
        $listePieces .= rand(10, 32) . " cartes, ";
    }
    if (rand(0, 2) == 0) {
        $listePieces .= rand(10, 32) . " tuiles, ";
    }
    if (rand(0, 3) == 0) {
        $listePieces .= rand(1, 32) . " figurine(s), ";
    }
    if (rand(0, 1) == 0) {
        $listePieces .= "1 tapis, ";
    }
    // stefan : test s'il n'y a besoin d'aucun matériel
    if (strlen($listePieces) == 0) {
        $listePieces = "Aucun matériel n\'est nécessaire !";
    } else {
        // stefan : on supprime la dernière virgule et l'espace qui suit
        $listePieces = substr($listePieces, 0, strlen($listePieces) - 2);
        // stefan : on remplace la dernière virgule par un "et" s'il y a plus d'un élément
        if (substr_count($listePieces, ",") > 0) {
            $listePieces = substr($listePieces, 0, strrpos($listePieces, ",")) . " et " . substr($listePieces, strrpos($listePieces, ",") + 1, strlen($listePieces));
        }
    }
    return $listePieces;
}

function getPublic() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM public_d;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $liste_public = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $liste_public [] = $ligne['public'];
    }
    closeConnexion($pdo);
    return $liste_public[rand(0, count($liste_public) - 1)];
}

function getDifficulte() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM difficulte_d;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $liste_difficulte = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $liste_difficulte [] = $ligne['difficulte'];
    }
    closeConnexion($pdo);
    return $liste_difficulte[rand(0, count($liste_difficulte) - 1)];
}

function getEditeur() {
    $pdo = openConnexion();
    $requete = "SELECT * FROM editeur_d;";
    $stmt = $pdo->prepare($requete);
    $stmt->execute();
    $liste_editeurs = null;
    while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $liste_editeurs [] = $ligne['editeur'];
    }
    closeConnexion($pdo);
    return $liste_editeurs[rand(0, count($liste_editeurs) - 1)];
}

function getNomJeu() {
    $consonne = ["b", "c", "ch", "d", "f", "g", "j", "k", "l", "ll", "m", "n", "p", "r", "s", "ss", "t", "v"];
    $voyelle = ["a", "e", "i", "o", "u", "ou", "au", "eu", "eau", "ai", "ei", "ui"];
    $nomJeu = "";
    $longeurNomJeu = rand(3, 5);
    $consonneIsDebut = rand(0, 1);
    for ($i = $consonneIsDebut; $i < $longeurNomJeu; $i++) {
        if ($i % 2 == 0) {
            $nomJeu .= $consonne[rand(0, count($consonne) - 1)];
        } else {
            $nomJeu .= $voyelle[rand(0, count($voyelle) - 1)];
        }
    }
    return ucfirst($nomJeu);
}

function getNombreJoueurs() {
    $min = rand(1, 8);
    $max = rand(1, 8);
    $nombre = [$min, $max];
    sort($nombre);
    return $nombre;
}

function getSortie() {
    return rand(1900, getDate()['year']);
}

function getTexteJeu(int $nombrePhrases = 0) {
    $listeMots = [
        " lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "mauris", "id", "nisi", "congue", "placerat", "leo", "eu", "ultrices", "erat", "phasellus", "convallis", "varius",
        "nunc", "at", "rhoncus", "nulla", "semper", "a", "curabitur", "eu", "consectetur", "velit", "sit", "amet", "consectetur", "ante", "nunc", "lorem", "arcu", "sagittis", "tristique", "odio",
        "ut", "ultricies", "porta", "eros", "aliquam", "ex", "felis", "placerat", "a", "tortor", "consequat", "imperdiet", "aliquam", "risus", "integer", "purus", "purus", "scelerisque", "quis", "leo",
        "nec", "bibendum", "molestie", "erat", "pellentesque", "vestibulum", "nisl", "ac", "massa", "consequat", "eget", "consectetur", "nunc", "hendrerit", "nullam", "lobortis", "lorem", "et", "tincidunt", "pulvinar",
        "metus", "turpis", "fermentum", "neque", "et", "facilisis", "diam", "orci", "vitae", "risus", "nam", "ac", "dui", "ullamcorper", "interdum", "nisi", "sit", "amet", "luctus", "lectus",
        "vestibulum", "eleifend", "dui", "ante", "vitae", "dictum", "nibh", "laoreet", "at", "quisque", "eget", "nisi", "quis", "tortor", "pulvinar", "posuere", "vivamus", "feugiat", "posuere", "lectus",
        "in", "semper", "metus", "faucibus", "sed", "etiam", "facilisis", "nulla", "ut", "faucibus", "aliquet", "nulla", "rhoncus", "neque", "ex", "ut", "imperdiet", "nulla", "enim", "at",
        "volutpat", "orci", "sagittis", "pharetra", "mauris", "tristique", "dapibus", "pellentesque", " praesent", "id", "quam", "et", "urna", "vulputate", "dignissim", "ut", "sed", "ornare", "tellus", "sed",
        "mollis", "ex", "nec", "velit", "ullamcorper", "porta", "suspendisse", "at", "quam", "vulputate", "aliquam", "metus", "ac", "convallis", "tellus", "quisque", "dapibus", "libero", "dolor", "aenean",
        "aliquet", "at", "elit", "quis", "molestie", "mauris", "at", "nulla", "eu", "diam", "imperdiet", "pulvinar", "nunc", "laoreet", "nisl", "nec", "aliquet", "blandit", "sapien", "ligula",
        "eleifend", "sapien", "vitae", "ullamcorper", "felis", "nunc", "eget", "ante", "vestibulum", "rhoncus", "ipsum", "et", "pellentesque", "pulvinar", "arcu", "diam", "malesuada", "ligula", "ac", "rhoncus",
        "nibh", "ante", "a", "nulla", "class", "aptent", "taciti", "sociosqu", "ad", "litora", "torquent", "per", "conubia", "nostra", "per", "inceptos", "himenaeos", "ut", "interdum", "nulla",
        "urna", "a", "semper", "eros", "tristique", "eget", "curabitur", "lacinia", "metus", "a", "molestie", "faucibus", "nulla", "sit", "amet", "ullamcorper", "odio", "eget", "tristique", "lacus",
        "aliquam", "convallis", "metus", "et", "sagittis", "tincidunt", " duis", "in", "placerat", "ligula", "et", "posuere", "turpis", "donec", "et", "arcu", "nibh", "etiam", "tempus", "non",
        "arcu", "lobortis", "tempus", "praesent", "auctor", "est", "ut", "malesuada", "ultricies", "lacus", "dolor", "malesuada", "nulla", "id", "mattis", "dui", "libero", "et", "est", "fusce",
        "dapibus", "sapien", "vel", "enim", "tristique", "sodales", "etiam", "sed", "orci", "vitae", "enim", "congue", "scelerisque", "suspendisse", "leo", "arcu", "consectetur", "at", "rutrum", "at",
        "dictum", "sed", "mauris", "donec", "volutpat", "lectus", "nec", "luctus", "aliquam", " aliquam", "suscipit", "sem", "vel", "mi", "elementum", "quis", "varius", "magna", "luctus", "aliquam",
        "imperdiet", "erat", "in", "orci", "semper", "viverra", "laoreet", "nibh", "aliquam", "nunc", "vehicula", "sapien", "ut", "faucibus", "porttitor", "donec", "eu", "odio", "purus", "in",
        "ac", "ex", "eget", "mauris", "aliquam", "bibendum", "ut", "viverra", "velit", "sed", "hendrerit", "dignissim", "ut", "eget", "vestibulum", "odio", "et", "pellentesque", "nulla", "duis",
        "et", "scelerisque", "sapien", "sed", "odio", "turpis", "elementum", "a", "massa", "quis", "tempus", "tincidunt", "enim", "aenean", "cursus", "non", "augue", "sed", "volutpat", "in",
        "ut", "nisl", "massa", "pellentesque", "habitant", "morbi", "tristique", "senectus", "et", "netus", "et", "malesuada", "fames", "ac", "turpis", "egestas", "phasellus", "efficitur", "quam", "quis",
        "tristique", "maximus", " aenean", "rhoncus", "consectetur", "orci", "suspendisse", "ultrices", "maximus", "porttitor", "cras", "sit", "amet", "accumsan", "metus", "cras", "tempor", "ullamcorper", "orci", "sit",
        "amet", "dictum", "donec", "eget", "est", "a", "ipsum", "egestas", "rutrum", "ut", "et", "nibh", "quisque", "non", "lacus", "sollicitudin", "posuere", "magna", "id", "ultrices",
        "tellus", "pellentesque", "a", "dolor", "tellus", "cras", "facilisis", "feugiat", "tempor", "pellentesque", "interdum", "semper", "rutrum", "mauris", "et", "sodales", "libero", " etiam", "aliquet", "fermentum",
        "sem", "sit", "amet", "posuere", "curabitur", "id", "vulputate", "sem", "donec", "porta", "lacus", "in", "vehicula", "consequat", "sapien", "felis", "placerat", "lorem", "eu", "congue",
        "ligula", "purus", "nec", "elit", "nullam", "posuere", "feugiat", "justo", "quis", "semper", "in", "feugiat", "magna", "eget", "dolor", "elementum", "imperdiet", "etiam", "venenatis", "sed",
        "magna", "a", "commodo", "duis", "id", "vulputate", "magna", "ut", "suscipit", "lorem", "consectetur", "consectetur", "nisi", "sed", "sodales", "turpis", "praesent", "vitae", "sem", "diam",
        "quisque", "sed", "fringilla", "magna", "maecenas", "ac", "orci", "tempus", "hendrerit", "erat", "ac", "pharetra", "ipsum", "aliquam", "non", "lacinia", "urna", "phasellus", "posuere", "elit",
        "vitae", "tellus", "tristique", "vitae", "vestibulum", "lacus", "consequat", "aliquam", "sagittis", "lorem", "nec", "augue", "pulvinar", "vitae", "commodo", "est", "bibendum", " vestibulum", "ante", "ipsum",
        "primis", "in", "faucibus", "orci", "luctus", "et", "ultrices", "posuere", "cubilia", "curae;", "duis", "pharetra", "erat", "vel", "volutpat", "lobortis", "lacus", "sapien", "porttitor", "metus",
        "sed", "malesuada", "nunc", "tortor", "a", "sem", "sed", "sed", "mi", "risus", "vivamus", "eget", "quam", "maximus", "dictum", "dui", "nec", "posuere", "elit", "fusce",
        "et", "felis", "iaculis", "ornare", "tortor", "at", "faucibus", "purus", "ut", "efficitur", "rhoncus", "libero", "nec", "lacinia", "nibh", "sed", "iaculis", "massa", "eget", "sem",
        "tristique", "et", "dignissim", "ligula", "fermentum", "mauris", "et", "ultrices", "sapien", "nullam", "at", "quam", "tincidunt", "pellentesque", "enim", "ac", "consequat", "dolor", "nullam", "ac",
        "maximus", "dui", "morbi", "quis", "quam", "felis", "mauris", "pharetra", "fermentum", "dolor", "at", "pretium", "cras", "tellus", "elit", "lacinia", "quis", "velit", "a", "rutrum",
        "elementum", "purus", " ut", "sollicitudin", "tortor", "ut", "tempus", "pharetra", "donec", "congue", "laoreet", "mattis", "aliquam", "pellentesque", "faucibus", "pellentesque", "duis", "finibus", "neque", "nibh",
        "et", "laoreet", "erat", "pellentesque", "sed", "aenean", "sed", "faucibus", "ipsum", "at", "vestibulum", "mi", "donec", "id", "neque", "eget", "nisi", "volutpat", "rutrum", "a",
        "at", "erat", "morbi", "vitae", "risus", "a", "mauris", "interdum", "suscipit", "sit", "amet", "non", "tortor", " sed", "a", "nulla", "id", "risus", "dictum", "bibendum",
        "nunc", "vehicula", "est", "ut", "ex", "ultricies", "maximus", "sed", "in", "porttitor", "erat", "at", "mattis", "nisl", "cras", "nec", "dapibus", "eros", "quis", "blandit",
        "nisl", "etiam", "accumsan", "magna", "id", "dictum", "euismod", "tortor", "leo", "imperdiet", "lacus", "eu", "laoreet", "mauris", "purus", "vel", "augue", "quisque", "semper", "libero",
        "scelerisque", "feugiat", "tortor", "at", "condimentum", "elit", "quisque", "pulvinar", "sem", "metus", "a", "auctor", "urna", "ornare", "sit", "amet", "etiam", "nisl", "sem", "pellentesque",
        "vitae", "elit", "sed", "eleifend", "feugiat", "neque", "curabitur", "vel", "urna", "eget", "metus", "consequat", "maximus", "nec", "sit", "amet", "elit", "sed", "vestibulum", "ligula",
        "quis", "tincidunt", "rutrum", "donec", "porta", "nulla", "id", "convallis", "semper", "donec", "porta", "eros", "eget", "enim", "semper", "vel", "sollicitudin", "metus", "sollicitudin", " nulla",
        "porttitor", "pretium", "ligula", "in", "dictum", "quam", "cras", "congue", "sollicitudin", "neque", "quis", "semper", "libero", "auctor", "sit", "amet", "sed", "ac", "accumsan", "justo",
        "nullam", "mollis", "mi", "ut", "neque", "facilisis", "nec", "tincidunt", "leo", "auctor", "vivamus", "quis", "tortor", "quis", "ante", "ornare", "interdum", "eu", "eu", "elit",
        "duis", "cursus", "leo", "est", "sit", "amet", "suscipit", "quam", "pulvinar", "ac", "in", "porta", "tincidunt", "mi", "vel", "volutpat", "nulla", "congue", "aliquet", "augue",
        "id", "luctus", "maecenas", "rutrum", "cursus", "enim", "sit", "amet", "ultricies", "quam", "iaculis", "sit", "amet", " sed", "id", "congue", "est", "cras", "ut", "leo",
        "hendrerit", "urna", "varius", "aliquam", "proin", "vel", "eros", "id", "dolor", "dictum", "vestibulum", "nullam", "dignissim", "ac", "ipsum", "sit", "amet", "iaculis", "aliquam", "est",
        "dolor", "lacinia", "sit", "amet", "ligula", "vitae", "tempus", "porta", "dui", "aenean", "eu", "egestas", "nunc", "phasellus", "eros", "quam", "egestas", "non", "facilisis", "vel",
        "tempus", "sed", "risus", "aenean", "ut", "tortor", "erat", "praesent", "quis", "vestibulum", "eros", "donec", "consequat", "lacus", "at", "vehicula", "auctor", " nunc", "pharetra", "nulla",
        "diam", "vitae", "eleifend", "dui", "elementum", "eu", "suspendisse", "ac", "enim", "at", "justo", "lacinia", "pretium", "praesent", "at", "sem", "quis", "nibh", "fermentum", "imperdiet"];








    $nombreMaxMotsDansPhrase = 10;
    $nombreMaxPhrase = 6;
    $nombreMinMotsDansPhrase = 3;
    $nombreMinPhrase = 1;

    if ($nombrePhrases == 0) {
        $nombrePhrases = rand($nombreMinPhrase, $nombreMaxPhrase);
    }
    $nombreMotsDansPhrase = rand($nombreMinMotsDansPhrase, $nombreMaxMotsDansPhrase);

    $text = "";
    for ($i = 0; $i < $nombrePhrases; $i++) {
        for ($j = 0; $j < $nombreMotsDansPhrase; $j++) {
            $mot = $listeMots[rand(0, count($listeMots) - 1)];
            if ($j == 0) {
                $mot = ucfirst($mot) . " ";
            } else if ($j == $nombreMotsDansPhrase - 1) {
                $mot .= ".";
            } else {
                $mot .= " ";
            }
            $text .= $mot;
        }
        if ($i != $nombrePhrases - 1) {
            $text .= " ";
        }
    }

    return $text;
}
