<div class="blocList">
    <form action=" " method="post" accept-charset="utf-8">
        Vous souhaitez proposer de nouvelles dates d'emprunt de votre jeu 
        <b><?= $pret->getJeuP()->getJeuT()->getNom() ?></b>
        à <b><?= $pret->getEmprunteur()->getPseudo() ?></b>.
        <br />
        Les dates initiales étaient du <?= screenDate($pret->getPropositionEmprunteurDateDebut()) ?> 
        au <?= screenDate($pret->getPropositionEmprunteurDateFin()) ?>.
        <br />
        <br />
        Du <input type="date"  name="propositionPreteurDateDebut">
        au <input type="date"  name="propositionPreteurDateFin">
        <br />
        <br />
        Message à destination de l'emprunteur :
        <br />
        <br />
        <textarea name="message"></textarea>
        <br />
        <br />
        <input type=hidden name="pret" value="pret" />
        <input type=hidden name="formulairePret" value="3" />
        <input type=hidden name="idPret" value="<?=$pret->getIdPret() ?>" />
        <input class="boutonGris" name="envoyer" type="submit" value="Envoyer les nouvelles dates">
    </form>
</div>