<div class="blocList">
    <h3><?= $element->getPrenom(); ?> <?= $element->getNom() ?> </h3>
    Pseudo : <?= $element->getPseudo() ?><br />
    Nom : <?= $element->getNom() ?><br />
    Prénom : <?= $element->getPrenom() ?><br />
    Email : <a href="mailto:<?= $element->getEmail() ?>"><?= $element->getEmail() ?></a><br />
    Inscrit depuis le : <?= $element->getDateInscription() ?><br />
    Domicilié au : <?= $element->getAdresse() ?>, <?= $element->getCodePostal() ?> <?= $element->getVille() ?><br />
    Droit : <?= $element->getDroit() ?><br />
</div>

<form action="" method="post" accept-charset="utf-8" >
    <input type=hidden name="idDest" value="<?= $element->getIdUser() ?> " />
    <input type=hidden name="pseudo" value="<?= $element->getPseudo() ?> " />
    <input type='hidden' name='page' value='creation/message.php' />
    <input type="submit" name="submit" class="boutonBleu" value="Envoyer un message">
</form>

<form action="" method="post" accept-charset="utf-8" >
    <input type=hidden name="idProprietaire" value="<?= $element->getIdUser() ?> " />
    <input type=hidden name="objectToWorkWith" value="jeu_p" />
    <input type=hidden name="actionToDoWithObject" value="selectList" />
    <input type="submit" name="submit" class="boutonBleu" value="Voir la ludothèque">
</form>