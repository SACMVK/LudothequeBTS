<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Ludothèque</title>
        <link rel="stylesheet" type="text/css" href="../ihm/css/boutons.css">
        <link rel="stylesheet" type="text/css" href="../ihm/css/styles.css">
        <?php
        include '../job/class/Compte.php';
        include '../job/class/Individu.php';
        include '../job/class/ProduitCulturel.php';
        include '../job/class/Jeu_T.php';
        include '../job/class/Jeu_P.php';
        include '../job/class/Message.php';
        include '../job/class/Expedition.php';
        include '../job/class/Pret.php';
        include '../job/dao/fonctions_dao.php';
        include '../job/dao/Connexion_DataBase.php';
        include '../job/dao/Jeu_P_Dao.php';
        $jeu1 = select("WHERE idJeuP=8")[0];
        //$jeu2 = select("WHERE idJeuP=9")[0];
        ?>
    </head>


    <body>
        <button class="boutonBleu">S'incrire</button>
        <button class="boutonBleu">Ajouter ce jeu à ma ludothèque</button>
        <br />
        <br />
        <span style="font-size: 12px;">
            <?php
            echo (getDatesReservation($jeu1))."<br />";
            //echo (getDatesReservation($jeu2))."<br />";
            ?>
        </span>
    </body>
</html>

