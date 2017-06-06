<div class="blocList">
    <span id="reservedDates" data-reservedDates="<?= getDatesReservation($exemplaire) ?>"></span>
    <form action="" method="post" accept-charset="utf-8">
        Envoyer une demande de prêt à <b><?= $exemplaire->getProprietaire()->getPseudo() ?></b>
        de son jeu <b><?= $exemplaire->getJeu()->getNom() ?></b>
        <br />
        <br />
        du <input type="text" id="propositionEmprunteurDateDebut" name="propositionEmprunteurDateDebut" onclick="new calendar(this);">
        au <input type="text" id="propositionEmprunteurDateFin" name="propositionEmprunteurDateFin" onclick="new calendar(this);">
        <br />
        <br />
        Message à destination du prêteur :
        <br />
        <br />
        <textarea name="message"></textarea>
        <br />
        <br />
        <input type=hidden name="pret" value=1 />
        <input type=hidden name="idExemplaire" value="<?=$exemplaire->getIdexemplaire() ?>" />
        <input type=hidden name="idEmprunteur" value="<?=$_SESSION["monProfil"]->getIdUser() ?>" />
        <input class="boutonGris" type="submit" name="envoyer" value="Envoyer la demande" />	
    </form>
</div>