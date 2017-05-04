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
                <td><?= $jeu->getNbJoueursMin() ?> à <?= $jeu->getNbJoueursMax() ?></td>
                <td><?= $jeu->getEditeur() ?></td>
                <td><?= str_truncate($jeu->getRegles(), 100) ?> ...</td>
                <td><?= $jeu->getDifficulte() ?></td>
                <td><?= $jeu->getpublic() ?></td>
                <td><?= $jeu->getListePiecese() ?></td>
                <td><?= $jeu->getDureePartie() ?></td>
                <td><?= $jeu->getAnneeSortie() ?></td>
                <td><?= str_truncate($jeu->getDescription(), 100) ?> ...</td>
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



