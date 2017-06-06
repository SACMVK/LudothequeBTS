<?php

// M : Fonction qui permet de n'afficher que les $length premiers caractères
function str_truncate($text, $length) {
    if (strlen($text) <= $length)
        return $text;
    return trim(substr($text, 0, $length));
}

// M : Affihage de la liste des jeu
?>

<?php
if (!empty($listOfElements)):
    foreach ($listOfElements as $jeu) :
        ?> 
        <div class="blocList">

            <h1><?= $jeu->getNom() ?></h1>
            <p><strong>Nombre de joueurs :</strong> De <?= $jeu->getNbJoueursMin() ?> à <?= $jeu->getNbJoueursMax() ?></p>
            <p><strong>Editeur :</strong> <?= $jeu->getEditeur() ?></p>
            <p><strong>Règles :</strong> <?= str_truncate($jeu->getRegles(), 100) ?> ...</p>

            <br/>
            <p><strong>Difficulté :</strong> <?= $jeu->getDifficulte() ?></p>
            <p><strong>Public :</strong> <?= $jeu->getpublic() ?></p>
            <p><strong>Liste des pièces : </strong><?= $jeu->getListePieces() ?></p>

            <br/>
            <p><strong>Durée de la partie :</strong> <?= $jeu->getDureePartie() ?></p>
            <p><strong>Année de sortie :</strong> <?= $jeu->getAnneeSortie() ?></p>
            <p><strong>Description :</strong> <?= str_truncate($jeu->getDescription(), 100) ?> ...</p>

            <form action="" method="post" accept-charset="utf-8" class="form" >
                <input type=hidden name="nom" value="<?= $jeu->getNom() ?>" />  <!--<input type=hidden name="idPC" value="<?= $jeu->getIdPC() ?>" />A reprendre car ne transmet pas la bonne ligne selectionnée par le bouton -->
                <input type=hidden name="objectToWorkWith" value="Jeu" />
                <input type=hidden name="actionToDoWithObject" value="selectOne" />
                <input type="image" name="submit" title="Fiche complète" class="boutonTransparent" value="Voir la fiche complète" src="ihm/img/loupe.png">
            </form>
        </div>

        <?php
    endforeach;

else:
    ?>
    <div>
        <h1>Aucun résultat</h1>
    </div>
<?php
endif;
?>


