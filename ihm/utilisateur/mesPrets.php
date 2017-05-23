<legend>Mes prêts</legend>
<?php
if (!empty($_SESSION["mesPrets"])):
    foreach ($_SESSION["mesPrets"] as $pret) :
        ?>
        <div class="blocList"> 
            Identifiant du prêt : <?= $pret->getIdPret() ?><br/>
            Jeu prêté : <?= $pret->getJeuP()->getJeuT()->getNom() ?><br/>
            Emprunteur : <?= $pret->getEmprunteur()->getPseudo() ?><br/>    
            Propriétaire : <?= $pret->getJeuP()->getProprietaire()->getPseudo() ?><br/>
            Statut : <?= $pret->getStatutDemande() ?><br/>
            Sujet notification : <?= $pret->getNotification()["sujetPreteur"] ?><br/>
            <?php
            $corpsPreteur = $pret->getNotification()["corpsPreteur"];
            $corpsPreteur = str_replace ("#nomEmprunteur#",$pret->getEmprunteur()->getPseudo(),$corpsPreteur);
            $corpsPreteur = str_replace ("#nomJeu#",$pret->getJeuP()->getJeuT()->getNom(),$corpsPreteur);
            ?>
            Corps notification : <?= $corpsPreteur ?><br/>               
        </div> 
        <?php
    endforeach;
else:
    ?>
    <tr>
        Vous n'avez aucun prêt en cours.
    </tr>
<?php
endif;
?>

