<legend>Ma ludothèque</legend>
<a href='index.php?page=creation/exemplaire.php'><button class="boutonBlanc">Ajouter un jeu à ma ludothèque</button></a>
<br/>
<?php
if (!empty($_SESSION["maLudotheque"])):
    foreach ($_SESSION["maLudotheque"] as $exemplaire) :
        ?>
        <div class="blocList"> 
            Identifiant : <?= $exemplaire->getIdexemplaire() ?><br/>
            Nom : <?= $exemplaire->getjeu()->getNom() ?><br/>
            Editeur : <?= $exemplaire->getjeu()->getEditeur() ?><br/>                 
            <form action="" method="post" accept-charset="utf-8">
                <input type=hidden name="objectToWorkWith" value="Exemplaire" />
                <input type=hidden name="actionToDoWithObject" value="delete" />
                <input type="hidden" name="idExemplaire" value="<?= $exemplaire->getIdExemplaire() ?>" />
                <input type="image" name="submit" class="boutonTransparent" value="Supprimer ce jeu de ma ludothèque" src="ihm/img/delete.png">
            </form>
            <form action="" method="post" accept-charset="utf-8" class="form" >
                <input type=hidden name="nom" value="<?= $exemplaire->getjeu()->getNom() ?>" />
                <input type=hidden name="objectToWorkWith" value="Jeu" />
                <input type=hidden name="actionToDoWithObject" value="selectOne" />
                <input type="image" name="submit" class="boutonTransparent" value="Voir la fiche complète" src="ihm/img/loupe.png">
            </form>

        </div> 
        <?php
    endforeach;
else:
    ?>
    <tr>
        Aucun résultat 
    </tr>
<?php
endif;
?>

<a href='index.php?page=creation/Exemplaire.php'><button class="boutonBlanc">Ajouter un jeu à ma ludothèque</button></a>


