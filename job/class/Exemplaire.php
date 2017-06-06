<?php

class Exemplaire {

    // AhMaD: les attributs pour Jeu_T
    private $idExemplaire;
    private $jeu;
    private $proprietaire;

// AhMaD: Le connecteur 
    function __construct($proprietaire, $jeu, $idExemplaire = -1) {
        $this->idExemplaire = $idExemplaire;
        $this->jeu = $jeu;
        $this->proprietaire = $proprietaire;
    }

    // AhMaD: getter et setter
    // idExemplaire
    function getidExemplaire() {
        return $this->idExemplaire;
    }

    function setdJeuP($idExemplaire) {
        $this->idExemplaire = $idExemplaire;
    }

    // idProprietaire
    function getProprietaire() {
        return $this->proprietaire;
    }

    function setProprietaire($proprietaire) {
        $this->proprietaire = $proprietaire;
    }


    // idJeuT
    function getJeu() {
        return $this->jeu;
    }

    function setJeu($jeu) {
        $this->jeu = $jeu;
    }

    // AhMaD: ToString pour afficher l'objet, le point pour concaténer, cela comme (+) en java
    function __toString() {
        return ("id= " . $this->idExemplaire . ", Proprietaire :" . $this->proprietaire . ", JeuT: " . $this->jeu);
    }

}

?>
