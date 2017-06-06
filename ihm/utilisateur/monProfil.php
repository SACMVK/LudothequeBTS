<p style="color:red;">@team : Attention, le mail et le pseudo doivent être uniques dans la BD, il faut modifier les valeurs par défaut</p>
<form action=" " method="post" accept-charset="utf-8" class="form" role="form"  id="monProfile">   
    <legend>Mettre à jour mon compte</legend>
    <!-- size : taille cellule | maxlength : nombre maximum de caractères autorisé -->
    <!-- Ajouter expressions régulières mail, code postal, téléphone + check conformitée mot de passe -->
    <!-- stefan : un input disabled n'envoie pas l'info, il faut ajouter un hidden qui lui est actif -->
    Nom :
    <div id="form-champ"  >
    <input type="text" name="nom" size="10" maxlength="10" required value="<?= $_SESSION["monProfil"]->getNom() ?>" class="form-control input-lg"   placeholder="Nom"/>
    </div>
    Prénom :
    <div id="form-champ"  >
    <input type="text" name="prenom" size="10" maxlength="10" required value="<?= $_SESSION["monProfil"]->getPrenom() ?>" class="form-control input-lg"   placeholder="Prénom"/>
   </div>
    Date de naissance :
    <div id="form-champ"  >
    <input type="date" name="dateNaiss" size="10" maxlength="10" required value="<?= $_SESSION["monProfil"]->getDateNaissance() ?>" class="form-control input-lg"   placeholder="Date de naissance"/>
    </div>
    Date d'inscription :
    <div id="form-champ"  >
    <input type="date" name="dateInscription" size="10" maxlength="10" required value="<?= $_SESSION["monProfil"]->getDateInscription() ?>" class="form-control input-lg"   placeholder="Date d'inscription" disabled/>
    <input type="hidden" name="dateInscription" value="<?= $_SESSION["monProfil"]->getDateInscription() ?>" />
    </div>
    Niveau de droits :
    <div id="form-champ"  >
    <input type="date" name="droit" size="20" maxlength="20" required value="<?= $_SESSION["monProfil"]->getDroit() ?>" class="form-control input-lg"   placeholder="Niveau de droits" disabled/>
    <input type="hidden" name="droit" value="<?= $_SESSION["monProfil"]->getDroit() ?>" />
    </div>
    Identifiant :
    <div id="form-champ"  >
    <input type="date" name="idUser" size="20" maxlength="20" required value="<?= $_SESSION["monProfil"]->getIdUser() ?>" class="form-control input-lg"   placeholder="Identifiant" disabled/>
    <input type="hidden" name="idUser" value="<?= $_SESSION["monProfil"]->getIdUser() ?>" />
    </div>
    Pseudo :
    <div id="form-champ"  >
    <input type="text" name="pseudo" size="20" maxlength="20" required value="<?= $_SESSION["monProfil"]->getPseudo() ?>" class="form-control input-lg"  placeholder="Pseudo"/>
    </div>
    Mot de passe :
    <div id="form-champ"  >
    <input type="password" name="mdp" size="20" maxlength="20" required value="<?= $_SESSION["monProfil"]->getMdp() ?>" class="form-control input-lg"  placeholder="Mot de passe"/>
    </div>
    Confirmation du mot de passe :
    <div id="form-champ"  >
    <input type="password" name="mdp2" size="20" maxlength="20" required value="<?= $_SESSION["monProfil"]->getMdp() ?>" class="form-control input-lg"  placeholder="Confirmation du mot de passe"/>
    </div>
    Adresse e-mail :
    <div id="form-champ"  >
    <input type="text" name="email" size="100" maxlength="100" required value="<?= $_SESSION["monProfil"]->getEmail() ?>" class="form-control input-lg"  placeholder="Adresse e-mail"/>
    </div>
    Téléphone :
    <div id="form-champ"  >
    <input type="text" name="telephone" size="13" maxlength="13" required  value="<?= $_SESSION["monProfil"]->getTelephone() ?>" class="form-control input-lg"  placeholder="Téléphone"/>
    </div>
    Adresse :
    <div id="form-champ"  >
    <input type=text name="adresse" size="100" maxlength="100" required value="<?= $_SESSION["monProfil"]->getAdresse() ?>" class="form-control input-lg"  placeholder="Adresse"/>
    </div>
    Code Postal :
    <div id="form-champ"  >
    <input type=text name="codePostal" size="5" maxlength="5" required value="<?= $_SESSION["monProfil"]->getCodePostal() ?>" class="form-control input-lg"  placeholder="Code Postal"/>
    </div>
    Ville :
    <div id="form-champ"  >
    <input type=text name="ville" size="100" maxlength="100" required value="<?= $_SESSION["monProfil"]->getVille() ?>" class="form-control input-lg"  placeholder="Ville"/>
    </div>
    Département :
    <div id="form-champ"  >
    <input type=text name="numDept" size="3" maxlength="3" required value="<?= $_SESSION["monProfil"]->getDept() ?>" class="form-control input-lg"   placeholder="Département" disabled/>
    <input type=hidden name="numDept" value="<?= $_SESSION["monProfil"]->getDept() ?>"/>
</div>

    <input type=hidden name="objectToWorkWith" value="Individu" />
    <input type=hidden name="actionToDoWithObject" value="update" />
    <input type=hidden name="page" value="profilUser/profilUser.php" />

    
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

    <button type="submit" name="submit" class="boutonBleu">Modifier mon profil</button>

</form>
