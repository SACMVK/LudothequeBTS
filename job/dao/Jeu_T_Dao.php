<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* M : création des variables tables
 */
const TABLEJEUT = 'jeu_t';
const TABLEPCT = 'produit_culturel_t';
const TABLE_EDITEUR_D = 'editeur_d';
const TABLE_JEU_A_POUR_GENRE = 'jeu_a_pour_genre';
const TABLE_A_POUR_IMAGE = 'a_pour_image';
const TABLE_NOTE_JEU_T = 'note_jeu_t';
const TABLE_COMMENTAIRE_P_C_T = 'commentaire_p_c_t';
const TABLE_COMPTE = 'compte';

Function select($requete) {
    /* M : Ouverture de la connexion
     */
    $pdo = openConnexion();


    /* M : préparation de la requete - permet d'adapter les requetes en fonctions de variables
     */
    $requete = "SELECT * FROM " . TABLEJEUT . " JOIN " . TABLEPCT . " ON " . TABLEPCT . ".idPC=" . TABLEJEUT . ".idPC " . $requete . ";";
    $stmt = $pdo->prepare($requete);

    /* M : 
     */
    $stmt->execute();


    /* M : Déclaration de la variable liste que l'on va retourner
     */
    $liste_jeuT = array();

    /* M : Ressort chaque entrées une à une
     */
    while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans un array.


        /* M :création des variable en local qui récupèrent les données de la table pour chaque champs de l'objet
         *  en fonction du constructeur défini dans Jeu_T
         */
        $nbJoueursMin = $donnees['nbJoueursMin'];
        $nbJoueursMax = $donnees['nbJoueursMax'];
        $nom = $donnees['nom'];
        $editeur = $donnees['editeur'];
        $regles = $donnees['regles'];
        $difficulte = $donnees['difficulte'];
        $public = $donnees['public'];
        $listePieces = $donnees['listePieces'];
        $dureePartie = $donnees['dureePartie'];
        $anneeSortie = $donnees['anneeSortie'];
        $description = $donnees['description'];
        $idPC = $donnees['idPC'];
        $typePC = $donnees['typePC'];
        $valide = $donnees['valide'];

        /*
         * M : Création de listes en récupèrant les données dans la BDD avec la méthode selectListe($table,$var,$champsSelect)
         */
        $listeGenres = selectListe(TABLE_JEU_A_POUR_GENRE, $idPC, 'genre');

        $listeImages = selectListe(TABLE_A_POUR_IMAGE, $idPC, 'source');

        $listeNotes = selectListe(TABLE_NOTE_JEU_T, $idPC, 'note');

        //=========================== LISTE COMMENTAIRES ====================================================
        /*
         * M : Récupèration dans les tables commentaire_p_c_t et compte des commentaires sur les jeux associés à leur commentateur. Ajout dans une liste
         */
        $requeteComment = "SELECT pseudo, commentaireT  FROM " . TABLE_COMMENTAIRE_P_C_T . " JOIN " . TABLE_COMPTE . " ON " . TABLE_COMMENTAIRE_P_C_T . ".idUser=" . TABLE_COMPTE . ".idUser WHERE idPC=$idPC;";
        $stmtComment = $pdo->prepare($requeteComment);
        $stmtComment->execute();
        $listeCommentaires = array();
        while ($comment = $stmtComment->fetch(PDO::FETCH_ASSOC)) { // Chaque entrée sera récupérée et placée dans un array.
            $pseudo = $comment['pseudo'];
            $commentaire = $comment['commentaireT'];
            $listeCommentaires [] = [$pseudo => $commentaire];
        }
        //==================================================================================================
        /* création du nouvel objet Jeu_T */
        $jeuT = new Jeu_T($nbJoueursMin, $nbJoueursMax, $nom, $editeur, $regles, $difficulte, $public, $listePieces, $dureePartie, $anneeSortie, $description, $typePC, $listeGenres, $listeNotes, $listeImages, $listeCommentaires, $valide, $idPC);
        // ajout de l'objet à la liste
        $liste_jeuT [] = $jeuT;
    }


    /* M : Fermeture de la connexion
     */
    $pdo = closeConnexion();

    /* M : La valeur retournée est un array
     */
    return $liste_jeuT;
}

//$listeJeuT = new Jeu_T($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$typePC,$anneeSortie,$description,$idPC,$idJeuT);

Function insert($valueToInsert) {
    /* M : Ouverture de la connexion
     */
    $pdo = openConnexion();

    // M :Vérification si l'editeur existe déjà dans le dico editeur_d, 1 ligne si oui, 0 sinon
    $edi = "SELECT * FROM editeur_d WHERE editeur=:editeur;";
    $query = $pdo->prepare($edi);
    $query->execute(array('editeur' => $valueToInsert['editeur']));
    $count = $query->rowCount();

    //M : Requetes sur les tables jeu_t et produit_c_t 
    $requetePCT = "INSERT INTO " . TABLEPCT . " (nom,public,typePC,anneeSortie,description,valide) VALUES (:nom,:public,:typePC,:anneeSortie,:description,:valide);";
    $requeteJeuT = "INSERT INTO " . TABLEJEUT . " (idPC,nbJoueursMin,nbJoueursMax,editeur,regles,difficulte,listePieces,dureePartie) VALUES (:idPC,:nbJoueursMin,:nbJoueursMax,:editeur,:regles,:difficulte,:listePieces,:dureePartie);";
    $requeteJAPG = "INSERT INTO " . TABLE_JEU_A_POUR_GENRE . " (idPC, genre) VALUES (:idPC, :genre);";
    $requeteAPI = "INSERT INTO " . TABLE_A_POUR_IMAGE . " (idPC, source) VALUES (:idPC, :source);";

    // M : préparation des requêtes
    $stmtPCT = $pdo->prepare($requetePCT);
    $stmtJeuT = $pdo->prepare($requeteJeuT);

    // M : Vérification si l'editeur existe dans le dictionnaire, sinon, je l'ajoute à celui-ci
    if ($count == 0) :
        $requeteEditeur_d = "INSERT INTO " . TABLE_EDITEUR_D . "(editeur) VALUES (:editeur);";
        $stmtEditeur_d = $pdo->prepare($requeteEditeur_d);
        $stmtEditeur_d->execute(array(
            "editeur" => $valueToInsert['editeur']
        ));
    endif;

    // M : On execute        
    $stmtPCT->execute(array(
        "nom" => $valueToInsert['nom'],
        "public" => $valueToInsert['public'],
        "typePC" => $valueToInsert['typePC'],
        "anneeSortie" => $valueToInsert['anneeSortie'],
        "description" => $valueToInsert['description'],
        "valide" => $valueToInsert['valide']
    ));

    // M : Récupération du dernier ID avec lastInsertID() sur le pdo
    $lastIdPC = $pdo->lastInsertId();
    $stmtJeuT->execute(array(
        "idPC" => $lastIdPC,
        "nbJoueursMin" => $valueToInsert['nbJoueursMin'],
        "nbJoueursMax" => $valueToInsert['nbJoueursMax'],
        "editeur" => $valueToInsert['editeur'],
        "regles" => $valueToInsert['regles'],
        "difficulte" => $valueToInsert['difficulte'],
        "listePieces" => $valueToInsert['listePieces'],
        "dureePartie" => $valueToInsert['dureePartie']
    ));

    //================== insertion de la liste des genres dans la table jeu_a_pour_genre =================================//
    // M : Lecture de l'array reçu et insertion dans la base pour chaque ligne de l'idPC et du genre
    $listGenreFromCreation_jeu_t = $valueToInsert['genre'];

    for ($j = 0; $j < count($listGenreFromCreation_jeu_t); $j++) :
        $genreGenre = $listGenreFromCreation_jeu_t[$j];
        $stmtJAPG = $pdo->prepare($requeteJAPG);
        $stmtJAPG->execute(array(
            "idPC" => $lastIdPC,
            "genre" => $genreGenre
        ));
    endfor;

    //=============== Upload des images + insertion des sources dans la table a_pour_image ===============================//
    // M : Lecture de l'array reçu, upload de chaque image et enfin insertion dans la base pour chaque ligne de l'idPC et de la source
    // M : Listes avec autant de valeurs que d'image à uploader
    $listSourceNameFromCreation_jeu_t = $_FILES['source']['name'];
    $listSourceTmpNameFromCreation_jeu_t = $_FILES['source']['tmp_name'];
    $listSourceSizeFromCreation_jeu_t = $_FILES['source']['size'];

    //Pour chaque image uploadée
    for ($k = 0; $k < count($listSourceNameFromCreation_jeu_t); $k++) :
        $sourceName = $listSourceNameFromCreation_jeu_t[$k];
        $sourceTmpName = $listSourceTmpNameFromCreation_jeu_t[$k];
        $sourceSize = $listSourceSizeFromCreation_jeu_t[$k];
        $upload = uploadImage($sourceName, $sourceTmpName, $sourceSize); //upload de l'image retourne un array contenant le $message et le $nouveauNom de l'image

        if (empty($upload[1])):                         //Si l'image n'a pas été renommée, alors upload=KO donc affichage du message d'erreur
            ?>
            <em><?= $upload[0]; ?></em>
            <?php
        else :                                         //Sinon écriture en BD du nouveau nom et affichage du message de réussite
            $stmtAPI = $pdo->prepare($requeteAPI);
            $stmtAPI->execute(array(
                "idPC" => $lastIdPC,
                "source" => $upload[1]
            ));
            ?>
            <em><?= $upload[0]; ?></em>
            <p>Merci pour votre proposition du jeu <?= $valueToInsert['nom'] ?> ! Votre proposition va être soumise à validation, si elle est validée elle sera publiée.</p>
        <?php
        endif;
    endfor;

    /* M : Fermeture de la connexion
     */
    $pdo = closeConnexion();
    return $lastIdPC;
}

Function update($valuesToUpdate) {
    /* M : Ouverture de la connexion
     */
    $pdo = openConnexion();

    // M :Vérification si l'editeur existe déjà dans le dico editeur_d, 1 ligne si oui, 0 sinon
    $edi = "SELECT * FROM editeur_d WHERE editeur=:editeur;";
    $query = $pdo->prepare($edi);
    $query->execute(array('editeur' => $valuesToUpdate['editeur']));
    $count = $query->rowCount();

    //M : Requetes sur les tables jeu_t et produit_c_t 
    $requeteUpdateJeuT = "UPDATE " . TABLEJEUT . " SET nbJoueursMin=:nbJoueursMin,nbJoueursMax=:nbJoueursMax,editeur=:editeur,regles=:regles,difficulte=:difficulte,listePieces=:listePieces,dureePartie=:dureePartie WHERE idPC = :idPC;";
    $requeteUpdatePCT = "UPDATE " . TABLEPCT . " SET nom=:nom,public=:public,typePC=:typePC,anneeSortie=:anneeSortie,description=:description,valide=:valide WHERE idPC = :idPC;";

    /* M: Liste Genre : l'update n'étant pas possible sur une PK, la procédure utilisée est la suivante :
     *      Suppression des lignes associations (PK) idPC - genre pour l'idPC selectionné dans la table JAPG
     *      Insertion des nouvelles données pour l'idPC sélectionné dans la table JAPG
     */
    $requeteDeleteJAPG = "DELETE FROM " . TABLE_JEU_A_POUR_GENRE . " WHERE idPC = :idPC;";
    $stmtDeleteJAPG = $pdo->prepare($requeteDeleteJAPG);
    $stmtDeleteJAPG->bindParam(':idPC', $valuesToUpdate['idPC']);
    $stmtDeleteJAPG->execute();

    $requeteInsertJAPG = "INSERT INTO " . TABLE_JEU_A_POUR_GENRE . " (idPC, genre) VALUES (:idPC, :genre);";

    //préparation des requêtes
    $stmtJeuT = $pdo->prepare($requeteUpdateJeuT);
    $stmtPCT = $pdo->prepare($requeteUpdatePCT);

    /* M : Vérification si l'editeur existe dans le dictionnaire :
     * si non, je l'ajoute à celui ci
     */
    if ($count == 0) {
        $requeteEditeur_d = "INSERT INTO " . TABLE_EDITEUR_D . "(editeur) VALUES (:editeur);";
        $stmtEditeur_d = $pdo->prepare($requeteEditeur_d);
        $stmtEditeur_d->execute(array(":editeur" => $valuesToUpdate['editeur']));
    }

    //On execute 
    $stmtJeuT->execute(array(
        "idPC" => $valuesToUpdate['idPC'],
        "nbJoueursMin" => $valuesToUpdate['nbJoueursMin'],
        "nbJoueursMax" => $valuesToUpdate['nbJoueursMax'],
        "editeur" => $valuesToUpdate['editeur'],
        "regles" => $valuesToUpdate['regles'],
        "difficulte" => $valuesToUpdate['difficulte'],
        "listePieces" => $valuesToUpdate['listePieces'],
        "dureePartie" => $valuesToUpdate['dureePartie']
    ));

    $stmtPCT->execute(array(
        "idPC" => $valuesToUpdate['idPC'],
        "nom" => $valuesToUpdate['nom'],
        "public" => $valuesToUpdate['public'],
        "typePC" => $valuesToUpdate['typePC'],
        "anneeSortie" => $valuesToUpdate['anneeSortie'],
        "description" => $valuesToUpdate['description'],
        "valide" => $valuesToUpdate['valide']
    ));

    //================== Actualisation de la liste des genres dans la table jeu_a_pour_genre =================================//
    // M : Lecture de l'array reçu et actualisation dans la base pour chaque ligne du genre
    $listGenre_jeu_t = $valuesToUpdate['genre'];

    for ($j = 0; $j < count($listGenre_jeu_t); $j++) :
        $genreGenre = $listGenre_jeu_t[$j];
        $stmtJAPG = $pdo->prepare($requeteInsertJAPG);
        $stmtJAPG->execute(array(
            "idPC" => $valuesToUpdate['idPC'],
            "genre" => $genreGenre
        ));
    endfor;

    //=============== Upload des images + insertion des sources dans la table a_pour_image ===============================//
    // M :  Si de nouvelles images sont soumises par le modérateur, les anciennes "sources" proposées sont effacées et l'upload de(s) nouvelle(s) images est réalisé
    //      sinon ce qui était en base n'est pas modifié pour les sources et images uploadées par le membre proposant ces images.
    if (!empty($_FILES['newSource']['name'][0])):
        /* M: Liste Images : l'update n'étant pas possible sur une PK (ici source), la procédure utilisée est la suivante :
         *      Suppression des lignes associations (PK) idPC - source pour l'idPC selectionné dans la table API
         *      Insertion des nouvelles données pour l'idPC sélectionné dans la table API
         */
        $requeteDeleteAPI = "DELETE FROM " . TABLE_A_POUR_IMAGE . " WHERE idPC = :idPC;";
        $stmtDeleteAPI = $pdo->prepare($requeteDeleteAPI);
        $stmtDeleteAPI->bindParam(':idPC', $valuesToUpdate['idPC']);
        $stmtDeleteAPI->execute();

        $requeteInsertAPI = "INSERT INTO " . TABLE_A_POUR_IMAGE . " (idPC, source) VALUES (:idPC, :source);";
        // M : Listes avec autant de valeurs que d'image à uploader
        $listSourceName_jeu_t = $_FILES['newSource']['name'];
        $listSourceTmpName_jeu_t = $_FILES['newSource']['tmp_name'];
        $listSourceSize_jeu_t = $_FILES['newSource']['size'];

        //Pour chaque image uploadée
        for ($k = 0; $k < count($listSourceName_jeu_t); $k++) :
            $sourceName = $listSourceName_jeu_t[$k];
            $sourceTmpName = $listSourceTmpName_jeu_t[$k];
            $sourceSize = $listSourceSize_jeu_t[$k];
            $upload = uploadImage($sourceName, $sourceTmpName, $sourceSize); //upload de l'image retourne un array contenant le $message et le $nouveauNom de l'image

            if (empty($upload[1])):                         //Si l'image n'a pas été renommée, alors upload=KO donc affichage du message d'erreur
                ?>
                <em><?= $upload[0]; ?></em>
                <?php
            else :                                         //Sinon écriture en BD du nouveau nom et affichage du message de réussite
                $stmtAPI = $pdo->prepare($requeteInsertAPI);
                $stmtAPI->execute(array(
                    "idPC" => $valuesToUpdate['idPC'],
                    "source" => $upload[1]
                ));
                ?>
                <em><?= $upload[0]; ?></em>
                <p>Le jeu <?= $valuesToUpdate['nom'] ?> a été correctement validé (les images modifiées correctement uploadées), et est désormais publié.</p>
            <?php
            endif;
        endfor;
    else : ?>
        <p>Le jeu <?= $valuesToUpdate['nom'] ?> a été correctement validé, et est désormais publié.</p>
    <?php endif;

    /* M : Fermeture de la connexion
     */
    $pdo = closeConnexion();
}

//suppresssion d'un jeu par son idPC
Function delete($idOfLineToDelete) {
    /* M : Ouverture de la connexion
     */
    $pdo = openConnexion();


    /* M : préparation de la requete - permet d'adapter les requetes en fonctions de variables
     */
    $requeteDeleteJeuT = "DELETE FROM " . TABLEJEUT . " WHERE idPC = :idPC;";
    $requeteDeletePCT = "DELETE FROM " . TABLEPCT . " WHERE idPC = :idPC;";

    $stmtDeleteJeuT = $pdo->prepare($requeteDeleteJeuT);
    $stmtDeletePCT = $pdo->prepare($requeteDeletePCT);

    $stmtDeleteJeuT->bindParam(':idPC', $idOfLineToDelete);
    $stmtDeletePCT->bindParam(':idPC', $idOfLineToDelete);
    /* M : 
     */
    $stmtDeleteJeuT->execute();
    $stmtDeletePCT->execute();
    /* M : Fermeture de la connexion
     */
    $pdo = closeConnexion();
}
