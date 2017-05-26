<?php

function createRequestFromREQUEST() {
    $stringRequest = '';
    if (!empty($_REQUEST)) {
        $stringRequest = 'WHERE ';
        foreach ($_REQUEST as $key => $value) {
            $addKey = false;
            if ($key != "pret" && $key != "user" && $key != "objectToWorkWith" && $key != "actionToDoWithObject" && stristr($key, 'submit') === FALSE && $key != "reset" && $key != "page" && stristr($key, 'liste') === FALSE) {
                if ($value != null && $value != "" && $value != "-----") {
                    $stringRequest .= $key . '="' . $value . '"';
                    $addKey = true;
                }
            }
            unset($_REQUEST [$key]);
            if (!(empty($_REQUEST)) && $addKey) {
                $stringRequest .= ' AND ';
            }
        }
    }
    if (substr($stringRequest, strlen($stringRequest) - 5, 4) == " AND") {
        $stringRequest = substr($stringRequest, 0, strlen($stringRequest) - 5);
    }
    if ($stringRequest == 'WHERE ') {
        $stringRequest = "";
    }
    return str_replace("#", ".", $stringRequest);
}

function getValuesFromREQUEST() {
    $listOfValues = array();
    foreach ($_REQUEST as $key => $value) {
        $listOfValues [$key] = $value;
    }
    return $listOfValues;
}

if (!empty($_REQUEST['etape'])) {
    switch ($_REQUEST['etape']) {
        case "0":
            include "job/dao/Jeu_P_Dao.php";
            $jeuP = select("where idJeuP = '" . $_REQUEST["idJeuP"] . "'")[0];
            $pageAAfficher = "ihm/pret/1_demande_emprunt.php";
            break;
        case "1":
            include "job/dao/Pret_Dao.php";
            $listeData = getValuesFromREQUEST();
            $listeData["idNotification"] = "0";
            $listeData["statutDemande"] = "0";
            $lastEmpruntInserted = insertPret($listeData);
            $_SESSION["mesEmprunts"] = select("WHERE pret_p.idEmprunteur = " . $_SESSION["monProfil"]->getIdUser());
            $empruntCourant = getEmpruntFromId($lastEmpruntInserted);
//            if (!empty($_REQUEST["message"])) {
//                include "job/dao/Message.php";
//                $aujourdhui = getdate()["year"] . "-" . getdate()["mon"] . "-" . getdate()["mday"];
//                $dataMessage = [
//                    "idExped" => $empruntCourant->getEmprunteur()->getIdUser(),
//                    "idDest" => $empruntCourant->getJeuP()->getProprietaire()->getIdUser(),
//                    "dateEnvoi" => $aujourdhui,
//                    "sujet" => "sujet",
//                    "texte" => $_REQUEST["message"]];
//                $lastMessageInserted = insert(dataMessage);
//                insertMessagePret([$lastEmpruntInserted, $lastMessageInserted, $pretCourant->getIdNotification()]);
//            }
            $pageAAfficher = "ihm/utilisateur/mesEmprunts.php";
            break;
        case "2":
            include "job/dao/Pret_Dao.php";
            $pretCourant = getPretFromId($_REQUEST["idPret"]);
            if (!empty($_REQUEST["accepter"])) {
                $listeData = getValuesFromREQUEST();
                $listeData["idNotification"] = "0";
                $listeData["statutDemande"] = "0";
                updatePret($listeData);
                $_SESSION["mesPrets"] = selectPrets("WHERE jeu_p.idProprietaire = " . $_SESSION["monProfil"]->getIdUser());
                $pageAAfficher = "ihm/utilisateur/mesPrets.php";
            }
            if (!empty($_REQUEST["nouvellesDates"])) {
                $pageAAfficher = "ihm/pret/3_proposition_nouvelles_dates.php";
            }
            if (!empty($_REQUEST["refuser"])) {
                $listeData = getValuesFromREQUEST();
                $listeData["idNotification"] = "0";
                $listeData["statutDemande"] = "0";
                updatePret($listeData);
                $_SESSION["mesPrets"] = selectPrets("WHERE jeu_p.idProprietaire = " . $_SESSION["monProfil"]->getIdUser());
                $pageAAfficher = "ihm/utilisateur/mesPrets.php";
            }
//            $_REQUEST["message"];
            break;
        case "3":
            include "job/dao/Pret_Dao.php";
            $pretCourant = getPretFromId($_REQUEST["idPret"]);
            $listeData = getValuesFromREQUEST();
            $listeData["idNotification"] = "0";
            $listeData["statutDemande"] = "0";
            updatePret($listeData);
            $_SESSION["mesPrets"] = selectPrets("WHERE jeu_p.idProprietaire = " . $_SESSION["monProfil"]->getIdUser());
//            $_REQUEST["message"];
            $pageAAfficher = "ihm/utilisateur/mesPrets.php";
            break;
        case "4":
            include "job/dao/Pret_Dao.php";
            $empruntCourant = getEmpruntFromId($_REQUEST["idPret"]);
            if (!empty($_REQUEST["accepter"])) {
                $listeData = getValuesFromREQUEST();
                $listeData["idNotification"] = "0";
                $listeData["statutDemande"] = "0";
                updatePret($listeData);
                $_SESSION["mesEmprunts"] = select("WHERE pret_p.idEmprunteur = " . $_SESSION["monProfil"]->getIdUser());
            }
            if (!empty($_REQUEST["refuser"])) {
                $listeData = getValuesFromREQUEST();
                $listeData["idNotification"] = "0";
                $listeData["statutDemande"] = "0";
                updatePret($listeData);
                $_SESSION["mesEmprunts"] = select("WHERE pret_p.idEmprunteur = " . $_SESSION["monProfil"]->getIdUser());
            }
//            $_REQUEST["message"];
            $pageAAfficher = "ihm/utilisateur/mesEmprunts.php";
            break;
        case "5":
            include "job/dao/Pret_Dao.php";
            $pretCourant = getPretFromId($_REQUEST["idPret"]);
            $listeData = getValuesFromREQUEST();
            $listeData["idNotification"] = "0";
            $listeData["statutDemande"] = "0";
            updatePret($listeData);
            insertExpedition($listeData);
            $_SESSION["mesPrets"] = selectPrets("WHERE jeu_p.idProprietaire = " . $_SESSION["monProfil"]->getIdUser());
//            $_REQUEST["message"];
            $pageAAfficher = "ihm/utilisateur/mesPrets.php";
            break;
        case "6":
            include "job/dao/Pret_Dao.php";
            $empruntCourant = getEmpruntFromId($_REQUEST["idPret"]);
            $listeData = getValuesFromREQUEST();
            $listeData["idNotification"] = "0";
            $listeData["statutDemande"] = "0";
            updatePret($listeData);
            updateExpedition($listeData);
            $_SESSION["mesEmprunts"] = select("WHERE pret_p.idEmprunteur = " . $_SESSION["monProfil"]->getIdUser());
//            $_REQUEST["message"];
            $pageAAfficher = "ihm/utilisateur/mesEmprunts.php";
            break;
        case "7":
            include "job/dao/Pret_Dao.php";
            $empruntCourant = getEmpruntFromId($_REQUEST["idPret"]);
            $listeData = getValuesFromREQUEST();
            $listeData["idNotification"] = "0";
            $listeData["statutDemande"] = "0";
            updatePret($listeData);
            updateExpedition($listeData);
//            $_REQUEST["note"];
//            $_REQUEST["commentaire"];
            $_SESSION["mesEmprunts"] = select("WHERE pret_p.idEmprunteur = " . $_SESSION["monProfil"]->getIdUser());
//            $_REQUEST["message"];
            $pageAAfficher = "ihm/utilisateur/mesEmprunts.php";
            break;
        case "8":
            include "job/dao/Pret_Dao.php";
            $pretCourant = getPretFromId($_REQUEST["idPret"]);
            $listeData = getValuesFromREQUEST();
            $listeData["idNotification"] = "0";
            $listeData["statutDemande"] = "0";
            updatePret($listeData);
            updateExpedition($listeData);
            $_REQUEST["retourDateReception"];
            $_REQUEST["retourEtatJeu"];
            $_REQUEST["retourPiecesManquantes"];
            $_SESSION["mesPrets"] = selectPrets("WHERE jeu_p.idProprietaire = " . $_SESSION["monProfil"]->getIdUser());
//            $_REQUEST["message"];
            $pageAAfficher = "ihm/utilisateur/mesPrets.php";
            break;
    }
}

