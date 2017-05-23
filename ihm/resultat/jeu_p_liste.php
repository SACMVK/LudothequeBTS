
<table>

    <tr>
        <th>Nom du jeu</th>
        <th>Propriétaire</th>
        <th>Code postal</th>

    </tr>
    <?php
    if (!empty($listOfElements)):
        foreach ($listOfElements as $jeu_p) :
            ?>        
            <tr>
                <td><?= $jeu_p->getJeuT()->getNom() ?></td>
                <td><?= $jeu_p->getProprietaire()->getPseudo() ?></td>
                <td><?= $jeu_p->getProprietaire()->getCodePostal() ?></td>

                <td>
                    
                    <form action=" " method="post" accept-charset="utf-8" class="form" role="form">
                        <input type=hidden name="idJeuP" value="<?= $jeu_p->getIdJeuP() ?>" />
                        <input type=hidden name="objectToWorkWith" value="jeu_p" />
                        <input type=hidden name="actionToDoWithObject" value="selectOne" />
                        <input type="image" name="submit" class="boutonTransparent" value="Voir la fiche complète" src="ihm/img/loupe.png">
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



