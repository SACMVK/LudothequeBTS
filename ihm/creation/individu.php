

<form action="" method="post" accept-charset="utf-8" class="form" role="form"  id="CreationForm"  name="inscription" >   
    <legend>Créer mon compte</legend>
    Nom :
    <div id="form-champ"  >
    <input type="text"  name="nom" size="10" maxlength="10" required value="" class="form-control input-lg"  placeholder="Nom"/>
    </div>
    Prénom :
       <div id="form-champ"  >
    <input type="text"   name="prenom" size="10" maxlength="10" required value="" class="form-control input-lg" placeholder="Prénom"/>             
   </div>
    Date de naissance :
       <div id="form-champ"  >
    <input type="date"   name="dateNaiss" size="10" maxlength="10" required value="" class="form-control input-lg" placeholder="Date de naissance"/>
    </div>
    Pseudo :
       <div id="form-champ"  >
    <input type="text"  name="pseudo" size="20" maxlength="20" required value=""  class="form-control input-lg" placeholder="Pseudo"/>        
    </div>
    Mot de passe :
       <div id="form-champ"  >
    <input type="password"   name="mdp" id="mdp" size="20" maxlength="20" required value=""   class="form-control input-lg" placeholder=" Mot de passe"/>
    </div>
    Confirmation du mot de passe :
       <div id="form-champ"  >
    <input type="password"  name="mdp2" size="20" maxlength="20" required value=""  class="form-control input-lg" placeholder=" Confirmation du mot de passe"/>
    </div>
    Adresse e-mail :
       <div id="form-champ"  >
    <input type="email" name="email"  size="100" maxlength="100" required value=""  class="form-control input-lg"  placeholder="   Adresse e-mail"/>
    </div>
    Téléphone :
       <div id="form-champ"  >
    <input type="text" name="telephone"   size="10" maxlength="10" required  value=""  class="form-control input-lg" placeholder="Téléphone"/>
    </div>
    Adresse :
       <div id="form-champ"  >
    <input type=text name="adresse"  size="100" maxlength="100" required value=""  class="form-control input-lg" placeholder="Adresse"/>
    </div>
    Code Postal :
       <div id="form-champ"  >
    <input type=text name="codePostal"  size="5" maxlength="5" required value=""  class="form-control input-lg" placeholder="Code Postal"/>
    </div>
    Ville :
       <div id="form-champ"  >
    <input type=text name="ville" rows="5"  size="100" maxlength="100" required value=""  class="form-control input-lg" placeholder="Ville"/>
</div>
    <input type=hidden name="objectToWorkWith" value="Individu" />
    <input type=hidden name="actionToDoWithObject" value="insert" />

    <?php
    $arrayPseudo = getArrayFromSQL("compte", "pseudo");
    $stringPseudo = "";
    foreach ($arrayPseudo as $pseudo) {
        $stringPseudo .= $pseudo . "#";
    }
    $stringPseudo = substr($stringPseudo, 0, strlen($stringPseudo) - 1);
    ?>
    <input type="hidden" name="listePseudo" value="<?= $stringPseudo ?>" />

    <?php
    $arrayEmail = getArrayFromSQL("compte", "email");
    $stringEmail = "";
    foreach ($arrayEmail as $email) {
        $stringEmail .= $email . "#";
    }
    $stringEmail = substr($stringEmail, 0, strlen($stringEmail) - 1);
    ?>
    <input type="hidden" name="listeMail" value="<?= $stringEmail ?>" />

    <button type="submit" name="submit" class="boutonBleu">S'inscrire</button>
    <button type="reset" name="reset" class="boutonBleu">Réinitialiser</button>


</form>          
