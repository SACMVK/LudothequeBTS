<?php




function select($requete) {
    

    //AhMaD:ouvrire la connexion avec BD
    $db = openConnexion();


    $requete = "SELECT * FROM pret_p "
            . " JOIN compte as compteEmprunteur ON compteEmprunteur.idUser = pret_p.idEmprunteur "
            . " JOIN individu as individuEmprunteur ON individuEmprunteur.idUser = pret_p.idEmprunteur "
            . " JOIN jeu_p ON jeu_p.idJeuP = pret_p.idJeuP "
            . " JOIN produit_culturel_t ON jeu_p.idPC = produit_culturel_t.idPC "
            . " JOIN jeu_t ON jeu_t.idPC = produit_culturel_t.idPC "
            . $requete . ";";

        $requete = "SELECT * FROM " . TABLE_INDIVIDU
            . " JOIN " . TABLE_COMPTE . " ON " . TABLE_INDIVIDU . ".idUser = " . TABLE_COMPTE . ".idUser "
            . " JOIN " . TABLE_JEU_P . " ON " . TABLE_JEU_P . ".idProprietaire = " . TABLE_COMPTE . ".idUser "
            . " JOIN " . TABLE_PCT . " ON " . TABLE_JEU_P . ".idPC = " . TABLE_PCT . ".idPC "
            . " JOIN " . TABLE_JEUT . " ON " . TABLE_JEUT . ".idPC = " . TABLE_PCT . ".idPC ";

    $stmt = $db->prepare($requete);

    $stmt->execute();

     $pret_list = array();


    while ($champ = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
            
            $listeGenres = array();
            $listeImages = array();
            $listeCommentaires = array();
            $noteMoyenne = 5;

  
        $jeuT = new Jeu_T($nbJoueursMin,$nbJoueursMax,$nom,$editeur,$regles,$difficulte,$public,$listePieces,$dureePartie,$anneeSortie,$description,$typePC,$listeGenres,$noteMoyenne,$listeImages,$listeCommentaires,$idPC);

        $idJeuP = $champ['idJeuP'];
        
         $pret_list[] = new Jeu_P($proprietaire, $jeuT, $idJeuP);
    }

    $db = closeConnexion();


    return  $pret_list;
}

function insert($requete) {
    
}

function update($requete) {
    
}

function delete($id) {
    
}

