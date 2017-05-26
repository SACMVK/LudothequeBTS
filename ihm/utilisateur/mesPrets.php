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
            $corpsPreteur = str_replace("#nomEmprunteur#", $pret->getEmprunteur()->getPseudo(), $corpsPreteur);
            $corpsPreteur = str_replace("#nomJeu#", $pret->getJeuP()->getJeuT()->getNom(), $corpsPreteur);
            $corpsPreteur = str_replace("#propositionEmprunteurDateDebut#", screenDate($pret->getPropositionEmprunteurDateDebut()), $corpsPreteur);
            $corpsPreteur = str_replace("#propositionEmprunteurDateFin#", screenDate($pret->getPropositionEmprunteurDateFin()), $corpsPreteur);
            if ($pret->getPropositionPreteurDateDebut() != null) {
                $corpsPreteur = str_replace("#propositionPreteurDateDebut#", screenDate($pret->getPropositionPreteurDateDebut()), $corpsPreteur);
            }
            if ($pret->getPropositionPreteurDateFin() != null) {
                $corpsPreteur = str_replace("#propositionPreteurDateFin#", screenDate($pret->getPropositionPreteurDateFin()), $corpsPreteur);
            }
            if ($pret->getExpedition() != null) {
                if ($pret->getExpedition()->getEnvoiDateEnvoi() != null) {
                    $corpsPreteur = str_replace("#envoiDateEnvoi#", screenDate($pret->getExpedition()->getEnvoiDateEnvoi()), $corpsPreteur);
                }
                if ($pret->getExpedition()->getEnvoiDateReception() != null) {
                    $corpsPreteur = str_replace("#envoiDateReception#", screenDate($pret->getExpedition()->getEnvoiDateReception()), $corpsPreteur);
                }
                if ($pret->getExpedition()->getRetourDateEnvoi() != null) {
                    $corpsPreteur = str_replace("#retourDateEnvoi#", screenDate($pret->getExpedition()->getRetourDateEnvoi()), $corpsPreteur);
                }
                if ($pret->getExpedition()->getRetourDateReception() != null) {
                    $corpsPreteur = str_replace("#retourDateReception#", screenDate($pret->getExpedition()->getRetourDateReception()), $corpsPreteur);
                }
            }
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

