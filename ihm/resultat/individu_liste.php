
    <?php
    if (!empty($listOfElements)):
        foreach ($listOfElements as $individu) :
            ?> 
<div class="blocList">

                <h1><?= $individu->getPseudo() ?></h1>
                <p><strong>Nom :</strong> De <?= $individu->getNom() ?></p>
                <p><strong>Prénom :</strong> <?= $individu->getPrenom()?></p>
                 <p><strong>Date d'inscription  :</strong> <?= $individu->getDateInscription() ?></p>
                 <p><strong>Droit  :</strong> <?= $individu->getDroit()?></p>
                <p><strong>Ville :</strong> <?= $individu->getVille() ?></p>
                <p><strong>Département :</strong> <?= $individu->getDept() ?></p>
   
        
                <form action=" " method="post" accept-charset="utf-8" class="form" role="form">
                    <input type=hidden name="email" value="<?= $individu->getEmail() ?>" />
                    <input type=hidden name="objectToWorkWith" value="individu" />
                    <input type=hidden name="actionToDoWithObject" value="selectOne" />
                   <input type="image" name="submit" title="Fiche complète" class="boutonTransparent" value="Voir la" src="ihm/img/loupe.png">
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

          <a href="index.php?page=recherche/individu.php" class="boutonBlanc">Modifier ma recherche</a>
