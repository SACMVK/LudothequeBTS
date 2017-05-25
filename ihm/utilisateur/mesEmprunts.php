<legend>Mes emprunts</legend>
<?php
if (!empty($_SESSION["mesEmprunts"])):
    foreach ($_SESSION["mesEmprunts"] as $emprunt) :
        ?>
        <div class="blocList"> 
            Identifiant du prêt: <?= $emprunt->getIdPret() ?><br/>
            Jeu emprunté : <?= $emprunt->getJeuP()->getJeuT()->getNom() ?><br/>
            Emprunteur : <?= $emprunt->getEmprunteur()->getPseudo() ?><br/>    
            Propriétaire : <?= $emprunt->getJeuP()->getProprietaire()->getPseudo() ?><br/>
            Statut : <?= $emprunt->getStatutDemande() ?><br/>
            Sujet notification : <?= $emprunt->getNotification()["sujetEmprunteur"] ?><br/>
            <?php
            $corpsEmprunteur = $emprunt->getNotification()["corpsEmprunteur"];
            $corpsEmprunteur = str_replace ("#nomPreteur#",$emprunt->getJeuP()->getProprietaire()->getPseudo(),$corpsEmprunteur);
            $corpsEmprunteur = str_replace ("#nomJeu#",$emprunt->getJeuP()->getJeuT()->getNom(),$corpsEmprunteur);
            $corpsEmprunteur = str_replace ("#propositionEmprunteurDateDebut#",$emprunt->getPropositionEmprunteurDateDebut(),$corpsEmprunteur);
            $corpsEmprunteur = str_replace ("#propositionEmprunteurDateFin#",$emprunt->getPropositionEmprunteurDateFin(),$corpsEmprunteur);
            $corpsEmprunteur = str_replace ("#propositionPreteurDateDebut#",$emprunt->getPropositionPreteurDateDebut(),$corpsEmprunteur);
            $corpsEmprunteur = str_replace ("#propositionPreteurDateFin#",$emprunt->getPropositionPreteurDateFin(),$corpsEmprunteur);
            ?>
            Corps notification : <?= $corpsEmprunteur ?><br/>
        </div> 
        <?php
    endforeach;
else:
    ?>
    <tr>
        Vous n'avez aucun emprunt en cours. 
    </tr>
<?php
endif;
?>
