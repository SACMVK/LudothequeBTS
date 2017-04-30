<!-- stefan : rubrique administrateur -->
<?php if ($_SESSION["user"]->getDroit() == "Administrateur"): ?>
    Menu Administrateur
    <br/>
    <a href='index.php?page=admin/config.php'>Configuration</a>
    <br/>
    <a href='index.php?page=pages/_old/_enCours.php'>Administrer les utilisateurs</a>
    <br/>
    <br/>
<?php endif; ?>
<!-- stefan : rubrique modérateur également accessible à l'administrateur -->
<?php if (!$_SESSION["user"]->getDroit() == "Modérateur" || $_SESSION["user"]->getDroit() == "Administrateur"): ?>
    Menu Modérateur
    <br/>
    <a href='index.php?page=pages/_old/_enCours.php'>Valider un jeu</a>
    <br/>
    <br/>
<?php endif; ?>
<!-- stefan : rubrique utilisateur accessible à tous les utilisateurs connectés -->
Menu Utilisateur
<br/>
<a href='index.php?page=pages/_old/_enCours.php'>Mon profil</a>
<br/>
<a href='index.php?page=pages/_old/_enCours.php'>Ma ludothèque</a>
<br/>
<a href='index.php?page=pages/_old/_enCours.php'>Mes prêts</a>
<br/>
<a href='index.php?page=pages/_old/_enCours.php'>Mes emprunts</a>
<br/>
<a href='index.php?page=pages/_old/_enCours.php'>Mes messages</a>
<br/>

