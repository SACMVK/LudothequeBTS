<?php

if ($_POST['connexion'] == "on") {
    // stefan : la demande arrive en post afin de masquer les informations

    include 'job/dao/Connexion_DataBase.php';
    include 'job/dao/Connexion_Dao.php';
    $connexionValide = isConnexionValide($_POST["pseudo"], $_POST["mdp"]);

    // stefan : $connexionValide retourne un array avec en 0 un boolean et en 1 l'id
    if ($connexionValide[0]) {
        include 'job/dao/Individu_Dao.php';
        $_SESSION["user"] = select("WHERE individu.idUser = ".$connexionValide[1])[0];
      /*
       *     $pageAAfficher = "ihm/resultat/individu.php";
       *   $pageAAfficher = "ihm/pages/accueilConnected.php":
      ;*/
           $pageAAfficher = "ihm/resultat/individu.php";
    
    } else {
        $pageAAfficher = "ihm/connexion/echecConnexion.php";
    }
    unset ($connexionValide);
}



