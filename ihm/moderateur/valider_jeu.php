<form action="" method="post" accept-charset="utf-8" class="form"  enctype="multipart/form-data">   

    <legend>Proposition de jeu à verifier</legend>
    Type de produit culturel :

    <input type="text" list="typePCdata" name="typePC" value="<?= $jeuAModifier->getTypePC() ?>" required>
    <datalist id="typePCdata">
        <?php selectDico("type_p_c_d", "typePC", ""); ?>
    </datalist><br/><br/>

    Nom :
    <input type="text" name="nom" class="form-control input-lg" value="<?= $jeuAModifier->getNom() ?>" placeholder="Nom" required/>

    Année de sortie :
    <input type="number" step="1" name="anneeSortie" min="1900" max="2100" class="form-control input-lg" value="<?= $jeuAModifier->getAnneeSortie() ?>" placeholder="2000" required/>

    Description du jeu :
    <input type="text" name="description" class="form-control input-lg"  value="<?= $jeuAModifier->getDescription() ?>" placeholder="Jeu rigolo à faire en famille ..." required/>

    Nombre de joueurs au minimum :
    <input type="number" name="nbJoueursMin" min="1" class="form-control input-lg"  value="<?= $jeuAModifier->getNbJoueursMin() ?>" placeholder="1" required/>

    Nombre de joueurs au minimum :
    <input type="number" name="nbJoueursMax" min="1" class="form-control input-lg"  value="<?= $jeuAModifier->getNbJoueursMax() ?>" placeholder="4" required/> <!-- Vérifier si possible incrément au min à la valeur de nbJoueursMin pour ne pas avoir un max inférieur a u min -->

    <!-- Pour l'editeur donne la possibilité d'écrire un nom d'éditeur si n'apparait pas dans la liste ou de le selectionner directement -->
    Editeur :
    <input type="text" list="editeurdata" name="editeur" value="<?= $jeuAModifier->getEditeur() ?>" required>
    <datalist id="editeurdata">
        <?php selectDico("editeur_d", "editeur"); ?>
    </datalist><br/><br/>

    Règles du jeu :
    <input type="text" name="regles" class="form-control input-lg"  value="<?= $jeuAModifier->getRegles() ?>" placeholder="Le but du jeu est de se débarrasser de toutes ses cartes..." required/>

    Difficulté :
    <select type="select" multiple size="3" class="form-control select-lg" name="difficulte" required>
        <?php
        $difProposee = $jeuAModifier->getDifficulte();
        $pdoDif = openConnexion();
        $reponseDif = "SELECT * FROM difficulte_d;";
        $stmtDif = $pdoDif->prepare($reponseDif);
        $stmtDif->execute();
        $listeDif = array();
        while ($donnees = $stmtDif->fetch(PDO::FETCH_ASSOC)) {
            $listeDif[] = $donnees['difficulte'];
        }
        ksort($listeDif);
        for ($i = 0; $i < count($listeDif); $i++) :
            if ($difProposee == $listeDif[$i]) {
                ?>
                <option value="<?= $difProposee; ?>" selected><?= $difProposee; ?></option>
            <?php } else {
                ?>
                <option value="<?= $listeDif[$i]; ?>" ><?= $listeDif[$i]; ?></option>            
                <?php
            }
        endfor;
        ?>
    </select>

    Public :
    <select type="select" multiple size="3" class="form-control select-lg" name="public" required>
        <?php
        $publicProposee = $jeuAModifier->getPublic();
        $pdoPublic = openConnexion();
        $reponsePublic = "SELECT * FROM public_d;";
        $stmtPublic = $pdoPublic->prepare($reponsePublic);
        $stmtPublic->execute();
        $listePublic = array();
        while ($donnees = $stmtPublic->fetch(PDO::FETCH_ASSOC)) {
            $listePublic[] = $donnees['public'];
        }
        ksort($listePublic);
        for ($i = 0; $i < count($listePublic); $i++) :
            if ($publicProposee == $listePublic[$i]) {
                ?>
                <option value="<?= $publicProposee; ?>" selected><?= $publicProposee; ?></option>
            <?php } else {
                ?>
                <option value="<?= $listePublic[$i]; ?>" ><?= $listePublic[$i]; ?></option>            
                <?php
            }
        endfor;
        ?>
    </select>

    Liste des pièces du jeu :
    <input type="text" name="listePieces" class="form-control input-lg"  value="<?= $jeuAModifier->getListePieces() ?>" placeholder="un jeu de 52 cartes et un sablier ..." required/>

    Durée de la partie :
    <input type="text" list="dureePartie" name="dureePartie" value="<?= $jeuAModifier->getDureePartie() ?>" placeholder="ex : 15 minutes, 2 heures , 2 jours" required>
    <datalist id="dureePartie">
        <?php selectDico("jeu", "dureePartie"); ?>
    </datalist><br/><br/>

    Genre de jeu (choix multiple possible avec Ctrl+select):
    <select type="select" multiple size="4" class="form-control select-lg" name="genre[]" required>
        <?php
        // Préparation de la liste des genres (ex : "jeux plateau or jeux Pions")
        $listeGenres = $jeuAModifier->getListeGenres();
//        $tailleListeGenre = count($listeGenres);
//        $genreOu = $listeGenres[0]. "==$liste[$i]";
//        $dernierGenre = $listeGenres[$tailleListeGenre];
//        for ($index = 1; $index < ($tailleListeGenre-1); $index++) {
//            $genreOu = $genreOu. "||" .$listeGenres[$index]. "== $liste[$i]";
//        }
//        $genreComp =  $genreOu. "==$liste[$i] ||" .$dernierGenre. "==$liste[$i]";
        // Récupération de la liste des genres du dico genre et comparaison avec les genres sélectionnés
        $pdo = openConnexion();
        $reponse = "SELECT * FROM genre;";
        $stmt = $pdo->prepare($reponse);
        $stmt->execute();
        $liste = array();
        while ($donnees = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $liste[] = $donnees['genre'];
        }
        ksort($liste);
        for ($i = 0; $i < count($liste); $i++) :
            foreach ($listeGenres as $genre) :
                if ($genre == $liste[$i]) {
                    ?>
                    <option value="<?= $genre; ?>" selected><?= $genre; ?></option>
                <?php } else {
                    ?>
                    <option value="<?= $liste[$i]; ?>" ><?= $liste[$i]; ?></option>            
                    <?php
                }
            endforeach;
        endfor;
        ?>
    </select>

    Image(s) proposée(s) :
    <div class = "slideshowjeu">
        <ul>
            <?php
            $carrouselDirectory = "data/images/vignettes/";
            $listeDesImages = $jeuAModifier->getListeImages();
            foreach ($listeDesImages as $image) :
                ?>
                <li><img src="<?= $carrouselDirectory . $image ?>"></li>
            <?php endforeach; ?>
        </ul>
    </div>
    Modifier les images :
    <input type="file" multiple class="form-control" name="newSource[]" accept="image/*,application/pdf">

    <input type=hidden name="idPC" value="<?= $jeuAModifier->getIdPC() ?>" />
    <input name="moderateur" type="hidden" value="voir_liste_jeux_non_valides"/>
    <input class="boutonGris" name="valider" type="submit" value="Accepter"/>
    <input class="boutonGris" name="supprimer" type="submit" value="Refuser" />
</form>

