<?php

// stefan : un cas n'est pas visible : celui de l'affichage du profil qui va directement afficher ce qui est dans la RAM
switch ($_GET['user']) {
    case "maLudotheque":
        include 'job/dao/Jeu_P_Dao.php';
        $_SESSION["maLudotheque"] = select("WHERE jeu_p.idProprietaire = " . $_SESSION["monProfil"]->getIdUser());
        break;
    case "mesPrets";
        include 'job/dao/Jeu_P_Dao.php';
        $_SESSION["mesPrets"] = select("WHERE jeu_p.idProprietaire = " . $_SESSION["monProfil"]->getIdUser());
        break;
    case "mesEmprunts";
        include 'job/dao/Jeu_P_Dao.php';
        $_SESSION["mesEmprunts"] = select("WHERE pret_p.idEmprunteur = " . $_SESSION["monProfil"]->getIdUser());
        break;
    case "mesMessages";
        include 'job/dao/Message_Dao.php';
        $_SESSION["mesMessages"] = select("WHERE message.idDest = " . $_SESSION["monProfil"]->getIdUser());
        break;
}

$pageAAfficher = 'ihm/utilisateur/' . $_GET['user'] . '.php';

