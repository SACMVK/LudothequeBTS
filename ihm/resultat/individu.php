
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $element->getPrenom(); ?> <?= $element->getNom() ?> </h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt=" " class="img-circle img-responsive"> </div>
                        <div class=" col-md-9 col-lg-9 "> 
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Pseudo : </td>
                                        <td> <?= $element->getPseudo() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nom :</td>
                                        <td><?= $element->getNom() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Prenom :</td>
                                        <td><?= $element->getPrenom() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email :</td>
                                        <td><a href="mailto:<?= $element->getEmail() ?>"><?= $element->getEmail() ?></a></td>
                                    </tr>

                                    <tr>
                                        <td>date d inscription :</td>
                                        <td>'<?= $element->getDateInscription() ?></td>
                                    </tr>
                                    <tr>
                                        <td>date de naissance :</td>
                                        <td><?= $element->getDateNaissance() ?></td>
                                    </tr>

                                    <tr>
                                        <td>ville :</td>
                                        <td><?= $element->getVille() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Departement :</td>
                                        <td><?= $element->getDept() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Code Postal :</td>
                                        <td><?= $element->getCodePostal() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tel :</td>
                                        <td><?= $element->getTelephone() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Droit :</td>
                                        <td><?= $element->getDroit() ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> 

<form class="page_fichier_utilisateur" action=" " method="post" accept-charset="utf-8" >
    <input type=hidden name="idDest" value="<?= $element->getIdUser() ?> " />
    <input type=hidden name="pseudo" value="<?= $element->getPseudo() ?> " />
    <input type='hidden' name='page' value='creation/message.php' />
    <input type="submit" name="submit" class="boutonBleu" value="Envoyer un message">
</form>

<form class="page_fichier_utilisateur" action=" " method="post" accept-charset="utf-8" class="form" role="form">
    <input type="hidden" name="dateNaiss" required value="<?= $element->getDateNaissance() ?>"/>
    <input type="hidden" name="idUser" required value="<?= $element->getIdUser(); ?>"/>
    <input type="hidden" name="pseudo" required value="<?= $element->getPseudo() ?>"/>
    <input type="hidden" name="droit" required value="<?= $element->getDroit() ?>"/>
    <input type="hidden" name="nom" required value="<?= $element->getNom() ?>"/>
    <input type="hidden" name="prenom" required value="<?= $element->getPrenom() ?>"/>
    <input type="hidden" name="email" required value="<?= $element->getEmail() ?>"/>
    <input type="hidden" name="codePostal" required value="<?= $element->getCodePostal() ?>"/>
    <input type="hidden" name="telephone" required value="<?= $element->getTelephone() ?>"/>
    <input type="hidden" name="ville" required value="<?= $element->getVille() ?>"/>
    <input type="hidden" name="numDept" required value="<?= $element->getDept() ?>"/>
    <input type="hidden" name="dateInscription" required value="<?= $element->getDateInscription() ?>"/>
    <input type="hidden" name="mdp" required value="<?= $element->getMdp() ?>"/>
    <input type=hidden name="objectToWorkWith" value="individu" />
    <input type=hidden name="actionToDoWithObject" value="update" />

    <input type="submit" name="submit" class="boutonBleu" value="valider la modification">
</form>

<form class="page_fichier_utilisateur" action=" " method="post" accept-charset="utf-8" class="form" role="form">
    <input type=hidden name="idUser" value="<?= $element->getIdUser() ?> " />
    <input type=hidden name="objectToWorkWith" value="individu" />
    <input type=hidden name="actionToDoWithObject" value="delete" />
    <input type="submit" name="submit" class="boutonBleu" value="Supprimer l'utilisateur">
</form>