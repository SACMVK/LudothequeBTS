<?php
// M : Affichage d'un jeu_t

?>
 <?php
    if (!empty($element)):
        foreach ($element as $jeu_t) :
 ?> 
<div>
    <h1><?=  $element->getNom() ?></h1>  
    <div class="slideshowJeuT">
        <ul>
        <?php
        $carrouselDirectory = "data/images/vignettes/";
        $listeDesImages = $element->getListeImages();
        foreach ($listeDesImages as $image) :
        ?>
            <li><img src="<?= $carrouselDirectory.$image ?>"></li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>     

</br>
</br>
    <h2>Editeur : </h2>
        <p><?= $element->getEditeur() ?></p>
        </br>  
    <h2>Année de sortie : </h2>
        <p><?= $element->getAnneeSortie() ?></p>
        </br>  
    <h2>Nombre de joueurs : </h2>
        <p>De <?= $element->getNbJoueursMin() ?> à <?= $element->getNbJoueursMax() ?> joueurs</p>
        </br>
    <h2>Règles du jeu : </h2>
        <p><?= $element->getRegles() ?></p>
        </br>
    <h2>Difficulté : </h2>
        <p><?= $element->getDifficulte() ?></p>
        </br>
    <h2>Public concerné : </h2>
        <p><?= $element->getpublic() ?></p>
        </br> 
    <h2>Liste de pièces : </h2>
        <p><?= $element->getListePieces() ?></p>
        </br> 
    <h2>Durée de la partie : </h2>
        <p><?= $element->getDureePartie() ?></p>
        </br>
    <h2>Genres : </h2>
        <?php foreach ($element->getListeGenres() as $value): ?>
            <p><?= $value ?></p>
        <?php endforeach; ?>
        </br> 
    <h2>Note Moyenne (Notation sur 5): </h2>
        <?php $listeDesNotes = $element->getListeNotes();
            if (!empty($listeDesNotes)):?>
                <p><?= array_sum($listeDesNotes)/ sizeof($listeDesNotes) ?>/5 (<?= sizeof($listeDesNotes) ?> votes)</p>
        <?php else:?>  
                <p>Personne n'a encore évalué ce jeu</p>
        <?php endif ?>    
        </br>  
    
        </br>
<?php
  
endforeach;
endif;
?>
<form action=" " method="post" accept-charset="utf-8" class="form" role="form">
    <input type=hidden name="nom" value="<?=$element->getNom() ?>" />
    <input type='hidden' name='page' value='recherche/jeu_p.php' />
    <input type="submit" name="submit" class="boutonBleu" value="Recherche un exemplaire de ce jeu">
</form>