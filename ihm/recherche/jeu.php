<form action="" method="post" accept-charset="utf-8" class="form" >
    <legend>
        Rechercher un jeu
    </legend>
    Type de produit recherché
    <select class="form-control select-lg" name="typePC">
        <?php selectDico("type_p_c_d", "typePC") ?>
    </select>
    Nom du jeu : 
    <input class="form-control input-lg" type="text" name="nom"/>
    Nom de l'éditeur :
    <select class="form-control select-lg" name="editeur">
        <?php selectDico("editeur_d", "editeur") ?>
    </select>
    Année de sortie : 
    <input class="form-control input-lg" type="year" name="anneeSortie" placeholder="Année (yyyy)"/>
    Nombre de joueurs minimum :
    <select class="form-control select-lg" name="nbJoueursMin">
        <?php selectDico("jeu", "nbJoueursMax") ?>
    </select>
    Nombre de joueurs maximum :
    <select class="form-control select-lg" name="nbJoueursMax">
        <?php selectDico("jeu", "nbJoueursMax") ?>
    </select>
    Public :
    <select class="form-control select-lg" name="public">
        <?php selectDico("public_d", "public") ?>
    </select>
    Difficulté :
    <select class="form-control select-lg" name="difficulte">
        <?php selectDico("difficulte_d", "difficulte") ?>
    </select>
    Durée de la partie :
    <select class="form-control select-lg" name="dureePartie">
        <?php selectDico("jeu", "dureePartie") ?>
    </select>

    <input type=hidden name="valide" value="1" />

    <input type=hidden name="objectToWorkWith" value="Jeu" />
    <input type=hidden name="actionToDoWithObject" value="selectList" />

    <input type="submit" name="submit" class="boutonBleu" value="Recherche jeu">
    <input type="reset" class="boutonBleu" value="Réinitialiser">
</form>
