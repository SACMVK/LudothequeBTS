<?php $pret = $element; ?>
<div class="blocList">
    Identifiant du prêt: <?= $pret->getIdPret() ?><br/>
    Statut : <?= $pret->getStatutDemande() ?><br/>
    Jeu emprunté : <?= $pret->getExemplaire()->getJeu()->getNom() ?><br/>
    <!--Ajout du carrousel-->
    <div class="slideshowjeu">
        <ul>
            <?php
            $carrouselDirectory = "data/images/vignettes/";
            $listeDesImages = $pret->getExemplaire()->getJeu()->getListeImages();
            foreach ($listeDesImages as $image) :
                ?>
                <li><img src="<?= $carrouselDirectory . $image ?>"></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!--Ajout des identifiants de l'interlocuteur et de la notification en cours-->
    <?php if ($_SESSION["monProfil"]->getIdUser() == $pret->getExemplaire()->getProprietaire()->getIdUser()): ?>
        Emprunteur : <?= $pret->getEmprunteur()->getPseudo() ?><br/>
        <?php $profil = "Preteur"; ?>
    <?php else: ?>
        Propriétaire : <?= $pret->getExemplaire()->getProprietaire()->getPseudo() ?><br/>
        <?php $profil = "Emprunteur"; ?>
    <?php endif; ?>
    <!--Ajout de la notification en cours-->
    Sujet notification : <?= $pret->getNotification()["sujet" . $profil] ?><br/>
    <?php
    $notification = $pret->getNotification()["corps" . $profil];
    if ($profil == "Preteur") {
        $notification = str_replace("#nomEmprunteur#", $pret->getEmprunteur()->getPseudo(), $notification);
    } else {
        $notification = str_replace("#nomPreteur#", $pret->getExemplaire()->getProprietaire()->getPseudo(), $notification);
    }
    $notification = str_replace("#nomJeu#", $pret->getExemplaire()->getJeu()->getNom(), $notification);
    $notification = str_replace("#propositionEmprunteurDateDebut#", screenDate($pret->getPropositionEmprunteurDateDebut()), $notification);
    $notification = str_replace("#propositionEmprunteurDateFin#", screenDate($pret->getPropositionEmprunteurDateFin()), $notification);
    if ($pret->getPropositionPreteurDateDebut() != null) {
        $notification = str_replace("#propositionPreteurDateDebut#", screenDate($pret->getPropositionPreteurDateDebut()), $notification);
    }
    if ($pret->getPropositionPreteurDateFin() != null) {
        $notification = str_replace("#propositionPreteurDateFin#", screenDate($pret->getPropositionPreteurDateFin()), $notification);
    }
    if ($pret->getExpedition() != null) {
        if ($pret->getExpedition()->getEnvoiDateEnvoi() != null) {
            $notification = str_replace("#envoiDateEnvoi#", screenDate($pret->getExpedition()->getEnvoiDateEnvoi()), $notification);
        }
        if ($pret->getExpedition()->getEnvoiDateReception() != null) {
            $notification = str_replace("#envoiDateReception#", screenDate($pret->getExpedition()->getEnvoiDateReception()), $notification);
        }
        if ($pret->getExpedition()->getRetourDateEnvoi() != null) {
            $notification = str_replace("#retourDateEnvoi#", screenDate($pret->getExpedition()->getRetourDateEnvoi()), $notification);
        }
        if ($pret->getExpedition()->getRetourDateReception() != null) {
            $notification = str_replace("#retourDateReception#", screenDate($pret->getExpedition()->getRetourDateReception()), $notification);
        }
    }
    ?>
    Notification : <?= $notification ?><br/>
    <!--Ajout des messages-->
    <?php foreach ($pret->getListeMessages() as $element) : ?>
    <?php include 'ihm/resultat/message.php';?>
    <?php endforeach; ?>
</div>