<?php

if ($_POST['connexion'] == "on") {
    // stefan : la demande arrive en post afin de masquer les informations

    include 'job/dao/Connexion_DataBase .php';
    include 'job/dao/Connexion_Dao.php';
    $connexionValide = isConnexionValide($_POST["pseudo"], $_POST["mdp"]);

    if ($connexionValide) {
//        include 'job/dao/Individu_Dao.php';
//        include 'job/class/Individu.php';
//        $_SESSION["user"] = new Individu($ville, $rue, $codePostal, $dpt, $email, $telephone, $pseudo, $dateInscription, $mdp, $droit, $nom, $prenom, $dateNaissance, $idUser);
        $pageAAfficher = "ihm/pages/accueilConnected.php";
    } else {
        $pageAAfficher = "ihm/connexion/echecConnexion.php";
    }
}



