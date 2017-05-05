<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ludothèque</title>
        <?php
        // stefan : Cette ligne permet d'activer et d'entretenir la session ($_SESSION) avec ses variables
        // stefan : on est obligé de déclarer la classe avant de pouvoir l'utiliser
        include 'job/class/Individu.php';
        include 'job/class/Jeu_P.php';
        include 'job/class/Jeu_T.php';
        include 'job/class/Message.php';
        include 'job/dao/fonctions_dao.php';
        include 'ihm/css/css.php';

        session_start();
        ?>  




        <!-- ************************************************************************************************ -->
        <!-- ************************************** CONTROLEUR (DEBUT) ************************************** -->
        <!-- ************************************************************************************************ -->

        <?php
        /* stefan : On récupère par $_REQUEST['page'],
         * - ou bien une page à afficher directement
         * - ou bien un appel au contrôleur si la chaine contient "+"
         * par ex : Individu+selectOne
         * On récupère par $_REQUEST["connexion"]
         * les demandes de connexions (avec pseudo et mdp)
         * et de déconnexion
         * $_REQUEST est une variable globale
         * qui inclue $_POST et $_GET
         */
        if (!empty($_REQUEST['connexion'])) {
            include 'controller/controllerConnexion.php';
        } else if (!empty($_REQUEST['objectToWorkWith'])) {
            include 'controller/controllerRequete.php';
        } else if (!empty($_REQUEST['user'])) {
            include 'controller/controllerUser.php';
        } else if (!empty($_REQUEST['page'])) {
            $pageAAfficher = 'ihm/' . $_REQUEST['page'];
        }
// si jamais il n'y a rien à afficher, on affiche la page d'accueil
        if (empty($pageAAfficher)) {
            $pageAAfficher = 'ihm/pages/accueil.php';
        }
        unset($_REQUEST);
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
                include ('ihm/menu/menu.php');
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

