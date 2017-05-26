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
            $corpsEmprunteur = str_replace("#nomPreteur#", $emprunt->getJeuP()->getProprietaire()->getPseudo(), $corpsEmprunteur);
            $corpsEmprunteur = str_replace("#nomJeu#", $emprunt->getJeuP()->getJeuT()->getNom(), $corpsEmprunteur);
            $corpsEmprunteur = str_replace("#propositionEmprunteurDateDebut#", screenDate($emprunt->getPropositionEmprunteurDateDebut()), $corpsEmprunteur);
            $corpsEmprunteur = str_replace("#propositionEmprunteurDateFin#", screenDate($emprunt->getPropositionEmprunteurDateFin()), $corpsEmprunteur);
            if ($emprunt->getPropositionPreteurDateDebut() != null) {
                $corpsEmprunteur = str_replace("#propositionPreteurDateDebut#", screenDate($emprunt->getPropositionPreteurDateDebut()), $corpsEmprunteur);
            }
            if ($emprunt->getPropositionPreteurDateFin() != null) {
                $corpsEmprunteur = str_replace("#propositionPreteurDateFin#", screenDate($emprunt->getPropositionPreteurDateFin()), $corpsEmprunteur);
            }
            if ($emprunt->getExpedition() != null) {
                if ($emprunt->getExpedition()->getEnvoiDateEnvoi() != null) {
                    $corpsEmprunteur = str_replace("#envoiDateEnvoi#", screenDate($emprunt->getExpedition()->getEnvoiDateEnvoi()), $corpsEmprunteur);
                }
                if ($emprunt->getExpedition()->getEnvoiDateReception() != null) {
                    $corpsEmprunteur = str_replace("#envoiDateReception#", screenDate($emprunt->getExpedition()->getEnvoiDateReception()), $corpsEmprunteur);
                }
                if ($emprunt->getExpedition()->getRetourDateEnvoi() != null) {
                    $corpsEmprunteur = str_replace("#retourDateEnvoi#", screenDate($emprunt->getExpedition()->getRetourDateEnvoi()), $corpsEmprunteur);
                }
                if ($emprunt->getExpedition()->getRetourDateReception() != null) {
                    $corpsEmprunteur = str_replace("#retourDateReception#", screenDate($emprunt->getExpedition()->getRetourDateReception()), $corpsEmprunteur);
                }
            }
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
