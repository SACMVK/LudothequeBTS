<?php

include 'job/dao/Jeu_T_Dao.php';

switch ($_REQUEST['moderateur']) {
    case "voir_liste_jeux_non_valides":
        if (!empty($_REQUEST["valider"])) {
            $listeData = getValuesFromREQUEST();
            $listeData["valide"] = "1";
            update($listeData);
        } elseif (!empty($_REQUEST["supprimer"])) {
            delete($listeData["idPC"]);
        }
        $listeJeuxAvalider = select("WHERE valide = 0");
        break;
    case "modifier_jeu":
        $jeuAModifier = select("WHERE produit_culturel_t.idPC = " . $_REQUEST["idPC"])[0];
        break;
    case "valider_jeu":
        $jeuAModifier = select("WHERE produit_culturel_t.idPC = " . $_REQUEST["idPC"])[0];
        break;
}

$pageAAfficher = 'ihm/moderateur/' . $_REQUEST['moderateur'] . '.php';

