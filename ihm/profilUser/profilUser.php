Mon profil
<br />
<form method="post" action="">
    <!-- size : taille cellule | maxlength : nombre maximum de caractères autorisé -->
    <!-- Ajouter expressions régulières mail, code postal, téléphone + check conformitée mot de passe -->
    <!-- stefan : un input disabled n'envoie pas l'info, il faut ajouter un hidden qui lui est actif -->
    <p style="color:red;">@team : Attention, le mail et le pseudo doivent être uniques dans la BD, il faut modifier les valeurs par défaut</p>
    Nom :
    <input type="text" name="nom" size="10" maxlength="10" required value="<?= $_SESSION["user"]->getNom() ?>"/>
    <br/>
    Prénom :
    <input type="text" name="prenom" size="10" maxlength="10" required value="<?= $_SESSION["user"]->getPrenom() ?>"/>
    <br/>
    Date de naissance :
    <input type="date" name="dateNaiss" size="10" maxlength="10" required value="<?= $_SESSION["user"]->getDateNaissance() ?>"/>
    <br/>
    <br/>


    Date d'inscription :
    <input type="date" name="dateInscription" size="10" maxlength="10" required value="<?= $_SESSION["user"]->getDateInscription() ?> " disabled/>
    <input type="hidden" name="dateInscription" value="<?= $_SESSION["user"]->getDateInscription() ?> " />
    <br/>
    Niveau de droits :
    <input type="date" name="droit" size="20" maxlength="20" required value="<?= $_SESSION["user"]->getDroit() ?> " disabled/>
    <input type="hidden" name="droit" value="<?= $_SESSION["user"]->getDroit() ?> " />
    <br/>
    Identifiant :
    <input type="date" name="idUser" size="20" maxlength="20" required value="<?= $_SESSION["user"]->getIdUser() ?> " disabled/>
    <input type="hidden" name="idUser" value="<?= $_SESSION["user"]->getIdUser() ?> " />
    <br/>
    Pseudo :
    <input type="text" name="pseudo" size="20" maxlength="20" required value="<?= $_SESSION["user"]->getPseudo() ?>"/>
    <br/>
    Mot de passe:
    <input type="password" name="mdp" size="20" maxlength="20" required value="<?= $_SESSION["user"]->getMdp() ?>"/>
    <br/>
    Confirmation du mot de passe :
    <input type="password" name="mdp2" size="20" maxlength="20" required value="<?= $_SESSION["user"]->getMdp() ?>"/>
    <br/>
    <br/>


    Adresse e-mail :
    <input type="text" name="email" size="100" maxlength="100" required value="<?= $_SESSION["user"]->getEmail() ?>"/>
    <br/>
    Téléphone:
    <input type="text" name="telephone" size="10" maxlength="10" required  value="<?= $_SESSION["user"]->getTelephone() ?>"/>
    <br/>
    Adresse :
    <input type=text name="adresse" size="100" maxlength="100" required value="<?= $_SESSION["user"]->getAdresse() ?>"/>
    <br/>
    Code Postal :
    <input type=text name="codePostal" size="5" maxlength="5" required value="<?= $_SESSION["user"]->getCodePostal() ?>"/>
    <br/>
    Ville :
    <input type=text name="ville" size="100" maxlength="100" required value="<?= $_SESSION["user"]->getVille() ?>"/>
    <br/>
    Département :
    <input type=text name="numDept" size="3" maxlength="3" required value="<?= $_SESSION["user"]->getDept() ?>" disabled/>
    <input type=hidden name="numDept" value="<?= $_SESSION["user"]->getDept() ?>"/>
    <br/>
    <br/>

    <input type=hidden name="objectToWorkWith" value="Individu" />
    <input type=hidden name="actionToDoWithObject" value="update" />
    <input type=hidden name="page" value="profilUser/profilUser.php" />

    <input type="submit" name="submit" value="Modifier mon profil"/>
</form>

