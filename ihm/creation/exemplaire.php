<form action="" method="post" accept-charset="utf-8" class="form" >   
    <legend>Ajouter un jeu à ma ludothèque</legend>
    Nom du jeu :
    <select name="idPC" class="form-control input-lg">
        <?php selectDico("produit_culturel", "nom", "idPC"); ?>
    </select>

    Etat du jeu (en cours de développement):
    <select name="retourEtatJeu" class="form-control input-lg">
        <?php selectDico("etat_d", "etat"); ?>
    </select>

    Y a-t-il des pièces manquantes (en cours de développement)?
    <input type="checkbox" name="retourPiecesManquantes" class="form-control input-group-sm" />

    <br/>
    <input type=hidden name="idProprietaire" value="<?= $_SESSION["monProfil"]->getIdUser(); ?>" />

    <input type=hidden name="objectToWorkWith" value="Exemplaire" />
    <input type=hidden name="actionToDoWithObject" value="insert" />

    <button type="submit" name="submit" class="boutonBleu">Ajouter ce jeu</button>
    <button type="reset" name="reset" class="boutonBleu">Réinitialiser</button>

</form>          




