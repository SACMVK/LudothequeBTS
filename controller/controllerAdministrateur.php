<?php

switch ($_REQUEST['administrateur']) {
    case "voir_liste_jeux_non_valides":
        if (!empty($_REQUEST["valider"])) {
            $listeData = getValuesFromREQUEST();
            $listeData["valider"] = "1";
            update($listeData);
        } elseif (!empty($_REQUEST["supprimer"])) {
            delete($listeData["idPC"]);
        }
        $jeuAModifier = select("WHERE produit_culturel_t.idPC = " . $_REQUEST["idPC"])[0];
        $listeJeuxAValider = select("WHERE valider = 0");
        break;
    case "modifier_jeu":
        $jeuAModifier = select("WHERE produit_culturel_t.idPC = " . $_REQUEST["idPC"])[0];
        break;
    case "valider_jeu":
        $jeuAModifier = select("WHERE produit_culturel_t.idPC = " . $_REQUEST["idPC"])[0];
        break;
}

$pageAAfficher = 'ihm/administrateur/' . $_REQUEST['Administrateur'] . '.php';

