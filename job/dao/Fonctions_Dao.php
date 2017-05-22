<?php

function getAujourdhui() {
    return getDate()['year'] . "-" . getDate()['mon'] . "-" . getDate()['mday'];
}

function convertDateToSQLdate(string $stringDate) {
    $delimiters = ["/", "-", " ", ":"];
    foreach ($delimiters as $value) {
        if (strpbrk($value, $stringDate) != false) {
            $delimiter = $value;
        }
    }
    $decoupage = explode($delimiter, $stringDate);
    // cas YYYYMMDD
    if (count($decoupage[0]) == 4) {
        $convertedDate = $decoupage[0] . "-" . $decoupage[1] . "-" . $decoupage[2];
        // cas DDMMYYYY
    } else {
        $convertedDate = $decoupage[2] . "-" . $decoupage[1] . "-" . $decoupage[1];
    }
    return $convertedDate;
}

// Fonction permettant l'affichage d'une liste déroulante
// L'attribut $colonneId est optionnel, il est utilisé dans le cas où
// la valeur qui doit être envoyée est différente de celle affichée.
// L'attribut $isColonneIdVisible est optionnel permet d'afficher l'attribut $colonneId dans le cas où
// celui-ci est utilisé.
Function selectDico(string $table, string $colonneNom, string $colonneId = "", bool $isColonneIdVisible = false) {

    // M : Connecxion a la BD
    $pdo = openConnexion();
    $reponse = "SELECT * FROM " . $table . ";";
    $stmt = $pdo->prepare($reponse);
    $stmt->execute();
    // Apparait champs de recherche en blanc si ne souhaite pas recherche sur ce champs
    // Cette valeur ne sera pas prise en compte dans le contrôleur
    ?>
    <option value="">-----</option>
    <?php
    //Création d'une liste pour y insérer les résultats du dico et pouvoir les trier
    $listeValidation = array();
    $liste = array();
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $estDedans = in_array($donnees[$colonneNom], $listeValidation);
        // La valeur est ajoutée à la liste déroulante si elle n'est pas déjà présente
        if (!$estDedans) {
            // Si elle n'est pas déjà présente, elle est ajouté à la liste des valeurs déjà présentes
            $listeValidation[] = $donnees[$colonneNom];
            // Enregistrement des valeurs retournées si on enregistre l'ID
            if ($colonneId != "") {
                $liste[$donnees[$colonneNom]] = $donnees[$colonneId];
                // Enregistrement des valeurs retournées si on n'enregistre pas l'ID
            } else {
                $liste[$donnees[$colonneNom]] = $donnees[$colonneNom];
            }
        }
    }
    // Ordonnancement de la liste par ordre alphabétique de la colonne des données
    ksort($liste);

    foreach ($liste as $colonneNom => $colonneId) {
        if ($isColonneIdVisible) {
            ?>
            <option value="<?= $colonneId; ?>"><?= $colonneId . " - " . $colonneNom; ?></option>
            <?php
        } else {
            ?>
            <option value="<?= $colonneId; ?>"><?= $colonneNom; ?></option>
            <?php
        }
    }
}

function getArrayFromSQL(string $table, string $colonne) {
    $pdo = openConnexion();
    $reponse = "SELECT " . $colonne . " FROM " . $table . ";";
    $stmt = $pdo->prepare($reponse);
    $stmt->execute();
    $array = array();
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $array [] = $donnees["$colonne"];
    }
    return $array;
}

/*
 * Fonction permettant de récupérer la liste d'un champs dans une autre table pour une valeur donnée (exemple idPC=1)
 * @param $table est la table dans laquelle on souhaite récupérer les données
 * @param $var est la valeur donnée dans le WHERE
 * @param $champsSelect est la colonne de laquelle nous souhaitons récupérer les données
 * Retourne une liste de valeurs
 */

Function selectListe($table, $var, $champsSelect) {
    $pdo = openConnexion();

    $liste = array();
    $requete = "SELECT " . $champsSelect . " FROM " . $table . " WHERE idPC=" . $var . ";";
    $stmtListe = $pdo->prepare($requete);

    $stmtListe->execute();

    while ($donnees = $stmtListe->fetch(PDO::FETCH_ASSOC)) {
        $liste[] = $donnees[$champsSelect];
    }
    return $liste;
}
?>
