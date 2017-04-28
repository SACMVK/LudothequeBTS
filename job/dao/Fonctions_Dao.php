<?php



function getAujourdhui(){
   return getDate()['year']."-".getDate()['mon']."-".getDate()['mday'];
}

function convertDateToSQLdate(string $stringDate) {
    $delimiters = ["/", "-", " ", ":"];
    foreach ($delimiters as $value) {
        if(strpbrk ($value, $stringDate)!=false){
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
    $ResDico = array();
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $estDedans = in_array($donnees[$colonne], $ResDico);
        if (!$estDedans) {
            $ResDico[] = $donnees[$colonne];
        } //Je souhaite insérer la valeurs si elle n'est pas déjà présente dans la liste
        // $ResDico[]=$donnees[$colonne];
    }
    asort($ResDico);
    foreach ($ResDico as $valueDico) {
        ?>
        <option value="<?php echo $valueDico; ?>"><?php echo $valueDico; ?></option>
        <?php
    }
}
?>