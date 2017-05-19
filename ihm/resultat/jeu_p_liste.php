<table border= 1px solid black>
    <caption><?= $jeu->getNom() ?></caption>
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



