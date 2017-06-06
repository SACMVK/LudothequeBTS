<?php

function selectPrets($requete) {


    //AhMaD:ouvrire la connexion avec BD
    $db = openConnexion();


    $requete = "SELECT * FROM pret "
            . " JOIN compte as compteEmprunteur ON compteEmprunteur.idUser = pret.idEmprunteur "
            . " JOIN individu as individuEmprunteur ON individuEmprunteur.idUser = pret.idEmprunteur "
            . " JOIN exemplaire ON exemplaire.idExemplaire = pret.idExemplaire "
            . " JOIN produit_culturel ON exemplaire.idPC = produit_culturel.idPC "
            . " JOIN jeu ON jeu.idPC = produit_culturel.idPC "
            . " JOIN compte as compteProprietaire ON exemplaire.idProprietaire = compteProprietaire.idUser "
            . " JOIN individu as individuProprietaire ON exemplaire.idProprietaire = individuProprietaire.idUser "
            . $requete . ";";


    $stmt = $db->prepare($requete);

    $stmt->execute();

    $pret_list = array();

    /* stefan : PDO ne permet pas d'avoir les noms de colonnes retournées de type table.colonne
     * En cas de nom doublon (par exemple nom emprunteur, nom propriétaire et nom jeu),
     * FETCH_ASSOC écrase les valeurs car il ne peut retourner que "nom".
     * FETCH_NAMED créé des tableaux lorsque plusieurs colonnes ont le même nom.
     * Il faut donc aller chercher les index.
     * On peut se repérer car les tableaux sont créé au fur et à mesure de la déclaration
     * des tables dans le JOIN.
     * D'où l'intérêt d'avoir des noms de colonnes intégrant le nom
     * de la table : table_colonne.
     */
    while ($champ = $stmt->fetch(PDO::FETCH_NAMED)) {
        $idUserProprietaire = $champ['idUser']["2"];
        $villeProprietaire = $champ['ville']["1"];
        $adresseProprietaire = $champ['adresse']["1"];
        $codePostalProprietaire = $champ['codePostal']["1"];
        $dptProprietaire = $champ['numDept']["1"];
        $emailProprietaire = $champ['email']["1"];
        $telephoneProprietaire = $champ['telephone']["1"];
        $pseudoProprietaire = $champ['pseudo']["1"];
        $dateInscriptionProprietaire = $champ['dateInscription']["1"];
        $mdpProprietaire = $champ['mdp']["1"];
        $droitProprietaire = $champ['droit']["1"];
        $nomProprietaire = $champ['nom']["2"];
        $prenomProprietaire = $champ['prenom']["1"];
        $dateNaissanceProprietaire = $champ['dateNaiss']["1"];

        $proprietaire = new Individu($villeProprietaire, $adresseProprietaire, $codePostalProprietaire, $dptProprietaire, $emailProprietaire, $telephoneProprietaire, $pseudoProprietaire, $dateInscriptionProprietaire, $mdpProprietaire, $droitProprietaire, $nomProprietaire, $prenomProprietaire, $dateNaissanceProprietaire, $idUserProprietaire);

        $nbJoueursMinJeu = $champ['nbJoueursMin'];
        $nbJoueursMaxJeu = $champ['nbJoueursMax'];
        $nomJeu = $champ['nom']["1"];
        $editeurJeu = $champ['editeur'];
        $reglesJeu = $champ['regles'];
        $difficulteJeu = $champ['difficulte'];
        $publicJeu = $champ['public'];
        $listePiecesJeu = $champ['listePieces'];
        $dureePartieJeu = $champ['dureePartie'];
        $anneeSortieJeu = $champ['anneeSortie'];
        $descriptionJeu = $champ['description'];
        $idPC = $champ['idPC']["0"];
        $typePCJeu = $champ['typePC'];
        $valide = $champ['valide'];

        /*
         * M : Création de listes en récupèrant les données dans la BDD avec la méthode selectListe($table,$var,$champsSelect)
         */
        $listeGenres = selectListe("jeu_a_pour_genre", $idPC, 'genre');

        $listeImages = selectListe("produit_culturel_a_pour_image", $idPC, 'source');

        $listeNotes = selectListe("note_produit_culturel", $idPC, 'note');

        //=========================== LISTE COMMENTAIRES ====================================================
        /*
         * M : Récupèration dans les tables commentaire_produit_culturel et compte des commentaires sur les jeux associés à leur commentateur. Ajout dans une liste
         */
        $requeteComment = "SELECT pseudo, commentaireT  FROM commentaire_produit_culturel JOIN  compte  ON commentaire_produit_culturel.idUser= compte.idUser WHERE idPC=".$idPC.";";
        $stmtComment = $db->prepare($requeteComment);
        $stmtComment->execute();
        $listeCommentaires = array();
        while ($comment = $stmtComment->fetch(PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans un array.
            $pseudo = $comment['pseudo'];
            $commentaire = $comment['commentaireT'];
            $listeCommentaires [] = [$pseudo => $commentaire];
        }
        //==================================================================================================


        $jeuT = new Jeu($nbJoueursMinJeu, $nbJoueursMaxJeu, $nomJeu, $editeurJeu, $reglesJeu, $difficulteJeu, $publicJeu, $listePiecesJeu, $dureePartieJeu, $anneeSortieJeu, $descriptionJeu, $typePCJeu, $listeGenres, $listeNotes, $listeImages, $listeCommentaires, $valide, $idPC);

        $idExemplaire = $champ['idExemplaire']["0"];

        $jeuP = new exemplaire($proprietaire, $jeuT, $idExemplaire);

        $idUserEmprunteur = $champ['idUser']["0"];
        $villeEmprunteur = $champ['ville']["0"];
        $adresseEmprunteur = $champ['adresse']["0"];
        $codePostalEmprunteur = $champ['codePostal']["0"];
        $dptEmprunteur = $champ['numDept']["0"];
        $emailEmprunteur = $champ['email']["0"];
        $telephoneEmprunteur = $champ['telephone']["0"];
        $pseudoEmprunteur = $champ['pseudo']["0"];
        $dateInscriptionEmprunteur = $champ['dateInscription']["0"];
        $mdpEmprunteur = $champ['mdp']["0"];
        $droitEmprunteur = $champ['droit']["0"];
        $nomEmprunteur = $champ['nom']["0"];
        $prenomEmprunteur = $champ['prenom']["0"];
        $dateNaissanceEmprunteur = $champ['dateNaiss']["0"];

        $emprunteur = new Individu($villeEmprunteur, $adresseEmprunteur, $codePostalEmprunteur, $dptEmprunteur, $emailEmprunteur, $telephoneEmprunteur, $pseudoEmprunteur, $dateInscriptionEmprunteur, $mdpEmprunteur, $droitEmprunteur, $nomEmprunteur, $prenomEmprunteur, $dateNaissanceEmprunteur, $idUserEmprunteur);

        $propositionEmprunteurDateDebut = $champ['propositionEmprunteurDateDebut'];
        $propositionEmprunteurDateFin = $champ['propositionEmprunteurDateFin'];
        $propositionPreteurDateDebut = $champ['propositionPreteurDateDebut'];
        $propositionPreteurDateFin = $champ['propositionPreteurDateFin'];
        $idNotification = $champ['notification'];
        $statutDemande = $champ['statutDemande'];
        $idPret = $champ['idPret'];

        $requeteNotification = "SELECT * FROM notification WHERE idNotification = " . $idNotification . ";";
        $stmtNotification = $db->prepare($requeteNotification);
        $stmtNotification->execute();
        $notification_dic = array();
        while ($champNotification = $stmtNotification->fetch(PDO::FETCH_ASSOC)) {
            $notification_dic ["sujetPreteur"] = $champNotification["sujetPreteur"];
            $notification_dic ["corpsPreteur"] = $champNotification["corpsPreteur"];
            $notification_dic ["sujetEmprunteur"] = $champNotification["sujetEmprunteur"];
            $notification_dic ["corpsEmprunteur"] = $champNotification["corpsEmprunteur"];
        }


        $requeteMessages = "SELECT * FROM pret_a_pour_message
            JOIN message ON pret_a_pour_message.idMessage = message.idMessage
            JOIN individu as destIndividu ON message.idDest=destIndividu.idUser
            JOIN compte as destCompte ON destCompte.idUser=destindividu.idUser
            JOIN individu as expedIndividu ON message.idExped=expedIndividu.idUser
            JOIN compte as expedCompte ON expedCompte.idUser=expedIndividu.idUser 
            WHERE pret_a_pour_message.idPret = " . $idPret . ";";
        $stmtMessages = $db->prepare($requeteMessages);
        $stmtMessages->execute();
        $listeMessages = [];
        while ($champMessages = $stmtMessages->fetch(PDO::FETCH_NAMED)) {
            $idMessage = $champMessages['idMessage'];
            $texte = $champMessages['texte'];
            $sujet = $champMessages['sujet'];
            $dateEnvoi = $champMessages['dateEnvoi'];
            $destId = $champMessages['idUser'][0];
            $destVille = $champMessages['ville'][0];
            $destAdresse = $champMessages['adresse'][0];
            $destCodePostal = $champMessages['codePostal'][0];
            $destDpt = $champMessages['numDept'][0];
            $destEmail = $champMessages['email'][0];
            $destTelephone = $champMessages['telephone'][0];
            $destPseudo = $champMessages['pseudo'][0];
            $destDateInscription = $champMessages['dateInscription'][0];
            $destMdp = $champMessages['mdp'][0];
            $destDroit = $champMessages['droit'][0];
            $destNom = $champMessages['nom'][0];
            $destPrenom = $champMessages['prenom'][0];
            $destDN = $champMessages['dateNaiss'][0];
            $expId = $champMessages['idUser'][2];
            $expVille = $champMessages['ville'][1];
            $expAdresse = $champMessages['adresse'][1];
            $expCodePostal = $champMessages['codePostal'][1];
            $expDpt = $champMessages['numDept'][1];
            $expEmail = $champMessages['email'][1];
            $expTelephone = $champMessages['telephone'][1];
            $expPseudo = $champMessages['pseudo'][1];
            $expDateInscription = $champMessages['dateInscription'][1];
            $expMdp = $champMessages['mdp'][1];
            $expDroit = $champMessages['droit'][1];
            $expNom = $champMessages['nom'][1];
            $expPrenom = $champMessages['prenom'][1];
            $expDN = $champMessages['dateNaiss'][1];

            $dest = new Individu($destVille, $destAdresse, $destCodePostal, $destDpt, $destEmail, $destTelephone, $destPseudo, $destDateInscription, $destMdp, $destDroit, $destNom, $destPrenom, $destDN, $destId);
            $exp = new Individu($expVille, $expAdresse, $expCodePostal, $expDpt, $expEmail, $expTelephone, $expPseudo, $expDateInscription, $expMdp, $expDroit, $expNom, $expPrenom, $expDN, $expId);

            $listeMessages[] = new Message($exp, $dest, $dateEnvoi, $sujet, $texte, $idMessage);
        }



        $nouveauPret = new Pret($jeuP, $emprunteur, $propositionEmprunteurDateDebut, $propositionEmprunteurDateFin, $propositionPreteurDateDebut, $propositionPreteurDateFin, $idNotification, $notification_dic, $statutDemande, $listeMessages, $idPret);

        $requeteExpedition = "SELECT * FROM expedition WHERE idPret = " . $idPret . ";";
        $stmtExpedition = $db->prepare($requeteExpedition);
        $stmtExpedition->execute();
        while ($champExpedition = $stmtExpedition->fetch(PDO::FETCH_ASSOC)) {
            $envoiDateEnvoi = $champExpedition["envoiDateEnvoi"];
            $envoiDateReception = $champExpedition["envoiDateReception"];
            $envoiEtatJeu = $champExpedition["envoiEtatJeu"];
            $envoiPiecesManquantes = $champExpedition["envoiPiecesManquantes"];
            $retourDateEnvoi = $champExpedition["retourDateEnvoi"];
            $retourDateReception = $champExpedition["retourDateReception"];
            $retourEtatJeu = $champExpedition["retourEtatJeu"];
            $retourPiecesManquantes = $champExpedition["retourPiecesManquantes"];
            $expedition = new Expedition($envoiDateEnvoi, $envoiDateReception, $envoiEtatJeu, $envoiPiecesManquantes, $retourDateEnvoi, $retourDateReception, $retourEtatJeu, $retourPiecesManquantes);
            $nouveauPret->setExpedition($expedition);
        }



        $pret_list[] = $nouveauPret;
    }

    $db = closeConnexion();


    return $pret_list;
}

function insertPret($list_Values) {
    $idExemplaire = $list_Values["idExemplaire"];
    $idEmprunteur = $list_Values["idEmprunteur"];
    $propositionEmprunteurDateDebut = convertDateToSQLdate($list_Values["propositionEmprunteurDateDebut"]);
    $propositionEmprunteurDateFin = convertDateToSQLdate($list_Values["propositionEmprunteurDateFin"]);
    $notification = $list_Values["notification"];
    $statutDemande = $list_Values["statutDemande"];
    $requete = "INSERT INTO pret (idExemplaire, idEmprunteur, propositionEmprunteurDateDebut, propositionEmprunteurDateFin, notification, statutDemande) "
            . "VALUES ('" . $idExemplaire . "','" . $idEmprunteur . "','" . $propositionEmprunteurDateDebut . "','" . $propositionEmprunteurDateFin . "','" . $notification . "','" . $statutDemande . "');";
    $db = openConnexion();
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $lastInsertId = $db->lastInsertId();
    $db = closeConnexion();
    return $lastInsertId;
}

function insertExpedition($list_Values) {
    $idPret = $list_Values["idPret"];
    $envoiDateEnvoi = convertDateToSQLdate($list_Values["envoiDateEnvoi"]);
    $requete = "INSERT INTO expedition (idPret, envoiDateEnvoi) VALUES ('" . $idPret . "','" . $envoiDateEnvoi . "');";
    $db = openConnexion();
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $lastInsertId = $db->lastInsertId();
    $db = closeConnexion();
    return $lastInsertId;
}

function insertMessagePret($list_Values) {
    $idPret = $list_Values["idPret"];
    $idMessage = $list_Values["idMessage"];
    $idNotification = $list_Values["idNotification"];
    $requete = "INSERT INTO pret_a_pour_message (idPret, idMessage, idNotification) VALUES ('" . $idPret . "','" . $idMessage . "','" . $idNotification . "');";
    $db = openConnexion();
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $lastInsertId = $db->lastInsertId();
    $db = closeConnexion();
    return $lastInsertId;
}

function insertNote($list_Values) {
    $idPC = $list_Values["idPC"];
    $idUser = $list_Values["idUser"];
    $note = $list_Values["note"];
    $requete = "INSERT INTO note_produit_culturel (idPC, idUser, note) VALUES ('" . $idPC . "','" . $idUser . "','" . $note . "');";
    $db = openConnexion();
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $lastInsertId = $db->lastInsertId();
    $db = closeConnexion();
    return $lastInsertId;
}

function insertCommentaire($list_Values) {
    $idPC = $list_Values["idPC"];
    $commentaireT = $list_Values["commentaireT"];
    $idUser = $list_Values["idUser"];
    $requete = "INSERT INTO commentaire_produit_culturel (idPC, commentaireT, idUser) VALUES ('" . $idPC . "','" . $commentaireT . "','" . $idUser . "');";
    $db = openConnexion();
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $lastInsertId = $db->lastInsertId();
    $db = closeConnexion();
    return $lastInsertId;
}

function updatePret($list_Values) {
    $idPret = $list_Values["idPret"];
    $listeSet = [];
    if (!empty($list_Values["idExemplaire"])) {
        $listeSet [] = "idExemplaire = '" . $list_Values["idExemplaire"] . "'";
    }
    if (!empty($list_Values["idEmprunteur"])) {
        $listeSet [] = "idEmprunteur = '" . $list_Values["idEmprunteur"] . "'";
    }
    if (!empty($list_Values["propositionEmprunteurDateDebut"])) {
        $listeSet [] = "propositionEmprunteurDateDebut = '" . convertDateToSQLdate($list_Values["propositionEmprunteurDateDebut"]) . "'";
    }
    if (!empty($list_Values["propositionEmprunteurDateFin"])) {
        $listeSet [] = "propositionEmprunteurDateFin = '" . convertDateToSQLdate($list_Values["propositionEmprunteurDateFin"]) . "'";
    }
    if (!empty($list_Values["propositionPreteurDateDebut"])) {
        $listeSet [] = "propositionPreteurDateDebut = '" . convertDateToSQLdate($list_Values["propositionPreteurDateDebut"]) . "'";
    }
    if (!empty($list_Values["propositionPreteurDateFin"])) {
        $listeSet [] = "propositionPreteurDateFin = '" . convertDateToSQLdate($list_Values["propositionPreteurDateFin"]) . "'";
    }
    if (!empty($list_Values["notification"])) {
        $listeSet [] = "notification = '" . $list_Values["notification"] . "'";
    }
    if (!empty($list_Values["statutDemande"])) {
        $listeSet [] = "statutDemande = '" . $list_Values["statutDemande"] . "'";
    }
    $set = "";
    for ($i = 0; $i < count($listeSet) - 1; $i++) {
        $set .= $listeSet[$i] . ", ";
    }
    $set .= $listeSet[count($listeSet) - 1];

    $requete = "UPDATE pret SET " . $set . " WHERE idPret = " . $idPret . ";";

    $db = openConnexion();
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $db = closeConnexion();
}

function updateExpedition($list_Values) {
    $idPret = $list_Values["idPret"];
    if (!empty($list_Values["envoiDateEnvoi"])) {
        $listeSet [] = "envoiDateEnvoi = '" . convertDateToSQLdate($list_Values["envoiDateEnvoi"]) . "'";
    }
    if (!empty($list_Values["envoiDateReception"])) {
        $listeSet [] = "envoiDateReception = '" . convertDateToSQLdate($list_Values["envoiDateReception"]) . "'";
    }
    if (!empty($list_Values["envoiEtatJeu"])) {
        $listeSet [] = "envoiEtatJeu = '" . $list_Values["envoiEtatJeu"] . "'";
    }
    if (!empty($list_Values["envoiPiecesManquantes"])) {
        if ($list_Values["envoiPiecesManquantes"] == "oui") {
            $listeSet [] = "envoiPiecesManquantes = 1";
        } else {
            $listeSet [] = "envoiPiecesManquantes = 0";
        }
    }
    if (!empty($list_Values["retourDateEnvoi"])) {
        $listeSet [] = "retourDateEnvoi = '" . convertDateToSQLdate($list_Values["retourDateEnvoi"]) . "'";
    }
    if (!empty($list_Values["retourDateReception"])) {
        $listeSet [] = "retourDateReception = '" . convertDateToSQLdate($list_Values["retourDateReception"]) . "'";
    }
    if (!empty($list_Values["retourEtatJeu"])) {
        $listeSet [] = "retourEtatJeu = '" . $list_Values["retourEtatJeu"] . "'";
    }
    if (!empty($list_Values["retourPiecesManquantes"])) {
        if ($list_Values["retourPiecesManquantes"] == "oui") {
            $listeSet [] = "retourPiecesManquantes = 1";
        } else {
            $listeSet [] = "retourPiecesManquantes = 0";
        }
    }
    $set = "";
    for ($i = 0; $i < count($listeSet) - 1; $i++) {
        $set .= $listeSet[$i] . ", ";
    }
    $set .= $listeSet[count($listeSet) - 1];
    $requete = "UPDATE expedition SET " . $set . " WHERE idPret = " . $idPret . ";";

    $db = openConnexion();
    $stmt = $db->prepare($requete);
    $stmt->execute();
    $db = closeConnexion();
}

function deletePret($id) {
    
}
