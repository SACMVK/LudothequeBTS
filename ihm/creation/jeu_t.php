<p style="color:red;">@team : TODO</p>
<form action=" " method="post" accept-charset="utf-8" class="form" role="form">   
    <?php
    /*
     * Il faut créer ici un formulaire renseigannt tous les champs du constructeur d'un jeu_t et du produit culturel
     * Ces input permettent de renseigner la liste de l'instanciation d'un nouveau jeu_t, grace a la classe controllerRequete
     * puis est ensuite envoyée au Jeu_T_Dao qui traite l'insertion des données avec insert($valuesToInsert). 
     */
    ?>

    <legend>Proposer un nouveau jeu à la ludothèque</legend>
    Type de produit culturel :
    <select name="typePC" class="form-control input-lg">
        <?php selectDico("type_p_c_d", "typePC", ""); ?>
    </select>

    Nom :
    <input type="text" name="nom" size="10" maxlength="10" class="form-control input-lg"  placeholder="Nom"/>
    
    Année de sortie :
    <input type="year" name="anneeSortie" class="form-control input-lg"  placeholder="2000"/>
    
    Description du jeu :
    <input type="text" name="description" class="form-control input-lg"  placeholder="Jeu rigolo à faire en famille ..."/>
    
    Nombre de joueurs au minimum :
    

    <input type=hidden name="objectToWorkWith" value="Jeu_T" />
    <input type=hidden name="actionToDoWithObject" value="insert" />

    <input type="submit" name="submit" class="boutonBleu" value="Proposer ce jeu"/>
    <input type="reset" class="boutonBleu" value="Réinitialiser">
</form>          


