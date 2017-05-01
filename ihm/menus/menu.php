



<section class="menu_side">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-3 col-sm-3 sidebar2">

                <div class="left-navigation">
                    <h2 id="titre_menu"> Votre menu </h2>
                    <ul class="list">
                        <?php if ($_SESSION["user"]->getDroit() == "Administrateur"): ?>
                            <h4 id="titre_menu">Menu administrateur</h4>
                            <li><a href='index.php?page=admin/config.php'>Configuration</a></li>
                            <li><a href='index.php?page=pages/_old/_enCours.php'>Administrer les utilisateurs</a></li>
                        <?php endif; ?>
                        <?php if (!$_SESSION["user"]->getDroit() == "Modérateur"): ?>
                            <h4 id="titre_menu">Menu modérateur</h4>
                            <li> <a href='index.php?page=pages/_old/_enCours.php'>Valider un jeu</a></li>
                        <?php endif; ?>
                        <h4 id="titre_menu">Menu utilisateur</h4>
                        <li><a href='index.php?page=pages/_old/_enCours.php'>Mon profil</a></li>
                        <li><a href='index.php?page=pages/_old/_enCours.php'>Ma ludothèque</a></li>
                        <li><a href='index.php?page=pages/_old/_enCours.php'>Mes prêts</a></li>
                        <li><a href='index.php?page=pages/_old/_enCours.php'>Mes emprunts</a></li>
                        <li><a href='index.php?page=pages/_old/_enCours.php'>Mes messages</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>