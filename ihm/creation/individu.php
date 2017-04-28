<form method="post" action="">
    <!-- size : taille cellule | maxlength : nombre maximum de caractères autorisé -->
    <!-- Ajouter expressions régulières mail, code postal, téléphone + check conformitée mot de passe -->
    Nom :
    <input type="text" name="nom" size="10" maxlength="10" required="required" value="nom"/>
    <br/>
    Prénom :
    <input type="text" name="prenom" size="10" maxlength="10" required="required" value="prenom"/>
    <br/>
    Date de naissance :
    <input type="date" name="dateNaiss" size="10" maxlength="10" required="required" value="14-02-1990"/>
    <br/>
    <br/>


    Pseudo :
    <input type="text" name="pseudo" size="20" maxlength="20" required="required" value="pseudo"/>
    <br/>
    Mot de passe:
    <input type="password" name="mdp" size="20" maxlength="20" required="required" value="mdp"/>
    <br/>
    Confirmation du mot de passe :
    <input type="password" name="mdp2" size="20" maxlength="20" required="required" value="mdp"/>
    <br/>
    <br/>


    Adresse e-mail :
    <input type="text" name="email" size="100" maxlength="100" required="required" value="a@a.fr"/>
    <br/>
    Téléphone:
    <input type="text" name="telephone" size="10" maxlength="10" required="required"  value="0612345678"/>
    <br/>
    Adresse :
    <input type=text name="adresse" size="100" maxlength="100" required="required" value="9 rue test"/>
    <br/>
    Code Postal :
    <input type=text name="codePostal" size="5" maxlength="5" required="required" value="56000"/>
    <br/>
    Ville :
    <input type=text name="ville" rows="5" size="100" maxlength="100" required="required" value="Vannes"/>
    <br/>
    <br/>

    <input type=hidden name="objectToWorkWith" value="Individu" />
    <input type=hidden name="actionToDoWithObject" value="insert" />

    <input type="submit" name="submit" value="S'inscrire"/>
</form>


