<?php

switch ($_REQUEST['administrateur']) {
    case "voir_liste_comptes":
        include 'job/dao/Individu_Dao.php';
        $listeComptes = select();
        $listeDroits = getArrayFromSQL("droit_d","droit");
        break;
}

$pageAAfficher = 'ihm/administrateur/' . $_REQUEST['administrateur'] . '.php';

