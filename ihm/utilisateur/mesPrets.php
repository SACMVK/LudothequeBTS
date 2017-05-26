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
            id notification : <?= $pret->getidNotification() ?><br/>
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
            <?php
            $nomBouton = "";
            $renvoiFormulaire = "";
            switch ($pret->getIdNotification()) {
                case "1":
                    $nomBouton = "Répondre à la demande d'emprunt";
                    $renvoiFormulaire = "pret/2_reponse_emprunt.php";
                    break;
                case "4":
                    $nomBouton = "Répondre à une proposition de nouvelles dates";
                    $renvoiFormulaire = "pret/4_reponse_nouvelles_dates.php";
                    break;
                case "2":
                case "6":
                    $nomBouton = "Confirmer envoi";
                    $renvoiFormulaire = "pret/5_preteur_envoit_jeu.php";
                    break;
                case "6":
                    $nomBouton = "Confirmer réception";
                    $renvoiFormulaire = "pret/6_emprunteur_recoit_jeu.php";
                    break;
                case "7":
                    $nomBouton = "Confirmer envoi";
                    $renvoiFormulaire = "pret/7_emprunt_renvoit_jeu.php";
                    break;
                case "8":
                    $nomBouton = "Confirmer réception";
                    $renvoiFormulaire = "pret/8_preteur_recoit_jeu.php";
                    break;
            }
            ?>
            <?php
            if ($pret->getIdNotification() != "3" && $pret->getIdNotification() != "5" && $pret->getIdNotification() != "9" && $pret->getIdNotification() != "10"):
                ?>
                <form action=" " method="post" accept-charset="utf-8" class="form" role="form">
                    <input type=hidden name="idPret" value="<?= $pret->getIdPret() ?>" />
                    <input type=hidden name="page" value="<?= $renvoiFormulaire ?>" />
                    <input type="submit" name="submit" class="boutonGris" value="<?= $nomBouton ?>">
                </form>
            <?php endif; ?>
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

