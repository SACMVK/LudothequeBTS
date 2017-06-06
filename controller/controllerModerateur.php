<?php

include 'job/dao/Jeu_Dao.php';
function getValuesFromREQUEST() {
    $listOfValues = array();
    foreach ($_REQUEST as $key => $value) {
        $listOfValues [$key] = $value;
    }
    return $listOfValues;
}

switch ($_REQUEST['moderateur']) {
    case "voir_liste_jeux_non_valides":
        $listeData = getValuesFromREQUEST();
        if (!empty($_REQUEST["valider"])) {
            $listeData["valide"] = "1";
            update($listeData);
        } elseif (!empty($_REQUEST["supprimer"])) {
            delete($listeData["idPC"]);
        }
        $listeJeuxAvalider = select("WHERE valide = 0");
        break;
    case "modifier_jeu":
        $jeuAModifier = select("WHERE produit_culturel.idPC = " . $_REQUEST["idPC"])[0];
        break;
    case "valider_jeu":
        $jeuAModifier = select("WHERE produit_culturel.idPC = " . $_REQUEST["idPC"])[0];
        break;
}

$pageAAfficher = 'ihm/moderateur/' . $_REQUEST['moderateur'] . '.php';

