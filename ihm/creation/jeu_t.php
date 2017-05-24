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
    <input type="text" list="typePCdata" name="typePC">
    <datalist id="typePCdata">
        <label for="typePC">ou sélectionner dans la liste</label>
        <select name="typePC" id="typePC">
            <?php selectDico("type_p_c_d", "typePC", ""); ?>
        </select>
    </datalist><br/>

    Nom :
    <input type="text" name="nom" size="10" maxlength="10" class="form-control input-lg"  placeholder="Nom" required/>

    Année de sortie :
    <input type="number" step="1" name="anneeSortie" min="1900" max="2100" class="form-control input-lg"  placeholder="2000" required/>

    Description du jeu :
    <input type="text" name="description" class="form-control input-lg"  placeholder="Jeu rigolo à faire en famille ..." required/>

    Nombre de joueurs au minimum :
    <input type="number" name="nbJoueursMin" min="1" class="form-control input-lg"  placeholder="1" required/>

    Nombre de joueurs au minimum :
    <input type="number" name="nbJoueursMax" min="1" class="form-control input-lg"  placeholder="1" required/> <!-- Vérifier si possible incrément au min à la valeur de nbJoueursMin pour ne pas avoir un max inférieur a u min -->

    <!-- Pour l'editeur donne la possibilité d'écrire un nom d'éditeur si n'apparait pas dans la liste ou de le selectionner directement -->
    Editeur :
    <input type="text" list="editeurdata" name="editeur">
    <datalist id="editeurdata">
        <label for="editeur">ou sélectionner dans la liste</label>
        <select name="editeur" id="editeur">
            <?php selectDico("editeur_d", "editeur"); ?>
        </select>
    </datalist><br/>

    Règles du jeu :
    <input type="text" name="regles" class="form-control input-lg"  placeholder="Le but du jeu est de se débarrasser de toutes ses cartes..." required/>

    Difficulté :
    <select type="range" class="form-control select-lg" name="difficulte">
        <?php selectDico("difficulte_d", "difficulte") ?>
    </select>

    <input type=hidden name="objectToWorkWith" value="Jeu_T" />
    <input type=hidden name="actionToDoWithObject" value="insert" />

    <input type="submit" name="submit" class="boutonBleu" value="Proposer ce jeu"/>
    <input type="reset" class="boutonBleu" value="Réinitialiser">
</form>          


