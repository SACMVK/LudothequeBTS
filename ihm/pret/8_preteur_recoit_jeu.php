<div class="blocList">
    <form action=" " method="post" accept-charset="utf-8">
        Vous confirmez à <b><?= $pret->getEmprunteur()->getPseudo() ?></b> 
        que vous avez bien reçu votre jeu <b><?= $pret->getJeuP()->getJeuT()->getNom() ?></b> 
        le : <input type="date"  name="retourDateReception">
        <br />
        <br />               
        État du jeu reçu : 
        <select name="retourEtatJeu">
            <?php selectDico("etat_d", "etat") ?>
        </select>
        <br />
        <br />   
        Pièce(s) manquante(s) :
        <input type="checkbox" name="retourPiecesManquantes" />
        <br />
        <br />
        Message à destination de l'emprunteur :
        <br />
        <br />
        <textarea name="message"></textarea>
        <br />
        <br />
        <input type=hidden name="pret" value=8 />
        <input type=hidden name="idPret" value="<?=$pret->getIdPret() ?>" />
        <input class="boutonGris" name="confirmer" type="submit" value="Confirmer la réception"/>

    </form>
</div>