<?php

// AhMaD: les variables static
const TABLE_exemplaire = "exemplaire";
const CLE_PRIMAIRE_exemplaire = "idExemplaire";
const TABLE_JEUT = 'jeu';
const TABLE_PCT = 'produit_culturel';
const TABLE_COMPTE = "compte";
const TABLE_INDIVIDU = "individu";
const TABLE_EDITEUR_D = 'editeur_d';
const TABLE_JEU_A_POUR_GENRE = 'jeu_a_pour_genre';
const TABLE_produit_culturel_a_pour_image = 'produit_culturel_a_pour_image';
const TABLE_note_produit_culturel = 'note_produit_culturel';
const TABLE_commentaire_produit_culturel = 'commentaire_produit_culturel';

//AhMaD: functioin qui sert a integrer un valeur dans le table

function insert($list_Values) {

    //AhMaD: déclaration les values
    $idProprietaire = $list_Values['idProprietaire'];
    $idPC = $list_Values['idPC'];


    //AhMaD:ouvrire la connexion avec BD
    $db = openConnexion();



    //AhMaD:la requete pour inserter dans le tableau exemplaire
    $requete_exemplaire = "INSERT INTO " . TABLE_exemplaire . " (idPC, idProprietaire) VALUES ( '" . $idPC . "', '" . $idProprietaire . "');";

    //AhMaD: préparer la requête pour ensuite l'exécuter
    $stmt_exemplaire = $db->prepare($requete_exemplaire);
    $stmt_exemplaire->execute();


    //AhMaD: on recherche la dernière id générée par la precedente requete en utilisant la fonction lastInsertId();
    $lastidExemplaire = $db->lastInsertId();

    //AhMaD:fermateur  la connexion avec BD
    $db = closeConnexion();

    //AhMaD:on créer un nouveau objet 
    return $lastidExemplaire;
}

//AMaD:function select en gros il s'agit de FIND!
function select($requete) {


    //AhMaD:ouvrire la connexion avec BD
    $db = openConnexion();


    //AhMaD:prepration de requete qiu vas trouver l'utilisateur entre deux table pour cela il y a jointeur
    $requete = "SELECT * FROM " . TABLE_INDIVIDU
            . " JOIN " . TABLE_COMPTE . " ON " . TABLE_INDIVIDU . ".idUser = " . TABLE_COMPTE . ".idUser "
            . " JOIN " . TABLE_exemplaire . " ON " . TABLE_exemplaire . ".idProprietaire = " . TABLE_COMPTE . ".idUser "
            . " JOIN " . TABLE_PCT . " ON " . TABLE_exemplaire . ".idPC = " . TABLE_PCT . ".idPC "
            . " JOIN " . TABLE_JEUT . " ON " . TABLE_JEUT . ".idPC = " . TABLE_PCT . ".idPC "
            . $requete . ";";

    //AhMaD: préparer la requête pour ensuite l'exécuter
    $stmt = $db->prepare($requete);

    $stmt->execute();
    //AhMaD: on vas creer un array pour stocker les informations
    $exemplaire_list = array();

    //AhMaD: je parcoure les tables pour afficher les resultats de ma requete.
    // mysql_fetch_assoc($result): permet de afficher les informations de toutes les champs
    while ($champ = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //AhMaD:tant qu'il y a des informations dans chaque champ de la ligne je les prend el je les affiche 
        $idUser = $champ['idUser'];
        $ville = $champ['ville'];
        $adresse = $champ['adresse'];
        $codePostal = $champ['codePostal'];
        $dpt = $champ['numDept'];
        $email = $champ['email'];
        $telephone = $champ['telephone'];
        $pseudo = $champ['pseudo'];
        $dateInscription = $champ['dateInscription'];
        $mdp = $champ['mdp'];
        $droit = $champ['droit'];
        $nom = $champ['nom'];
        $prenom = $champ['prenom'];
        $dateNaissance = $champ['dateNaiss'];

        //AhMaD : on vas creer un nouveau objet avec les informations
        $proprietaire = new Individu($ville, $adresse, $codePostal, $dpt, $email, $telephone, $pseudo, $dateInscription, $mdp, $droit, $nom, $prenom, $dateNaissance, $idUser);

        $nbJoueursMin = $champ['nbJoueursMin'];
        $nbJoueursMax = $champ['nbJoueursMax'];
        $nom = $champ['nom'];
        $editeur = $champ['editeur'];
        $regles = $champ['regles'];
        $difficulte = $champ['difficulte'];
        $public = $champ['public'];
        $listePieces = $champ['listePieces'];
        $dureePartie = $champ['dureePartie'];
        $anneeSortie = $champ['anneeSortie'];
        $description = $champ['description'];
        $idPC = $champ['idPC'];
        $typePC = $champ['typePC'];
        $valide = $champ['valide'];

        /*
         * M : Création de listes en récupèrant les données dans la BDD avec la méthode selectListe($table,$var,$champsSelect)
         */
        $listeGenres = selectListe(TABLE_JEU_A_POUR_GENRE, $idPC, 'genre');

        $listeImages = selectListe(TABLE_produit_culturel_a_pour_image, $idPC, 'source');

        $listeNotes = selectListe(TABLE_note_produit_culturel, $idPC, 'note');

        //=========================== LISTE COMMENTAIRES ====================================================
        /*
         * M : Récupèration dans les tables commentaire_produit_culturel et compte des commentaires sur les jeux associés à leur commentateur. Ajout dans une liste
         */
        $requeteComment = "SELECT pseudo, commentaireT  FROM " . TABLE_commentaire_produit_culturel . " JOIN " . TABLE_COMPTE . " ON " . TABLE_commentaire_produit_culturel . ".idUser=" . TABLE_COMPTE . ".idUser WHERE idPC=$idPC;";
        $stmtComment = $db->prepare($requeteComment);
        $stmtComment->execute();
        $listeCommentaires = array();
        while ($comment = $stmtComment->fetch(PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans un array.
            $pseudo = $comment['pseudo'];
            $commentaire = $comment['commentaireT'];
            $listeCommentaires [] = [$pseudo => $commentaire];
        }
        //==================================================================================================

        /* création du nouvel objet Jeu */
        $jeuT = new Jeu($nbJoueursMin, $nbJoueursMax, $nom, $editeur, $regles, $difficulte, $public, $listePieces, $dureePartie, $anneeSortie, $description, $typePC, $listeGenres, $listeNotes, $listeImages, $listeCommentaires, $valide, $idPC);

        $idExemplaire = $champ['idExemplaire'];

        //AhMaD : on vas creer un nouveau objet avec les informations
        //AhMaD : on stocke ce objet dans l'array pour remplir l'array         
        $exemplaire_list[] = new exemplaire($proprietaire, $jeuT, $idExemplaire);
    }
    //AhMaD: on ferme la conexion
    $db = closeConnexion();

    //AhMaD: finalement on va retourner avec un tableau qui remplit des objets :)
    return $exemplaire_list;
}

//AhMaD: function updat pour modifer la table
function update($list_Values) {

    //AhMaD: déclaration les values
    $idUser = $list_Values['idUser'];
    $idJeu = $list_Values['idJeu'];
    $etat = $list_Values['etat'];

    //AhMaD:ouvrire la connexion avec BD  
    $db = openConnexion();



    //AhMaD:on vas faire une requete pour savoir update le table compte.  
    $user_requete = "UPDATE " . TABLE_COMPTE . " SET idUser = " . $idUser . "WHERE " . TABLE_COMPTE . ". idUser = " . TABLE_exemplaire . ". idUser ;";
    $stmt = $db->prepare($user_requete);
    $stmt->execute();
    $user = $stmt->execute();

    //AhMaD:on vas faire une requete pour savoir update le table jeu.  
    $jeu_requete = "UPDATE " . TABLE_JEUT . " SET idJeu = " . $idJeu . " WHERE " . TABLE_JEUT . ". idJeu = " . TABLE_exemplaire . ". idJeu ;";
    $stmt = $db->prepare($jeu_requete);
    $stmt->execute();
    $jeu = $stmt->execute();

    //AhMaD:prepration de requete qui vas modifier l'utilisateur entre deux table pour cela il y a jointeur
    $requete = "UPDATE " . TABLE_exemplaire . " SET idExemplaire=" . $idExemplaire . ",idUser =" . $user . ",idJeu=" . $jeu . ", etat=" . $etat . ";";




    //AhMaD: on vas préparer la requête et l'exécuter et tu vas bien.
    $stmt = $db->prepare($requete);


    //AhMaD: on vas exécuter
    $stmt->execute();



    //AhMaD: on ferme la conexion
    $db = closeConnexion();
}

//AhMaD: function supprimer pour supprimer un copte
function delete($id) {


    //AhMaD:ouvrire la connexion avec BD  
    $db = openConnexion();

    //AhMaD:prepration de requete qui vas supprimer l'utilisateur entre deux table pour cela il y a jointeur
    $requete = "DELETE FROM " . TABLE_exemplaire . " WHERE idExemplaire = " . $id["idExemplaire"] . " ;";

    //AhMaD: on vas préparer la requête et l'exécuter et tu vas bien.
    $stmt = $db->prepare($requete);


    //AhMaD: on vas exécuter
    $stmt->execute();



    //AhMaD: on ferme la conexion
    $db = closeConnexion();
}
