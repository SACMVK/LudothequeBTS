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

Function selectDico($table, $colonne) {

    // M : Connecxion a la BD
    $pdo = openConnexion();
    $reponse = "SELECT * FROM " . $table . "";
    $stmt = $pdo->prepare($reponse);
    $stmt->execute();
    // Apparait champs de recherche en blanc si ne souhaite pas recherche sur ce champs
    ?>
    <option value="aucune"> </option>
    <?php
    //Création d'une liste pour y insérer les résultat du dico et pouvoir les trier
    $listeValidation = array();
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $estDedans = in_array($donnees[$colonne], $listeValidation);
        if (!$estDedans) {
            $listeValidation[] = $donnees[$colonne];
        } //Je souhaite insérer la valeurs si elle n'est pas déjà présente dans la liste
        // $listeValidation[]=$donnees[$colonne];
    }
    asort($listeValidation);
    foreach ($listeValidation as $valueDico) {
        ?>
        <option value="<?php echo $valueDico; ?>"><?php echo $valueDico; ?></option>
        <?php
    }
}

Function selectValuesWithId(string $table, string $colonneNom, string $colonneId) {

    // M : Connecxion a la BD
    $pdo = openConnexion();
    $reponse = "SELECT * FROM " . $table . "";
    $stmt = $pdo->prepare($reponse);
    $stmt->execute();
    // Apparait champs de recherche en blanc si ne souhaite pas recherche sur ce champs
    ?>
    <option value="">-----</option>
    <?php
    //Création d'une liste pour y insérer les résultats du dico et pouvoir les trier
    $listeValidation = array();
    $liste = array();
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $estDedans = in_array($donnees[$colonneNom], $listeValidation);
        if (!$estDedans) {
            $listeValidation[] = $donnees[$colonneNom];
            $liste[$donnees[$colonneNom]] = $donnees[$colonneId];
        }
    }
    ksort($liste);
    foreach ($liste as $colonneNom => $colonneId) {
        ?>
        <option value="<?= $colonneId; ?>"><?= $colonneNom; ?></option>
        <?php
    }
}
?>