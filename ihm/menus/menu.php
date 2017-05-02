<?php $droitsUser = $_SESSION["monProfil"]->getDroit(); ?>
<section class="menu_side">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-3 col-sm-3 sidebar2">
                <div class="left-navigation">
                    <br/>
<!--                    <h2 id="titre_menu"> Votre menu </h2>-->
                    <ul class="list">
                        <?php if ($droitsUser == "Administrateur" ): ?>
                            <h4 id="titre_menu">Menu administrateur</h4>
                            <li><a href='index.php?page=administrateur/config.php'>Configuration</a></li>
                            <li><a href='index.php?page=pages/_old/_enCours.php'>Administrer les utilisateurs</a></li>
                        <?php endif; ?>
                        <?php if ($droitsUser == "Modérateur" || $droitsUser == "Administrateur"): ?>
                            <h4 id="titre_menu">Menu modérateur</h4>
                            <li><a href='index.php?page=pages/_old/_enCours.php'>Valider un jeu</a></li>
                        <?php endif; ?>
                        <h4 id="titre_menu">Menu utilisateur</h4>
                        <li><a href='index.php?user=monProfil'>Mon profil</a></li>
                        <li><a href='index.php?user=maLudotheque'>Ma ludothèque</a></li>
                        <li><a href='index.php?user=mesPrets'>Mes prêts</a></li>
                        <li><a href='index.php?user=mesEmprunts'>Mes emprunts</a></li>
                        <li><a href='index.php?user=mesMessages'>Mes messages</a></li>
                        <li><a href='index.php?page=creation/jeu_t.php'>Proposer un nouveau jeu</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
