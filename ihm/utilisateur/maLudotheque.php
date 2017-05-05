<legend>Ma ludothèque</legend>
<table border= 1px solid black>
    <?php
    if (!empty($_SESSION["maLudotheque"])):
        foreach ($_SESSION["maLudotheque"] as $jeuP) :
            ?>
            <tr> 
                <td id="table-recherche"><?= $jeuP->getIdJeuP() ?></td>
                <td id="table-recherche"><?= $jeuP->getJeuT()->getNom() ?></td>
                <td id="table-recherche"><?= $jeuP->getJeuT()->getEditeur() ?></td>
                <td id="table-recherche"><?= $jeuP->getProprietaire()->getPseudo() ?></td>
                <td id="table-recherche">
                    <form action=" " method="post" accept-charset="utf-8">
                        <input type=hidden name="objectToWorkWith" value="Jeu_P" />
                        <input type=hidden name="actionToDoWithObject" value="delete" />
                        <input type="hidden" name="idJeuP" value="<?= $jeuP->getIdJeuP() ?>" />
                        <button type="submit" name="submit" class="boutonBleu">Supprimer ce jeu de ma ludothèque</button>
                    </form>
                </td>
            </tr> 
            <?php
        endforeach;
    else:
        ?>
        <tr>
            <td>Aucun résultat</td>
        </tr>
    <?php
    endif;
    ?>
</table>
<a href='index.php?page=creation/jeu_p.php'><button class="boutonBleu">Ajouter un jeu à ma ludothèque</button></a>


