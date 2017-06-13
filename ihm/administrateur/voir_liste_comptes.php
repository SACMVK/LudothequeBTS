Il y a <?= count($listeComptes) ?> utilisateurs enregistrés.

<?php foreach ($listeComptes as $compte) : ?>
    <div class="blocList" >
        <?= $compte->getPseudo() ?>
        <form action="" method="post" accept-charset="utf-8" class="form" >
            <input type=hidden name="Compte#idUser" value="<?= $compte->getIdUser() ?>" />
            <input type=hidden name="objectToWorkWith" value="Individu" />
            <input type=hidden name="actionToDoWithObject" value="selectOne" />
            <input type="Submit" name="submit" class="boutonBlanc" value="Voir la fiche" />
        </form>
        <form action="" method="post" accept-charset="utf-8" class="form" >
            <select name="droit">
                <?php foreach ($listeDroits as $droit) : ?>
                    <?php
                    $selected = "";
                    if ($droit == $compte->getDroit()) {
                        $selected = "selected";
                    }
                    ?>
                    <option <?= $selected ?> value="<?= $droit ?>"><?= $droit ?></option>
                <?php endforeach; ?>
            </select>
            <input type=hidden name="idUser" value="<?= $compte->getIdUser() ?>" />
            <input type=hidden name="objectToWorkWith" value="Individu" />
            <input type=hidden name="actionToDoWithObject" value="update" />
            <input type="image" name="submit" title="Fiche complète" class="boutonBlanc" value="Modifier les droits" />
        </form>
        <form action="" method="post" accept-charset="utf-8" class="form" >
            <input type=hidden name="idUser" value="<?= $compte->getIdUser() ?>" />
            <input type=hidden name="objectToWorkWith" value="Individu" />
            <input type=hidden name="actionToDoWithObject" value="delete" />
            <input type="Submit" name="submit" class="boutonBlanc" value="Supprimer cet utilisateur" />
        </form>
    </div>
<?php endforeach; ?>


