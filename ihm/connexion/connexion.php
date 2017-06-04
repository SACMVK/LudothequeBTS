<?php
$pdo = openConnexion();
$requeteAdministrateurs = "SELECT * FROM compte WHERE droit='Administrateur' LIMIT 5;";
$stmtAdministrateurs = $pdo->prepare($requeteAdministrateurs);
$stmtAdministrateurs->execute();
$listeAdministrateurs = null;
while ($ligne = $stmtAdministrateurs->fetch(PDO::FETCH_ASSOC)) {
    $listeAdministrateurs [] = ['pseudo' => $ligne['pseudo'], 'mdp' => $ligne['mdp'], 'idUser' => $ligne['idUser']];
}
$requeteModerateurs = "SELECT * FROM compte WHERE droit='Moderateur' LIMIT 5;";
$stmtModerateurs = $pdo->prepare($requeteModerateurs);
$stmtModerateurs->execute();
$listeModerateurs = null;
while ($ligne = $stmtModerateurs->fetch(PDO::FETCH_ASSOC)) {
    $listeModerateurs [] = ['pseudo' => $ligne['pseudo'], 'mdp' => $ligne['mdp'], 'idUser' => $ligne['idUser']];
}
$requeteUtilisateurs = "SELECT * FROM compte WHERE droit='Utilisateur' LIMIT 5;";
$stmtUtilisateurs = $pdo->prepare($requeteUtilisateurs);
$stmtUtilisateurs->execute();
$listeUtilisateurs = null;
while ($ligne = $stmtUtilisateurs->fetch(PDO::FETCH_ASSOC)) {
    $listeUtilisateurs [] = ['pseudo' => $ligne['pseudo'], 'mdp' => $ligne['mdp'], 'idUser' => $ligne['idUser']];
}
$pdo = closeConnexion();
?>



<form action="" method="POST">
    <legend>Se connecter</legend>
    <div class="form-group">
        <label for="username-email"> Pseudo :</label>
        <input type="text" name="pseudo" size="20" maxlength="20" required="required"  placeholder="Votre pseudo"  class="form-control"/>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" name="mdp" size="20" maxlength="20" required="required" placeholder="Votre mot de passe"  class="form-control"/>
    </div>
    <div class="form-group">
        <input type=hidden name=connexion value=on></input>
        <input type="submit" class="boutonBleu" value="Se connecter" />
    </div>
    <div class="form-group">
        <a href="index.php?page=creation/individu.php" class="boutonBleu">Vous n'avez pas de compte ?</a>
    </div>
</form>


<style type="text/css">
    span {color:red;}
    td{text-align: center;border: none;width: auto;}
    table{width: 100%;font-size: 10px;width: 90%;margin: auto;}
    .titre{text-align: left;padding-left: 1em;}
    .categorie{background-color: rgba(255,0,0,0.2);height: 18px;}
</style>
<span>
    Ci-dessous une liste de comptes tirés de la base de données. Il y a actuellement 1000 comptes.
    <br />
    <br />
    <table>
        <tr>
            <td colspan=6 class="categorie">
                <b>Administrateurs (~5%):</b>
            </td>
        </tr>
        <tr>
            <td class="titre">
                <b>Pseudo :</b>
            </td>
            <?php foreach ($listeAdministrateurs as $administrateur) : ?>
                <td><?= $administrateur["pseudo"] ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td class="titre">
                <b>Mot de passe :</b>
            </td>
            <?php foreach ($listeAdministrateurs as $administrateur) : ?>
                <td><?= $administrateur["mdp"] ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td class="titre">
                <b>Identifiant :</b>
            </td>
            <?php foreach ($listeAdministrateurs as $administrateur) : ?>
                <td><?= $administrateur["idUser"] ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td colspan=6 class="categorie">
                <b>Modérateurs (~10%):</b>
            </td>
        </tr>
        <tr>
            <td class="titre">
                <b>Pseudo :</b>
            </td>
            <?php foreach ($listeModerateurs as $moderateur) : ?>
                <td><?= $moderateur["pseudo"] ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td class="titre">
                <b>Mot de passe :</b>
            </td>
            <?php foreach ($listeModerateurs as $moderateur) : ?>
                <td><?= $moderateur["mdp"] ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td class="titre">
                <b>Identifiant :</b>
            </td>
            <?php foreach ($listeModerateurs as $moderateur) : ?>
                <td><?= $moderateur["idUser"] ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td colspan=6 class="categorie">
                <b>Utilisateurs (~85%):</b>
            </td>
        </tr>
        <tr>
            <td class="titre">
                <b>Pseudo :</b>
            </td>
            <?php foreach ($listeUtilisateurs as $utilisateur) : ?>
                <td><?= $utilisateur["pseudo"] ?></td>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td class="titre">
                <b>Mot de passe :</b>
            </td>
            <?php foreach ($listeUtilisateurs as $utilisateur) : ?>
                <td><?= $utilisateur["mdp"] ?></td>
            <?php endforeach; ?>
        </tr>
                <tr>
            <td class="titre">
                <b>Identifiant :</b>
            </td>
            <?php foreach ($listeUtilisateurs as $utilisateur) : ?>
                <td><?= $utilisateur["idUser"] ?></td>
            <?php endforeach; ?>
        </tr>
    </table>
    <br />
    <br />
</span>