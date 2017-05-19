<?php

// M : Fonction qui permet de n'afficher que les $length premiers caractères
function str_truncate($text, $length) {
    if (strlen($text) <= $length)
        return $text;
    return trim(substr($text, 0, $length));
}

// M : Affihage de la liste des jeu_t
?>

<table>
    <tr>
        <th>Nombre de joueurs</th>
        <th>Editeur</th>
        <th>Règles</th>
        <th>Difficulté</th>
        <th>Public</th>
        <th>Liste des pièces</th>
        <th>Durée de la partie</th>
        <th>Année de sortie</th>
        <th>Description</th>
    </tr>
    <?php
    if (!empty($listOfElements)):
        foreach ($listOfElements as $jeu_t) :
            ?>        
            <tr>
                <td><?= $jeu_t->getNbJoueursMin() ?> à <?= $jeu_t->getNbJoueursMax() ?></td>
                <td><?= $jeu_t->getEditeur() ?></td>
                <td><?= str_truncate($jeu_t->getRegles(), 100) ?> ...</td>
                <td><?= $jeu_t->getDifficulte() ?></td>
                <td><?= $jeu_t->getpublic() ?></td>
                <td><?= $jeu_t->getListePiecese() ?></td>
                <td><?= $jeu_t->getDureePartie() ?></td>
                <td><?= $jeu_t->getAnneeSortie() ?></td>
                <td><?= str_truncate($jeu_t->getDescription(), 100) ?> ...</td>
                <td>
                    <input type=hidden name="objectToWorkWith" value="Jeu_T" />
                    <input type=hidden name="actionToDoWithObject" value="selectOne" />

                    <input type="submit" name="submit" class="boutonBleu" value="Voir la fiche complète">
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

