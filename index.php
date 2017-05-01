<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ludothèque</title>
        <?php
        // stefan : Cette ligne permet d'activer et d'entretenir la session ($_SESSION) avec ses variables
        // stefan : on est obligé de déclarer la classe avant de pouvoir l'utiliser
        include 'job/class/Individu.php';
        session_start();

        // stefan : Ce fichier permet d'enregistrer des variables en cours d'exécution (je ne sais pas me servir du mode debug
        include '_old/saveTexte.php';
        include 'job/dao/fonctions_dao.php';
        include 'ihm/css/css.php';
        ?>  




        <!-- ************************************************************************************************ -->
        <!-- ************************************** CONTROLEUR (DEBUT) ************************************** -->
        <!-- ************************************************************************************************ -->

        <?php
        /* stefan : On récupère par $_GET['page'],
         * - ou bien une page à afficher directement
         * - ou bien un appel au contrôleur si la chaine contient "+"
         * par ex : Individu+selectOne
         * On récupère par $_POST["connexion"] et $_GET["connexion]
         * les demandes de connexions (avec pseudo et mdp)
         * et de déconnexion
         */
        if (!empty($_POST['connexion'])) {
            include 'controller/controllerConnexion.php';
            unset($_POST);
        } else if (!empty($_GET['connexion'])) {
            include 'controller/controllerDeconnexion.php';
            unset($_GET);
        } else if (!empty($_POST['objectToWorkWith'])) {
            include 'controller/controllerRequete.php';
            unset($_POST);
        } else if (!empty($_GET['page'])) {
            $pageAAfficher = 'ihm/' . $_GET['page'];
            unset($_GET);
        } else {
            $pageAAfficher = 'ihm/pages/accueil.php';
        }
        ?>

        <!-- ************************************************************************************************ -->
        <!-- *************************************** CONTROLEUR (FIN) *************************************** -->
        <!-- ************************************************************************************************ -->      

    </head>


    <body>
        <!-- ************************************************************************************************ -->
        <!-- **************************************** HEADER (DEBUT) **************************************** -->
        <!-- ************************************************************************************************ -->

        <div id='div_header'><?php
        include ('ihm/header/header.php');
        ?></div>

        <!-- ************************************************************************************************ -->
        <!-- ***************************************** HEADER (FIN) ***************************************** -->
        <!-- ************************************************************************************************ -->




        <!-- ************************************************************************************************ -->
        <!--  ********************* MENU A GAUCHE (AFFICHE QU'EN MODE CONNECTE) (DEBUT) ********************* -->
        <!-- ************************************************************************************************ -->

        <!-- stefan : S'il y a une session d'ouverte, on affiche le menu -->
        <?php if (!empty($_SESSION)): ?>
            <div id='div_menu'><?php
            include ('ihm/menus/menu.php');
            ?></div>
            <?php endif; ?>

        <!-- ************************************************************************************************ -->
        <!--  ********************** MENU A GAUCHE (AFFICHE QU'EN MODE CONNECTE) (FIN) ********************** -->
        <!-- ************************************************************************************************ -->





        <!-- ************************************************************************************************ -->
        <!-- ************************************ CONTENU CENTRAL (DEBUT) *********************************** -->
        <!-- ************************************************************************************************ -->

        <?php
        $classEspace = "div_contenuSansMenu";
        if (!empty($_SESSION)) {
            $classEspace = "div_contenuAvecMenu";
        }
        ?>
        <div id= <?php echo $classEspace; ?> > <?php include $pageAAfficher; ?></div>

        <!-- ************************************************************************************************ -->
        <!-- ************************************* CONTENU CENTRAL (FIN) ************************************ -->
        <!-- ************************************************************************************************ -->





        <!-- ************************************************************************************************ -->
        <!-- **************************************** FOOTER (DEBUT) **************************************** -->
        <!-- ************************************************************************************************ -->

        <div id='div_footer'><?php
        include 'ihm/footer/footer.php';
        ?></div>

        <!-- ************************************************************************************************ -->
        <!-- ***************************************** FOOTER (FIN) ***************************************** -->
        <!-- ************************************************************************************************ -->






        <?php
        include 'ihm/js/js_effets.php';
        ?>

    </body>
</html>

