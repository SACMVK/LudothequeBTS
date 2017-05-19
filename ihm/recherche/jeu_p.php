<form action=" " method="post" accept-charset="utf-8" class="form" role="form">   
    <legend>Rechercher un exemplaire</legend>
    Nom du jeu : 
    <input class="form-control input-lg" type="text" name="nom"/>
    Nom de l'éditeur :
    <select class="form-control select-lg" name="editeur">
        <?php selectDico("editeur_d", "editeur") ?>
    </select>
    Année de sortie : 
    <input class="form-control input-lg" type="year" name="anneeSortie" placeholder="Année (yyyy)"/>
    Nombre de joueurs minimum :
    <select class="form-control select-lg" name="nbJoueurMin">
        <?php selectDico("jeu_t", "nbJoueursMax") ?>
    </select>
    Nombre de joueurs maximum :
    <select class="form-control select-lg" name="nbJoueurMax">
        <?php selectDico("jeu_t", "nbJoueursMax") ?>
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
        <?php selectDico("jeu_t", "dureePartie") ?>
    </select>
    Etat du jeu   
    <select class="form-control select-lg" name="departement">
        <?php selectDico("etat_d", "etat") ?>
    </select>
    Ville: 
    <input type="text" class="form-control input-lg" name="ville"/>
    Département :
    <select class="form-control select-lg" name="departement">
        <?php selectDico("departement", "nom", "numDept", true) ?>
    </select>


    <input type=hidden name="objectToWorkWith" value="Jeu_P" />
    <input type=hidden name="actionToDoWithObject" value="selectList" />

    <input type="submit" name="submit" class="boutonBleu" value="Recherche">
    <input type="reset" class="boutonBleu" value="Réinitialiser">
</form>          
