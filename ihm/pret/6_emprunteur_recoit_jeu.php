<div class="blocList">
    <form action=" " method="post" accept-charset="utf-8">
        Vous confirmez à <b><?= $pret->getJeuP()->getProprietaire()->getPseudo() ?></b> 
        que vous avez bien reçu son jeu <b><?= $pret->getJeuP()->getJeuT()->getNom() ?></b> 
        le : <input type="date"  name="envoiDateReception">
        <br />
        <br />
        État du jeu reçu : 
        <select name="envoiEtatJeu">
            <?php selectDico("etat_d", "etat") ?>
        </select>
        <br />
        <br />
        Pièce(s) manquante(s) :
        <input type="checkbox" name="envoiPiecesManquantes" />
        <br />
        <br />
        Message à destination du prêteur :
        <br />
        <br />
        <textarea name="message"></textarea>
        <br />
        <br />
        <input type=hidden name="pret" value=6 />
        <input type=hidden name="idPret" value="<?=$pret->getIdPret() ?>" />
        <input class="boutonGris" name="confirmer" type="submit" value="Confirmer la réception"/>
    </form>
</div>