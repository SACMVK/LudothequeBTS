<?php
// M : Affichage d'un jeu_t
?>
 <?php
    if (!empty($element)):
        foreach ($element as $jeu_t) :
 ?> 
<div><h1><?=  $element->getNom() ?></h1></div>     

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
        <p><?= $element->getListeGenres() ?></p>
        </br> 
    
        </br>
<?php
  
endforeach;
endif;
?>