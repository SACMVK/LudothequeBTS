<div class="blocList">
    <form action=" " method="post" accept-charset="utf-8">
        Envoyer une demande de prêt à <b><?= $jeuP->getProprietaire()->getPseudo() ?></b>
        de son jeu <b><?= $jeuP->getJeuT()->getNom() ?></b>
        <br />
        <br />
        du <input type="date"  name="propositionEmprunteurDateDebut">
        au <input type="date"  name="propositionEmprunteurDateFin">
        <br />
        <br />
        Message à destination du prêteur :
        <br />
        <br />
        <textarea name="message"></textarea>
        <br />
        <br />
        <input type=hidden name="pret" value="pret" />
        <input type=hidden name="formulairePret" value="1" />
        <input type=hidden name="idJeuP" value="<?=$jeuP->getIdJeuP() ?>" />
        <input type=hidden name="idEmprunteur" value="<?=$_SESSION["monProfil"]->getIdUser() ?>" />
        <input class="boutonGris" type="submit" name="envoyer" value="Envoyer la demande" />	
    </form>
</div>